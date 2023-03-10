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
            echo json_encode($message);
        }else{
            echo json_encode("true");
        }
    }
    public function addCash(){
        $current_cash = cash_in_hand();
        $added_cash = $this->input->post('new_cash');
        $id = $this->session->userdata('user_id');
        $new_cash = $current_cash + $added_cash;
        $data_add = array(
            'previous_cash' => $current_cash,
            'type'=> 'Cash In',
            'cash' => $added_cash,
            'cash_by' => 'Self',
        );
        $insert = $this->db->insert('cash_register', $data_add);
        if($insert) {
            $data_update = array(
                'cash_in_hand' => $new_cash
            );
            $update = $this
                ->db
                ->where('id', $id)
                ->update('users', $data_update);
            if ($update) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Cash of ' . $added_cash . ' PKR Added Successfully');
                echo json_encode('true');
            }
        }
    }
    public function delExpenseType(){
        $expense_id = $this->input->post('id');
        $id = str_decode($expense_id);


        $result = $this->handler->delete('expense_types', 'id', $id);
        if($result){
            echo json_encode('true');            
        }
    }

    public function delCategory(){
        $cat_id = $this->input->post('id');
        $id = str_decode($cat_id);


        $result = $this->handler->delete('categories', 'id', $id);
        if($result){
            echo json_encode('true');
        }
    }

    public function delUnit(){
        $unit_id = $this->input->post('id');
        $id = str_decode($unit_id);


        $result = $this->handler->delete('units', 'id', $id);
        if($result){
            echo json_encode('true');
        }
    }

    public function delBrand(){
        $brand_id = $this->input->post('id');
        $id = str_decode($brand_id);


        $result = $this->handler->delete('brands', 'id', $id);
        if($result){
            echo json_encode('true');
        }
    }

    public function getUnitsByCatId(){
        $cat_id = $this->input->get('id');
        $id = str_decode($cat_id);

        $units = $this->handler->select_where('units', 'cat_id', $id, FALSE, FALSE);

        if($units) {
            $units_arr = [];
            foreach ($units as $unit) {
                $unit_new = array(
                    'id' => str_encode($unit['id']),
                    'name' => $unit['name'],
                    'qty' => $unit['qty']
                );

                array_push($units_arr, $unit_new);
            }

            echo json_encode($units_arr);
        }else{
            echo json_encode('false');
        }
    }

    public function getUnitQtyByUnitId(){
        $unit_id = $this->input->get('id');
        $id = str_decode($unit_id);

        $price = $this->handler->getCell('units', 'id',$id,'qty');

        echo json_encode($price);
    }

    public function delProduct(){
        $product_id = $this->input->post('id');
        $id = str_decode($product_id);


        $result = $this->handler->delete('products', 'id', $id);
        if($result){
            echo json_encode('true');
        }
    }
}