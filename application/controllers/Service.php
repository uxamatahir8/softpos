<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('handler');
    }
    public function checkPassword(){
        $current_password = $this->input->get("curr_pass");
        $user_id = $this->session->userdata("user_id");

        $get_user_details = $this->handler->select_where('users','id', $user_id, false);

        $curr_pass = $get_user_details->password;

        if($curr_pass != md5($current_password)){
            $message = 'Current Password Not Matched';
            echo json_encode('Current Password Is Incorrect');
        }else{
            echo json_encode("true");
        }
    }
}