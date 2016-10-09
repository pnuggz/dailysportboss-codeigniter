<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_sports_events extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_event_status($league_id, $active = TRUE) {
        $table = $this->get_table();
        $this->db->select('
                                  sports_events.id as sports_events_id,
                                  sports_events.leagues_id as sports_events_leagues_id,
                                  sports_events.start_date,
                                  sports_events.start_time,
                                  sports_events.event_status,
                                  sports_events.weather_id,
                                  sports_events.soccer_live_id,
                                  leagues.id as leagues_id,
                                  leagues.league_name,
                                  leagues.league_shorthand,
                                  ');
        $this->db->join('leagues', 'sports_events.leagues_id = leagues.id', 'inner');
        $this->db->where('leagues.id', $league_id);
        $this->db->order_by('start_date');
        if($active == TRUE) {
            $this->db->where('sports_events.event_status',0);
        } else {
            $this->db->where('sports_events.event_status',1);
        }
        $query = $this->db->get($table);
        if($query->num_rows() < 1) {
            return FALSE;
        }
        return $query;
    }

    function get_home_team() {
        $query = $this->db->query('SELECT sports_events.home_team_phase_id as sports_events_home_id,
                                          sports_events.id as sports_events_id_home_loop,
                                          teams_phases.id as teams_phases_home_id,
                                          teams_phases.teams_id as teams_phases_team_home_id,
                                          teams.id,
                                          teams.team_name as team_name_home
                                    FROM `sports_events` 
                                    INNER JOIN teams_phases ON sports_events.home_team_phase_id = teams_phases.id
                                    RIGHT JOIN teams on teams_phases.teams_id = teams.id
                                    WHERE sports_events.home_team_phase_id = teams_phases.id');
        return $query;
    }

    function get_away_team() {
        $query = $this->db->query('SELECT sports_events.away_team_phase_id as sports_events_away_id,
                                          sports_events.id as sports_events_id_away_loop,
                                          teams_phases.id as teams_phases_away_id,
                                          teams_phases.teams_id as teams_phases_team_away_id,
                                          teams.id,
                                          teams.team_name as team_name_away
                                    FROM `sports_events` 
                                    INNER JOIN teams_phases ON sports_events.away_team_phase_id = teams_phases.id
                                    RIGHT JOIN teams on teams_phases.teams_id = teams.id
                                    WHERE sports_events.away_team_phase_id = teams_phases.id');
        return $query;
    }

    function get_league_id($update_id){
        $table = $this->get_table();
        $this->db->select('sports_events.id, sports_events.leagues_id, leagues.id as league_id, leagues.league_name');
        $this->db->join('leagues', 'sports_events.leagues_id = leagues.id', 'inner');
        $this->db->where('sports_events.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_home_team_id($update_id){
        $table = $this->get_table();
        $this->db->select('sports_events.home_team_phase_id, teams_phases.id, teams_phases.teams_id, teams.id, teams.team_name as home_team_name');
        $this->db->join('teams_phases', 'sports_events.home_team_phase_id = teams_phases.id', 'inner');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'right');
        $this->db->where('sports_events.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_away_team_id($update_id){
        $table = $this->get_table();
        $this->db->select('sports_events.away_team_phase_id, teams_phases.id, teams_phases.teams_id, teams.id, teams.team_name as away_team_name');
        $this->db->join('teams_phases', 'sports_events.away_team_phase_id = teams_phases.id', 'inner');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'right');
        $this->db->where('sports_events.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function make_inactive($id) {
        $table = $this->get_table();
        $this->db->set('event_status',1);
        $this->db->where('id', $id);
        $this->db->update($table);
        return TRUE;
    }

    function make_active($id) {
        $table = $this->get_table();
        $this->db->set('event_status',0);
        $this->db->where('id', $id);
        $this->db->update($table);
        return TRUE;
    }

    function get_events_list($value) {
        $query = $this->db->query('
        SELECT sports_events.id as sports_events_id, 
        sports_events.start_date as sports_events_start_date, 
        sports_events.start_time as sports_events_start_time, 
        home_teams.team_shorthand as home_team_shorthand,
        away_teams.team_shorthand as away_team_shorthand
        FROM sports_events
        JOIN leagues ON sports_events.leagues_id = leagues.id
        JOIN teams_phases as home_teams_phases ON sports_events.home_team_phase_id = home_teams_phases.id
        JOIN teams_phases as away_teams_phases on sports_events.away_team_phase_id = away_teams_phases.id
        JOIN teams as home_teams ON home_teams_phases.teams_id  = home_teams.id
        JOIN teams as away_teams ON away_teams_phases.teams_id = away_teams.id
        WHERE sports_events.leagues_id = '.$value.' AND sports_events.event_status = 0
        ORDER BY sports_events.start_date, sports_events.start_time, home_teams.team_shorthand
        ');
        return $query;
    }
    
    function get_table() {
        $table = "sports_events";
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