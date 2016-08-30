<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contests_users_entries extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function get_user_entry_count($user_id, $contest_id)
    {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_user_entry_count($user_id, $contest_id);
        return $query;
    }

    function get_users_list($contest_id){
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_users_list($contest_id);
        return $query;
    }

    function get($order_by) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_contests_users_entries');
        $this->mdl_contests_users_entries->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_contests_users_entries');
        $this->mdl_contests_users_entries->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_contests_users_entries');
        $this->mdl_contests_users_entries->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_contests_users_entries');
        $count = $this->mdl_contests_users_entries->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_contests_users_entries');
        $max_id = $this->mdl_contests_users_entries->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_contests_users_entries');
        $query = $this->mdl_contests_users_entries->_custom_query($mysql_query);
        return $query;
    }
    
}