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

        if (!$count) {
            return $query->row();
        } else if (!$single) {
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
}