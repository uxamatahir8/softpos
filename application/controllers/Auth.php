<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('handler');
    }
    public function userLogin(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $user_check = $this->handler->select_where('users', 'username', $username, true);
        if($user_check){
            $get_user_details = $this->handler->select_where('users','username',$username,false);
            if($get_user_details->password == md5($password)){
                $this->session->set_flashdata('message_type','success');
                $this->session->set_flashdata('message','Welcome '. $get_user_details->name. ', Logged In Successfully');

                $this->session->set_userdata('user_id',$get_user_details->id);
                $this->session->set_userdata('user_name',$get_user_details->name);
                redirect(URL.'dashboard');
            }else{
                $this->session->set_flashdata('message_type','danger');
                $this->session->set_flashdata('message','Password is Invalid');
                redirect(URL);
            }
        }else{
            $this->session->set_flashdata('message_type','danger');
            $this->session->set_flashdata('message','Username Does Not Exists');
            redirect(URL);
        }
    }

    public function updatePassword(){
        $new_password = md5($this->input->post('new_password'));
        $user_id = $this->session->userdata("user_id");
        $data = array(
            'password' => $new_password
        );
        $update = $this
                    ->db
                    ->where('id', $user_id)
                    ->update('users', $data);
        if($update){
            $this->session->set_flashdata("message_type",'success');
            $this->session->set_flashdata('message','Password Changed Successfully');
            redirect(URL.'change-password');
        }
    }
    public function logout(){
        session_destroy();
        redirect(URL);
    }
}