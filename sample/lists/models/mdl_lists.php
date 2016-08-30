<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_lists extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function get_list_name($list_id){
        $table = $this->get_table();
        $this->db->where('id',$list_id);
        $query = $this->db->get($table);
        return $query->row()->list_name;
    }
    
    function get_list_tasks($list_id, $active = TRUE) {
        $this->db->select('
                          tasks.task_name,
                          tasks.id as task_id,
                          lists.list_name,
                          ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id');
        $this->db->where('tasks.list_id', $list_id);
        if($active == TRUE) {
            $this->db->where('tasks.is_complete',0);
        } else {
            $this->db->where('tasks.is_complete',1);
        }
        $query = $this->db->get();
        if($query->num_rows() < 1) {
            return FALSE;
        }
        return $query->result();
    }
    
    function get_table() {
        $table = "lists";
        return $table;
    }
    
    function get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }
    
    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col,$value);
        $query = $this->db->get($table);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $table = $this->get_table();
        $this->db->where($col,$value);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }
    
    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }
    
    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }
    
    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }
    
    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }
    
    function count_all() {
        $table = $this->get_table();
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }
    
    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row = $query->row();
        $id = $row->id;
        return $id;
    }
    
    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }
    
}