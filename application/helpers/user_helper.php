<?php
function role($role_id)
{
	$CI =& get_instance();

	$role = $CI->db->get_where('roles', ['id' => $role_id])->row();

	return $role;
}

function userdata()
{
    $CI =& get_instance();

    $user = $CI->db->get_where('users', ['id' => $CI->session->userdata('userID')])->row();

    return $user;
}