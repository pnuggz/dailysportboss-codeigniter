<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_contests_users_entries extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_users_list($contest_id) {
        $query = $this->db->query('
        SELECT contests_users_entries.id as contests_users_entries_id,
        contests_users_entries.entry_date_time,
        contests_users_entries.contest_id,
        contests_users_entries.user_entry_count,
        contests_rosters.id as contests_rosters_id,
        contests_rosters.roster_name,
        users.id as user_id,
        users.first_name,
        users.last_name,
        users.username,
        users.email
        FROM `contests_users_entries`
        INNER JOIN users ON contests_users_entries.user_id = users.id
        INNER JOIN contests_rosters ON contests_users_entries.id = contests_rosters.contests_users_entry_id
        WHERE contests_users_entries.contest_id = ' .$contest_id. '
        ');
        return $query;
    }
    
    function get_user_entry_count($user_id, $contest_id) {
        $query = $this->db->query('
        SELECT contests_users_entries.user_entry_count
        FROM contests_users_entries
        WHERE (contests_users_entries.user_id = ' .$user_id. ' AND contests_users_entries.contest_id = ' .$contest_id. ')
        ORDER BY contests_users_entries.user_entry_count DESC
        LIMIT 1
        ');
        return $query;
    }
    
    function get_table() {
        $table = "contests_users_entries";
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
    
    function get_where ($id) {
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