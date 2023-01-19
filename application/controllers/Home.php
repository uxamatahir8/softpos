<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('handler');
    }

    public function index()
	{
        if($this->session->userdata('user_id')){
            redirect(URL.'dashboard');
        }else{
            $data['title'] = 'Sign In';
            $this->load->view('auth', $data);
        }

	}

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['main_content'] = 'dashboard/index';

        $this->load->view("dashboard",$data);
    }
}
