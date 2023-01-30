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
        $data['title'] = 'Units';
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

    public function updateProductUnit(){
        $unit_id = $this->input->post('unit_id');
        $id = str_decode($unit_id);
        $cat_id = $this->input->post('cat_id');
        $unit_name = $this->input->post('name');
        $qty = $this->input->post('qty');
        $data = array(
            'cat_id' => str_decode($cat_id),
            'name' => $unit_name,
            'qty' => $qty
        );

        $insert = $this
                    ->db
                    ->where("id",$id)
                    ->update('units', $data);

        if($insert){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Unit Updated Successfully');
            redirect(URL . 'units');
        }
    }

    public function productBrands($mode = '', $brand_id=''){
        $data['title'] = 'Brands';
        $data['main_content'] = 'dashboard/brands';
        $data['mode'] = 'normal';

        if($mode != '' && $brand_id != ''){
            $data['mode'] = 'edit';
            $id = str_decode($brand_id);
            $data['brand'] = $this->handler->select_where('brands','id',$id);
        }

        $data['brands']= $this->handler->select('brands');

        $this->load->view('dashboard',$data);
    }

    public function addProductBrand(){
        $name = $this->input->post('name');
        $data = array(
            'name' => $name
        );

        $insert = $this->db->insert('brands', $data);

        if($insert){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Brand Added Successfully');
            redirect(URL . 'brands');
        }
    }


    public function updateProductBrand(){
        $brand_id = $this->input->post('brand_id');
        $id = str_decode($brand_id);
        $name = $this->input->post('name');


        $data = array(
            'name' => $name
        );

        $update = $this
            ->db
            ->where("id",$id)
            ->update('brands', $data);

        if($update){
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Brand Updated Successfully');
            redirect(URL . 'brands');
        }
    }

    public function products(){
        $data['title'] = 'Products';
        $data['main_content'] = 'dashboard/products';

        $data['products'] = $this->handler->getProducts();


        $this->load->view('dashboard',$data);
    }

    public function manageProduct($mode = 'add', $product_id = ''){

        if($mode == 'add' && empty($product_id)){
            $title = 'Add Product';
        }else if($mode == 'edit' && !empty($product_id)){
            $title = 'Edit Product';
        }else if($mode== 'view' && !empty($product_id)){
            $title = 'View Product';
        }


        if(isset($product_id) && !empty($product_id)){
            $id = str_decode($product_id);
            $data['product'] = $this->handler->getProductById($id);
        }


        $data['title'] = $title;
        $data['main_content'] = 'dashboard/manage-product';
        $data['mode'] = $mode;

        $data['categories']= $this->handler->select('categories');
        $data['brands']= $this->handler->select('brands');

        $this->load->view('dashboard',$data);
    }

    public function addNewProduct(){
        $brand_id = str_decode($this->input->post('brand_id'));
        $cat_id = str_decode($this->input->post('cat_id'));
        $name = $this->input->post('name');
        $stock_alert = $this->input->post('stock_alert');
        $curr_qty = $this->input->post('total_qty');
        $purchase_price = $this->input->post('purchase_price_per_qty');
        $sale_price = $this->input->post('sale_price_per_qty');


        $data = array(
            'brand_id' => $brand_id,
            'cat_id' => $cat_id,
            'name' => $name,
            'stock_alert' => $stock_alert,
            'curr_qty' => $curr_qty,
            'purchase_price' => $purchase_price,
            'sale_price' => $sale_price
        );

        $insert = $this->db->insert('products',$data);


        if($insert){
            $this->session->set_flashdata('message_type','success');
            $this->session->set_flashdata('message','Product Added Successfully');
            redirect(URL.'products');
        }

    }

}
