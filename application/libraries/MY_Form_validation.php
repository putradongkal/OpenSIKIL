<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    public function is_self_unique($value, $params)
    {
        $CI =& get_instance();
        $params = explode('.', $params);
        $table = $params[0];
        $field = $params[1];
        $id = isset($params[2]) ? $params[2] : null;
        $where[$field] = $value;

        if($id != null){
            $where['id !='] = $id;
        }

        $data = $CI->db->get_where($table, $where)->row();
        if($data){
            $CI->form_validation->set_message('is_self_unique', '%s sudah digunakan');
            return false;
        } else {
            return true;
        }
    }
}