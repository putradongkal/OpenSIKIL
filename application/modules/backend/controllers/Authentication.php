<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('auth');
        $this->auth->except(['logout', 'login', 'index']);
    }

    public function index()
    {
        if($this->auth->loginStatus())
        {
            redirect(base_url('home'));
        }

        redirect(base_url('login'));
    }

    public function login()
    {
        $data = array();

        if($_POST) {
            $data = $this->auth->login($_POST);
        }

        return $this->load->view('auth/login', $data);
    }

    public function logout()
    {
        if($this->input->post()) {
            $this->auth->logout();
            redirect(base_url('login'));
        }

        show_404();
    }
}