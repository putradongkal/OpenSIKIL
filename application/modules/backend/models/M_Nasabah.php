<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nasabah extends CI_Model{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'nasabah';
    }

    public function getAll()
    {
        $nasabahs = $this->db->select('a.*', 'b.name as nama_deb_collector')
                                ->order_by('a.id','desc')
                                ->join('users b', 'b.id = a.user_id', 'left')
                                ->get($this->table.' a')
                                ->result();


		return $nasabahs;
    }

    public function getdeb(){
      $debcollector =  $this->db->select('a.*,b.*')
                ->from('users a')
                ->join('roles_users b','b.user_id = a.id')
                ->where('b.role_id',2)
                ->get()->num_rows();

                return $debcollector;


    }

    public function getAlljumlah()
    {
        $nasabahs = $this->db->select('a.*', 'b.name as nama_deb_collector')
                                ->order_by('a.id','desc')
                                ->join('users b', 'b.id = a.user_id', 'left')
                                ->get($this->table.' a')
                                ->num_rows();


		return $nasabahs;
    }

    public function getById($id)
	{
		$data = $this->db->get_where($this->table, ['id' => $id])->row();
		return $data;
    }

    public function getCount()
    {
        $nasabah = $this->db->select('id')->get($this->table)->result();
        return count($nasabah);
    }

    public function getWhere($where)
    {
        $where['status'] = 1;
        $where['deleted_at'] = null;
        return $this->db->get_where($this->table, $where)->result();
    }

    public function search($q, $where = null)
    {
        $where['deleted_at'] = null;
        $where['status'] = 1;
        $this->db->like('nama', $q);
        $queries = $this->db->get_where($this->table, $where)->result();
        return $queries;
    }

    public function findById($id)
	{
		$data = $this->db->get_where($this->table, ['id' => $id])->num_rows();
		if($data > 0){
			return true;
		} else {
			return false;
		}
	}

	public function findByidUserId($id, $user_id)
	{
		$data = $this->db->get_where($this->table, ['id' => $id, 'user_id' => $user_id])->num_rows();
		if($data > 0){
			return true;
		} else {
			return false;
		}
	}

	public function findWhere($where)
    {
        $where['status'] = 1;
        $where['deleted_at'] = null;
        return $this->db->get_where($this->table, $where)->row();
    }

    public function getNasabahByUser($user_id)
	{
		$nasabahs = $this->db->select('a.*','a.nama')
                            ->order_by('a.id','desc')
                            ->join('users b', 'b.id = a.user_id', 'left')
								->get_where($this->table.' a', ['a.user_id' => $user_id])
								->result();

        return $nasabahs;
    }
    public function getNasabahjumlahByUser($user_id)
	{
		$nasabahs = $this->db->select('a.*','a.nama')
                            ->order_by('a.id','desc')
                            ->join('users b', 'b.id = a.user_id', 'left')
								->get_where($this->table.' a', ['a.user_id' => $user_id])
								->num_rows();

        return $nasabahs;
    }

    public function store($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        $this->db->insert($this->table,$data);
    }

    public function update($where, $data)
    {
        return $this->db->update($this->table, $data, $where);
    }

    public function destroy($where)
    {
        $this->db->delete($this->table, $where);
    }
}