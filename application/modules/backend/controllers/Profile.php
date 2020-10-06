<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('auth');
        $this->auth->route_access();
    }

    public function index()
    {
        $data['content'] = 'profile/index';
        return $this->load->view('app', $data);
    }
}