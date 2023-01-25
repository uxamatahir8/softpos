<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('handler');
    }
    public function index(){
        if(isset($_SESSION['user_id'])){
            redirect(URL.'dashboard');
        }else{
            $data['title'] = 'Sign In';
            $this->load->view('auth', $data);
        }
    }

    public function changePassword(){
        $data['title'] = 'Change Password';
        $data['main_content'] = 'dashboard/change-password';

        $this->load->view("dashboard",$data);
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['main_content'] = 'dashboard/index';

        $this->load->view("dashboard",$data);
    }
    public function cashRegister(){
        $data['title'] = 'Cash Register';
        $data['main_content'] = 'dashboard/cash-register';

        $data['cash_details'] = $this->handler->select('cash_register');

        $this->load->view("dashboard", $data);
    }
    public function expenseTypes($mode='', $expense_id=''){
        $data['title'] = 'Expense Types';
        $data['main_content'] = 'dashboard/expense-types';
        $data['mode'] = 'normal';

        if($mode != '' && $expense_id != ''){
            $data['mode'] = 'edit';
            $id = str_decode($expense_id);
            $data['expnese_type'] = $this->handler->select_where('expense_types','id',$id);
        }

        $data['expense_types']= $this->handler->select('expense_types');

        $this->load->view('dashboard',$data);
    }
    public function addExpenseType(){
        $expense_type = $this->input->post('expense_type');
        $data = array(
            'name' => $expense_type
        );

        $insert = $this->db->insert('expense_types', $data);

        if($insert){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Expense Type Added Successfully');
            redirect(URL . 'expense-type');
        }
    }
    public function updateExpenseType(){
        $expense_id = $this->input->post('expense_id');
        $id = str_decode($expense_id);
        $expense_type = $this->input->post('expense_type');
        $data = array(
            'name' => $expense_type
        );

        $update = $this
                    ->db
                    ->where('id', $id)
                    ->update('expense_types', $data);

        if($update){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Expense Type Updated Successfully');
            redirect(URL . 'expense-type');
        }
    }
    public function expenses(){
        $data['title'] = 'Expenses';
        $data['main_content'] = 'dashboard/expenses';
        $data['expenses'] = $this->handler->getExpenses('DESC');
        $data['expense_types']= $this->handler->select('expense_types');

        $this->load->view('dashboard', $data);
    }

    public function addExpense(){
        $cash_in_hand = cash_in_hand();
        $type_id = str_decode($this->input->post('expense_type'));
        $expense =$this->input->post('expense_amount');

        $remarks = $this->input->post('expense_remarks');

        $new_cash = $cash_in_hand - $expense;

        $data_insert = array(
            'type_id'=>$type_id,
            'expense' => $expense,
            'remarks' => $remarks
        );


        $insert = $this->db->insert('expense',$data_insert);

        if($insert){
            $data_register = array(
                'previous_cash' => $cash_in_hand,
                'type'=> 'Cash Out',
                'cash' => $expense,
                'cash_by' => 'Expense',
            );

            $insert_reg = $this->db->insert('cash_register',$data_register);

            if($insert_reg){
                $data_update = array(
                    'cash_in_hand'=>$new_cash
                );

                $update = $this
                            ->db
                            ->where('id',$this->session->userdata('user_id'))
                            ->update('users',$data_update);


                if($update){
                    $this->session->set_flashdata('message_type','success');
                    $this->session->set_flashdata('message','Expense Added Successfully');
                    redirect(URL.'expenses');
                }
            }

        }
    }
    public function productCategories($mode='', $cat_id=''){
        $data['title'] = 'Categories';
        $data['main_content'] = 'dashboard/categories';
        $data['mode'] = 'normal';

        if($mode != '' && $cat_id != ''){
            $data['mode'] = 'edit';
            $id = str_decode($cat_id);
            $data['category'] = $this->handler->select_where('categories','id',$id);
        }

        $data['categories']= $this->handler->select('categories');

        $this->load->view('dashboard',$data);
    }

    public function addProductCategory(){
        $name = $this->input->post('name');
        $data = array(
            'name' => $name
        );

        $insert = $this->db->insert('categories', $data);

        if($insert){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Category Added Successfully');
            redirect(URL . 'categories');
        }
    }

    public function updateProductCategory(){
        $cat_id = $this->input->post('cat_id');
        $id = str_decode($cat_id);
        $name = $this->input->post('name');
        $data = array(
            'name' => $name
        );

        $update = $this
                    ->db
                    ->where("id",$id)
                    ->update('categories', $data);

        if($update){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Category Updated Successfully');
            redirect(URL . 'categories');
        }
    }

    public function productUnits($mode='', $unit_id=''){
        $data['title'] = 'Categories';
        $data['main_content'] = 'dashboard/units';
        $data['mode'] = 'normal';

        if($mode != '' && $unit_id != ''){
            $data['mode'] = 'edit';
            $id = str_decode($unit_id);
            $data['unit'] = $this->handler->getUnitsById($id);
        }

        $data['units']= $this->handler->getUnits();
        $data['categories']= $this->handler->select('categories');

        $this->load->view('dashboard',$data);
    }

    public function addProductUnit(){
        $cat_id = $this->input->post('cat_id');
        $unit_name = $this->input->post('name');
        $qty = $this->input->post('qty');
        $data = array(
            'cat_id' => str_decode($cat_id),
            'name' => $unit_name,
            'qty' => $qty
        );

        $insert = $this->db->insert('units', $data);

        if($insert){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Unit Added Successfully');
            redirect(URL . 'units');
        }
    }
}
