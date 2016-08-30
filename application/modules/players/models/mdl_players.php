<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_players extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_where_custom_ordered_checked($col, $value, $order_by) {
        $query = $this->db->query('
            SELECT players.id, players.first_name, players.last_name, players.sports_id, players_phases.phase_status
            FROM players_phases
            RIGHT JOIN players ON players_phases.players_id = players.id
            WHERE (players.id NOT IN (SELECT players_phases.players_id FROM players_phases) 
            AND ' .$col. ' = ' .$value. ')
            OR (players_phases.phase_status = \'1\' AND ' .$col. ' = ' .$value. ')
            AND (players.id NOT IN (SELECT DISTINCT players_phases.players_id FROM players_phases WHERE players_phases.phase_status = \'0\'))
            ORDER BY ' .$order_by. '
                          ');
        return $query;
    }

    function get_players() {
        $table = $this->get_table();
        $this->db->select('
        players.id as players_id,
        players.sports_id as players_sports_id,
        players.first_name,
        players.last_name,
        players.nickname,
        players.dob,
        players.nationality,
        sports.id as sports_id,
        sports.sport_name,
        ');
        $this->db->join('sports', 'players.sports_id = sports.id', 'inner');
        $this->db->order_by('players.last_name');
        $query = $this->db->get($table);
        return $query;
    }

    function get_sport_id($update_id){
        $table = $this->get_table();
        $this->db->where('id',$update_id);
        $this->db->select('sports_id');
        $query = $this->db->get($table);
        return $query;
    }
    
    function get_table() {
        $table = "players";
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