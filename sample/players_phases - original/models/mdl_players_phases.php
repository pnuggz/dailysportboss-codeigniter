<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_players_phases extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_league_id($update_id){
        $table = $this->get_table();
        $this->db->select('players_phases.players_id, players_phases.leagues_id, leagues.id, leagues.league_name');
        $this->db->join('leagues', 'players_phases.leagues_id = leagues.id', 'inner');
        $this->db->where('players_phases.players_id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_player_id($update_id){
        $table = $this->get_table();
        $this->db->select('players_phases.players_id, players.id, players.last_name, players.first_name');
        $this->db->join('players', 'players_phases.players_id = players.id', 'inner');
        $this->db->where('players_phases.players_id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_team_id($update_id){
        $table = $this->get_table();
        $this->db->select('players_phases.players_id, players_phases.teams_id, teams.id, teams.team_name');
        $this->db->join('teams', 'players_phases.teams_id = teams.id', 'inner');
        $this->db->where('players_phases.players_id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_sport_league_name() {
        $this->db->select('
                                  sports.id as sports_id,
                                  sports.sport_name,
                                  leagues.id as leagues_id,
                                  leagues.sports_id as leagues_sports_id,
                                  leagues.league_name,
                                  ');
        $this->db->join('sports', 'leagues.sports_id = sports.id', 'inner');
        $query = $this->db->get('leagues');
        return $query;
    }

    function get_player_status($league_id, $active = TRUE) {
        $table = $this->get_table();
        $this->db->select('
                                  players_phases.id as players_phases_id,
                                  players_phases.players_id as players_phases_players_id,
                                  players_phases.leagues_id as players_phases_leagues_id,
                                  players_phases.teams_id as players_phases_teams_id,
                                  players_phases.start_date,
                                  players_phases.end_date,
                                  players_phases.height,
                                  players_phases.weight,
                                  players_phases.position,
                                  players_phases.number,
                                  players_phases.depth_chart,
                                  players.id as players_id,
                                  players.sports_id,
                                  players.first_name,
                                  players.last_name,
                                  leagues.id as leagues_id,
                                  leagues.league_name,
                                  leagues.league_shorthand,
                                  teams.id as teams_id,
                                  teams.team_name,
                                  ');
        $this->db->join('leagues', 'players_phases.leagues_id = leagues.id', 'inner');
        $this->db->join('teams', 'players_phases.teams_id = teams.id', 'inner');
        $this->db->join('players', 'players_phases.players_id = players.id', 'inner');
        $this->db->where('leagues_id', $league_id);
        $this->db->order_by('players.last_name');
        if($active == TRUE) {
            $this->db->where('players_phases.phase_status',0);
        } else {
            $this->db->where('players_phases.phase_status',1);
        }
        $query = $this->db->get($table);
        if($query->num_rows() < 1) {
            return FALSE;
        }
        return $query;
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
    
    function get_table() {
        $table = "players_phases";
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