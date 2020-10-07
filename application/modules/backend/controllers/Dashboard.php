<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('auth');
        $this->auth->except(['datatables']);
        $this->load->model('M_User', 'user');
        $this->load->model('M_Role', 'role');
    }

    public function index(){
        $data['content'] = 'user/index';
        $data['script'] = ['js/datatables', 'user/script'];
        $this->load->view('app', $data);
    }

    public function create()
    {
        $data['content'] = 'user/create';
        $data['script'] = ['user/script', 'js/cleave-js'];
        $data['title'] = 'Tambah Pengguna';
        $data['roles'] = $this->role->get();

        if($this->input->post())
        {
            $this->store();
        }

        return $this->load->view('app', $data);
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $user = $this->user->findJoinWhere(['a.id' => $id]);

        if(!$user)
        {
            $this->session->set_flashdata('error_message', 'Pengguna tidak ditemukan');
            redirect(base_url('user'));
        }

        $data['user'] = $user;
        $data['content'] = 'user/edit';
        $data['title'] = 'Edit Pengguna';
        $data['roles'] = $this->role->get();

        if($this->input->post())
        {
            $this->update();
        }

        return $this->load->view('app', $data);
    }

    public function delete()
    {
        if($this->input->post())
        {
            $this->load->model('M_Barbershop', 'barbershop');
            $id = $this->uri->segment(4);
            $user = $this->user->findWhere(['id' => $id]);

            if(!$user)
            {
                $this->session->set_flashdata('error_message', 'Pengguna tidak ditemukan');
                redirect(base_url('user'));
            }

            $this->db->trans_begin();
            $this->user->softdelete(['id' => $id]);
            $this->barbershop->update(['user_id' => $id], ['status' => 0]);
            if ($this->db->trans_status() === true) {
                $this->db->trans_commit();
                $this->session->set_flashdata('message', 'Pengguna berhasil dihapus');
            } else {
                $this->session->set_flashdata('message', 'Pengguna gagal dihapus');
            }
            redirect(base_url('user'));
        }
    }

    public function datatables()
    {
        if($this->input->is_ajax_request()){
            header('Content-Type: application/json');
            $this->load->library('datatables');
            $this->load->helper('datatable_column');
            $this->datatables->select('a.id, a.name, a.username, a.email, a.phone_number, c.display_name as role');
            $this->datatables->join('roles_users b', 'b.user_id = a.id', 'left');
            $this->datatables->join('roles c', 'c.id = b.role_id', 'left');
            $this->datatables->where(['a.deleted_at' => null]);
            $this->datatables->from('users a');
            $this->datatables->add_column('action', '$1', 'actionUser(id, username)');
            echo $this->datatables->generate();
        } else {
            show_404();
        }
    }

    private function store()
    {
        if($this->validate())
        {
            $data['name'] = $this->input->post('name', true);
            $data['username'] = $this->input->post('username', true);
            $data['email'] = $this->input->post('email', true);
            $data['phone_number'] = $this->input->post('phone_number', true);
            $data['password'] = password_hash($this->input->post('password', true), PASSWORD_BCRYPT);
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $this->db->trans_begin();

            /* INSERT USER */
            $user_id = $this->user->insert($data);

            /* INSERT ROLE USER */
            $data_role['user_id'] = $user_id;
            $data_role['role_id'] = $this->input->post('role_id', true);
            $this->user->insertRole($data_role);

            if ($this->db->trans_status() === true) {
                $this->db->trans_commit();
                $this->session->set_flashdata('message', 'Pengguna berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('message', 'Pengguna gagal ditambahkan.');
            }

            redirect(base_url('user'));
        }
    }

    private function update()
    {
        $id = $this->uri->segment(4);

        if($this->updateValidate($id))
        {

            $this->db->trans_begin();

            /* UPDATE USER */
            $data['name'] = $this->input->post('name', true);
            $data['username'] = $this->input->post('username', true);
            $data['email'] = $this->input->post('email', true);
            $data['phone_number'] = $this->input->post('phone_number', true);

            if($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password', true), PASSWORD_BCRYPT);
            }

            $data['updated_at'] = date('Y-m-d H:i:s');
            $where['id'] = $id;

            /* UPDATE ROLE USER */
            $data_role['user_id'] = $id;
            $data_role['role_id'] = $this->input->post('role_id', true);
            $where_role['user_id'] = $id;
            $this->user->updateRole($data_role, $where_role);

            $this->user->update($where, $data);
            if ($this->db->trans_status() === true) {
                $this->db->trans_commit();
                $this->session->set_flashdata('message', 'Pengguna berhasil diperbarui');
            } else {
                $this->session->set_flashdata('message', 'Pengguna gagal diperbarui.');
            }
            redirect(base_url('user'));
        }
    }

    private function validate()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required',
            ['required' => '%s tidak boleh kosong.']
        );

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.']
        );

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|min_length[3]|max_length[50]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.',
                'min_length' => '%s minimal 3 karakter',
                'max_length' => '%s maksimal 50 karakter']
        );

        $this->form_validation->set_rules('phone_number', 'Nomor handphone', 'required|is_unique[users.phone_number]|min_length[5]|max_length[15]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.',
                'min_length' => '%s minimal 5 digit',
                'max_length' => '%s maksimal 15 digit']
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]',
            ['required' => '%s tidak boleh kosong.',
                'min_length' => '%s minimal 6 karakter']
        );

        $this->form_validation->set_rules('password_confirmation', 'Konfirmasi Password', 'required|matches[password]|min_length[6]',
            ['required' => '%s tidak boleh kosong.',
                'matches' =>'%s tidak sesuai',
                'min_length' => '%s minimal 6 karakter']
        );

        $this->form_validation->set_rules('role_id', 'Hak Akses', 'required',
            ['required' => '%s tidak boleh kosong.']
        );

        if ($this->form_validation->run() == TRUE){
            return true;
        }

        return false;
    }

   
}