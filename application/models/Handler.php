<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Handler extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function select($table, $column = 'id', $order_by = 'DESC', $count = FALSE)
    {
        $query = $this
            ->db
            ->order_by($column, $order_by)
            ->get($table);

        if (!$count) {
            return $query->result_array();
        } else {
            return $query->num_rows();
        }
    }
    public function select_where($table, $column, $condition, $count = FALSE, $single = TRUE)
    {
        $query = $this
            ->db
            ->where($column, $condition)
            ->get($table);

        if (!$count && $single) {
            return $query->row();
        } else if (!$single && !$count) {
            return $query->result_array();
        } else {
            return $query->num_rows();
        }
    }
    public function delete($table, $column = FALSE, $condition = FALSE)
    {
        if (!$column) {
            $query = $this->db->delete($table);
        } else {
            $query = $this
                ->db
                ->where($column, $condition)
                ->delete($table);
        }

        return $query;
    }
    public function truncate($table)
    {
        $this->db->truncate($table);
    }

    public function getCell($table, $column, $condition, $cell_name)
    {
        $query = $this
            ->db
            ->where($column, $condition)
            ->get($table);

        return $query->row()->$cell_name;
    }

    public function getExpenses($order_by){
        $query = $this
                ->db
                ->order_by('expense.id',$order_by)
                ->join('expense_types', 'expense_types.id=expense.type_id', 'inner')
                ->get('expense');

        return $query->result_array();
    }
    public function getUnits(){
        $query = $this
                ->db
                ->select('units.id as unit_id, units.name, units.qty, categories.name as cat_name, categories.id')
                ->join('categories', 'categories.id=units.cat_id','inner')
                ->get('units');

        return $query->result_array();
    }

    public function getUnitsById($unit_id){
        $query = $this
            ->db
            ->select('units.id as unit_id, units.name, units.qty, categories.name as cat_name, categories.id')
            ->where('units.id',$unit_id)
            ->join('categories', 'categories.id=units.cat_id','inner')
            ->get('units');

        return $query->row();
    }

    public function getProducts(){
        $query = $this
                    ->db
                    ->order_by('products.name','ASC')
                    ->select('products.*, brands.name as brand_name, categories.name as cat_name')
                    ->join('brands','brands.id=products.brand_id','inner')
                    ->join('categories','categories.id=products.cat_id','inner')
                    ->get('products');

        return $query->result_array();
    }

    public function getProductById($id){
        $query = $this
            ->db
            ->select('products.*, brands.id as brand_id, brands.name as brand_name, categories.id as cat_id, categories.name as cat_name')
            ->where('products.id',$id)
            ->join('brands','brands.id=products.brand_id','inner')
            ->join('categories','categories.id=products.cat_id','inner')
            ->get('products');

        return $query->row();
    }

}