<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('auth');
        $this->auth->route_access();
        $this->load->model('M_User', 'user');
    }

    public function index()
    {
        if($this->input->post())
        {
            $this->update();
        }

        $data['content'] = 'account-setting/index';
        $data['script'] = 'account-setting/script';
        return $this->load->view('app', $data);
    }

    public function password()
    {
        if($this->input->post())
        {
            $this->update_password();
        }

        $data['content'] = 'account-setting/change-password';
        $data['script'] = 'account-setting/script';
        return $this->load->view('app', $data);
    }

    private function update()
    {
        if($this->validate($this->auth->userID()))
        {
            $data = [];
            $input = $this->input->post();
            foreach ($input as $k => $v){
                if($k != 'delete_profile_picture')
                {
                    $data[$k] = $input[$k];
                }
            }

            if(!empty($_FILES['profile_picture']['name'])){
                $upload_path = 'uploads/images/profile-picture';

                /* buat folder baru */
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, TRUE);
                }
                
                // if (!is_dir($upload_path.'/thumbnails')) {
                //     mkdir($upload_path.'/thumbnails', 0777, TRUE);
                // }
                
                $config['file_name'] = userdata()->username;
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']	= '3000000000';
                $config['max_width']  = '5000000000';
                $config['max_height']  = '3000000000';
                $this->load->library('upload', $config);
                if(!empty($_FILES['profile_picture']['name'])){
                    $this->upload->overwrite = true;
                    $this->removeProfilePicture();
                    if($this->upload->do_upload('profile_picture')){
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        $this->cropImaze($uploadData['file_name']);
                        $data['profile_picture'] = $filename;
                    }
                }
            }

            if($this->input->post('delete_profile_picture'))
            {
                $this->removeProfilePicture();
                $data['profile_picture'] = null;
            }

            $data['updated_at'] = date('Y-m-d H:i:s');

            $this->user->update(['id' => $this->auth->userID()], $data);
            $this->session->set_flashdata('message', 'Profil berhasil diperbarui');

            redirect(base_url('account-setting'));
        }
    }

    private function update_password()
    {
        if($this->validatePassword())
        {
            $data['password'] = password_hash($this->input->post('new_password', true), PASSWORD_BCRYPT);
            $data['updated_at'] = date('Y-m-d H:i:s');
            $where['id'] = $this->auth->userID();
            $this->user->update($where, $data);

            $this->session->set_flashdata('message', 'Password berhasil diubah');
            redirect(base_url('account-setting/password'));
        }
    }

    private function validate($id = null)
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]|max_length[255]',
            ['required' => '%s tidak boleh kosong.',
                'min_length' => '%s minimal 3 karakter',
                'max_length' => '%s maksimal 255 karakter']
        );

        $this->form_validation->set_rules('username', 'Username', 'required|is_self_unique[users.username.'.$id.']|min_length[3]|max_length[100]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.',
                'min_length' => '%s minimal 3 karakter',
                'max_length' => '%s maksimal 100 karakter']
        );

        $this->form_validation->set_rules('email', 'Email', 'required|is_self_unique[users.email.'.$id.']|min_length[3]|max_length[50]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.',
                'min_length' => '%s minimal 3 karakter',
                'max_length' => '%s maksimal 50 karakter']
        );

        $this->form_validation->set_rules('phone_number', 'Nomor handphone', 'required|is_self_unique[users.phone_number.'.$id.']|min_length[5]|max_length[15]',
            ['required' => '%s tidak boleh kosong.',
                'is_unique' => '%s sudah digunakan.',
                'min_length' => '%s minimal 5 digit',
                'max_length' => '%s maksimal 15 digit']
        );

        if ($this->form_validation->run() == TRUE){
            return true;
        }

        return false;
    }

    private function validatePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|callback_validPassword',
            ['required' => '%s tidak boleh kosong.']
        );

        $this->form_validation->set_rules('new_password', 'Password baru', 'required|min_length[6]',
            ['required' => '%s tidak boleh kosong.',
                'min_length' => '%s minimal 6 karakter']
        );

        $this->form_validation->set_rules('new_password_confirmation', 'Konfirmasi password baru', 'required|matches[new_password]|min_length[6]',
            ['required' => '%s tidak boleh kosong.',
                'matches' =>'%s tidak sesuai',
                'min_length' => '%s minimal 6 karakter']
        );

        if ($this->form_validation->run() == TRUE){
            return true;
        }

        return false;
    }

    public function validPassword($value)
    {
        if($value != null) {
            $user = $this->user->findWhere(['id' => $this->auth->userID(), "status" => 1, "deleted_at" => null]);
            if ($user && password_verify($value, $user->password)) {
                return true;
            } else {
                $this->form_validation->set_message('validPassword', 'Password salah');
                return false;
            }
        }
    }

    private function cropImaze($file_name){
        $this->load->library('image_lib');
        $config['source_image'] = 'uploads/images/profile-picture/'.$file_name;
        $config['quality'] = '50%';
        $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
        $newSize = 350;
        $config['maintain_ratio'] = false;
        $config['image_library'] = 'gd2';
        $config['width'] = $newSize;
        $config['height'] = $newSize;
        $config['y_axis'] = ($imageSize['height'] - $newSize) / 2;
        $config['x_axis'] = ($imageSize['width'] - $newSize) / 2;
        $config['new_image'] = 'uploads/images/profile-picture/'.$file_name;
        
        $this->image_lib->initialize($config);
        if(!$this->image_lib->crop()){
            return false;
        }
        $this->image_lib->clear();
    }

    private function removeProfilePicture()
    {
        unlink("uploads/images/profile-picture/" . userdata()->profile_picture);
    }
}