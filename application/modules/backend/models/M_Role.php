<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Role extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'roles';
    }

    public function get(){
        $where['deleted_at'] = null;
        return $this->db->get_where($this->table, $where)->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
    }

    public function findWhere($where)
    {
        $where['deleted_at'] = null;
        return $this->db->get_where($this->table, $where)->row();
    }

    public function findJoinWhere($where)
    {
        $where['a.deleted_at'] = null;
        return $this->db->select('a.*, b.role_id, c.name role_name')
            ->join('roles_users b', 'b.user_id = a.id', 'left')
            ->join('roles c', 'c.id = b.role_id', 'left')
            ->get_where($this->table . ' a', $where)->row();
    }

    public function destroy($where)
    {
        $where['deleted_at'] = null;
        return $this->db->delete($this->table, $where);
    }

    public function softdelete($where)
    {
        $this->db->update($this->table, ['deleted_at' => date('Y-m-d H:i:s')], $where);
    }
}