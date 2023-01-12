<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handler extends CI_Model{


    public function __construct()
    {
        parent::__construct();
    }


    public function select($table, $column = 'id', $order_by = 'DESC', $count=FALSE)
    {
        $query = $this
                    ->db
                    ->order_by($column, $order_by)
                    ->get($table);

        if(!$count){
            return $query->result();
        }else{
            return $query->num_rows();
        }
    }

    public function select_where($table, $column, $condition, $count=FALSE, $single = TRUE)
    {
        $query = $this
                    ->db
                    ->where($column,$condition)
                    ->get($table);

        if(!$count){
            return $query->row();
        }else if (!$single){
            return $query->result();
        }else{
            return $query->num_rows();
        }
    }


    public function delete($table, $column = FALSE, $condition = FALSE){
        if(!$column){
            $this->db->delete($table);
        }else{
            $this
                ->db
                ->where($column, $condition)
                ->delete($table);
        }
    }

    public function truncate($table){
        $this->db->truncate($table);
    }

}