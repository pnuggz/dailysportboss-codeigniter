<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_teams_phases extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_sport_id($update_id){
        $table = $this->get_table();
        $this->db->where('id',$update_id);
        $this->db->select('sports_id');
        $query = $this->db->get($table);
        return $query;
    }

    function get_league_id($update_id){
        $table = $this->get_table();
        $this->db->where('id',$update_id);
        $this->db->select('leagues_id');
        $query = $this->db->get($table);
        return $query;
    }

    function get_team_id($update_id){
        $table = $this->get_table();
        $this->db->where('id',$update_id);
        $this->db->select('teams_id');
        $query = $this->db->get($table);
        return $query;
    }

   function get_team_status($league_id, $active = TRUE) {
        $table = $this->get_table();
        $this->db->select('
                                  teams_phases.id as teams_phases_id,
                                  teams_phases.sports_id as teams_phases_sports_id,
                                  teams_phases.leagues_id as teams_phases_leagues_id,
                                  teams_phases.teams_id as teams_phases_teams_id,
                                  teams_phases.start_date,
                                  teams_phases.end_date,
                                  teams_phases.stadium_name,
                                  teams_phases.stadium_city,
                                  teams_phases.stadium_country,
                                  sports.id as sports_id,
                                  sports.sport_name,
                                  leagues.id as leagues_id,
                                  leagues.league_shorthand,
                                  teams.id as teams_id,
                                  teams.team_name,
                                  ');
        $this->db->join('sports', 'teams_phases.sports_id = sports.id', 'inner');
        $this->db->join('leagues', 'teams_phases.leagues_id = leagues.id', 'inner');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'inner');
        $this->db->where('leagues_id', $league_id);
        $this->db->order_by('teams.team_name');
        if($active == TRUE) {
            $this->db->where('teams_phases.phase_status',0);
        } else {
            $this->db->where('teams_phases.phase_status',1);
        }
        $query = $this->db->get($table);
        if($query->num_rows() < 1) {
            return FALSE;
        }
        return $query;
    }

    function get_leagues_by_sports($sports_id){
        $this->db->select('id, league_name');
        $query = $this->db->get('leagues');
        $leagues = array();

        if($query->result()){
            foreach ($query->result() as $row) {
                $leagues[$row->id] = $row->city_name;
            }
            return $leagues;
        } else {
            return FALSE;
        }
    }

    function make_inactive($id) {
        $table = $this->get_table();
        $this->db->set('phase_status',1);
        $this->db->where('id', $id);
        $this->db->update($table);
        return TRUE;
    }
    
    function make_active($id) {
        $table = $this->get_table();
        $this->db->set('phase_status',0);
        $this->db->where('id', $id);
        $this->db->update($table);
        return TRUE;
    }
    
    function get_team_list_checked_ordered($value, $order_by) {
        $table = $this->get_table();
        $this->db->select('
        teams_phases.id as teams_phases_id,
        teams_phases.teams_id as teams_phases_team_id,
        teams_phases.leagues_id,
        teams.id as teams_id,
        teams.team_name,
        ');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'inner');
        $this->db->where('teams_phases.leagues_id', $value);
	$this->db->where('teams_phases.phase_status', 0);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_table() {
        $table = "teams_phases";
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
