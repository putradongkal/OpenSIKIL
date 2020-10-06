<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('auth');
        $this->auth->except(['datatables']);
    }

    public function index(){
        $data['content'] = 'home/index';
        $this->load->view('app', $data);
    }
}