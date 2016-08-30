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
        $this->db->where('players_phases.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_player_id($update_id){
        $table = $this->get_table();
        $this->db->select('players_phases.players_id, players.id, players.last_name, players.first_name');
        $this->db->join('players', 'players_phases.players_id = players.id', 'inner');
        $this->db->where('players_phases.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_team_id($update_id){
        $table = $this->get_table();
        $this->db->select('players_phases.players_id, players_phases.teams_phases_id, teams_phases.id, teams_phases.teams_id, teams.id, teams.team_name');
        $this->db->join('teams_phases', 'players_phases.teams_phases_id = teams_phases.id', 'inner');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'right');
        $this->db->where('players_phases.id',$update_id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_player_status($league_id, $active = TRUE) {
        $table = $this->get_table();
        $this->db->select('
                                  players_phases.id as players_phases_id,
                                  players_phases.players_id as players_phases_players_id,
                                  players_phases.leagues_id as players_phases_leagues_id,
                                  players_phases.teams_phases_id as players_phases_teams_phases_id,
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
                                  teams_phases.id as teams_phases_id,
                                  teams_phases.teams_id as teams_phases_teams_id,
                                  teams.id as teams_id,
                                  teams.team_name
                                  ');
        $this->db->join('leagues', 'players_phases.leagues_id = leagues.id', 'inner');
        $this->db->join('teams_phases', 'players_phases.teams_phases_id = teams_phases.id');
        $this->db->join('teams', 'teams_phases.teams_id = teams.id', 'inner');
        $this->db->join('players', 'players_phases.players_id = players.id', 'inner');
        $this->db->where('leagues.id', $league_id);
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

    function get_home_team($contest_id) {
        $query = $this->db->query('
        select sports_events.home_team_phase_id,
        sports_events.away_team_phase_id
        FROM contests_has_sports_events
        INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
        ');
        return $query;
    }

    function get_players_list_contest($contest_id, $position) {
        $table = $this->get_table();
        $sports_events_id = $this->db->query('
        select sports_events.home_team_phase_id,
        sports_events.away_team_phase_id
        FROM contests_has_sports_events
        INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
        ');
        $this->db->join('players', 'players_phases.players_id = players.id');
        $this->db->where('position', $position);
        $this->db->group_start();
        foreach($sports_events_id->result() as $row) {
            $home_team_phase_id = $row->home_team_phase_id;
            $away_team_phase_id = $row->away_team_phase_id;
            $this->db->or_where('teams_phases_id', $home_team_phase_id);
            $this->db->or_where('teams_phases_id', $away_team_phase_id);
        }
        $this->db->group_end();
        $query = $this->db->get($table);
        return $query;
    }

    function get_all_players_list_contest($contest_id) {
        $table = $this->get_table();
        $this->db->select('players_phases.id as players_phases_id,
                            players.first_name,
                            players.last_name,
                            players_phases.teams_phases_id as players_phases_teams_phases_id,
                            players_phases.position,
                            players_phases.height,
                            players_phases.weight,
                            teams.team_name,
                            teams.team_shorthand
                            ');
        $sports_events_id = $this->db->query('
        SELECT sports_events.home_team_phase_id,
        sports_events.away_team_phase_id
        FROM contests_has_sports_events
        INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
        ');
        $this->db->join('players', 'players_phases.players_id = players.id');
        $this->db->join('teams', 'teams.id = players_phases.teams_phases_id');
        $this->db->group_start();
        foreach($sports_events_id->result() as $row) {
            $home_team_phase_id = $row->home_team_phase_id;
            $away_team_phase_id = $row->away_team_phase_id;
            $this->db->or_where('teams_phases_id', $home_team_phase_id);
            $this->db->or_where('teams_phases_id', $away_team_phase_id);
        };
        $this->db->group_end();
        $this->db->order_by('players_phases.id');
        $query = $this->db->get($table);
        return $query;
    }

    function get_players_list_contest_individual($contest_id, $player_id) {
        $query = $this->db->query('
                SELECT
                players_phases.id as players_phases_id,
                players.first_name,
                players.last_name,
                players.dob,
                players_phases.teams_phases_id as players_phases_teams_phases_id,
                players_phases.position,
                players_phases.height,
                players_phases.weight,
                players_phases.depth_chart,
                teams.team_name,
                teams.team_shorthand,
                soccer_stats_calcs.avg_fp,
                soccer_stats_calcs.form
                FROM players_phases
                JOIN players ON players_phases.players_id = players.id
                JOIN teams_phases ON players_phases.teams_phases_id = teams_phases.id
                JOIN teams ON teams.id = teams_phases.teams_id
                JOIN soccer_stats_calcs ON soccer_stats_calcs.players_phases_id = players_phases.id
                WHERE players_phases.id = '.$player_id.'
        '); 
        return $query;
    }

    function get_player_stats($contest_id) {
        $events_date = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events` 
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        LIMIT 1
        ');
        foreach($events_date->result() as $row) {
            $event_date = $row->start_date;
            $query = $this->db->query('
                SELECT 
                soccer_stats.players_phases_id,
                COUNT(soccer_stats.players_phases_id) as counting,
                SUM(soccer_stats.goals) as total_goals,
                SUM(soccer_stats.assists) as total_assists,
                SUM(soccer_stats.key_passes) as total_key_passes,
                SUM(soccer_stats.tackles) as total_tackles,
                SUM(soccer_stats.interceptions) as total_interceptions,
                SUM(soccer_stats.clearances) as total_clearances,
                SUM(soccer_stats.passes) as total_passes,
                SUM(soccer_stats.crosses) as total_crosses,
                SUM(soccer_stats.accurate_crosses) as total_accurate_crosses
                FROM soccer_stats
                WHERE soccer_stats.date < \''.$event_date.'\'
                GROUP BY soccer_stats.players_phases_id  
                ORDER BY `soccer_stats`.`players_phases_id` ASC
                ');
            };
        return $query;
    }

    function get_form($contest_id) {
        $events_date = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events` 
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        LIMIT 1
        ');
        foreach($events_date->result() as $row) {
            $event_date = $row->start_date;
            $query = $this->db->query('
                SELECT 
                i3.players_phases_id,
                COUNT(i3.players_phases_id) as counting,
                SUM(i3.goals) as total_goals,
                SUM(i3.assists) as total_assists,
                SUM(i3.key_passes) as total_key_passes,
                SUM(i3.tackles) as total_tackles,
                SUM(i3.interceptions) as total_interceptions,
                SUM(i3.clearances) as total_clearances,
                SUM(i3.passes) as total_passes,
                SUM(i3.crosses) as total_crosses,
                SUM(i3.accurate_crosses) as total_accurate_crosses
                FROM (
                SELECT i1.*
                FROM soccer_stats i1
                LEFT OUTER JOIN soccer_stats i2 ON (i1.players_phases_id = i2.players_phases_id and i1.id > i2.id)
                WHERE i1.date < \''.$event_date.'\'
                GROUP BY i1.id  
                HAVING COUNT(*) < 4
                ) as i3
                GROUP BY i3.players_phases_id
                ORDER BY i3.players_phases_id ASC, i3.date DESC 
                ');
        };
        return $query;
    }

    function get_player_salary($contest_id) {
        $events_date = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events` 
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        LIMIT 1
        ');
        foreach($events_date->result() as $row) {
            $event_date = $row->start_date;
            $query = $this->db->query('
                SELECT 
                soccer_stats.id,
                soccer_stats.players_phases_id,
                soccer_stats.salary
                FROM soccer_stats
                WHERE soccer_stats.id IN (
                        SELECT MAX(soccer_stats.id)
                        FROM soccer_stats 
                    	WHERE soccer_stats.date <= DATE_ADD(\''.$event_date.'\',INTERVAL 5 DAY)
                        GROUP BY soccer_stats.players_phases_id
                    ) ORDER BY `players_phases_id` ASC
                ');
        };
        return $query;
    }

    function get_form_individual($contest_id, $player_id) {
        $events_date = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events` 
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        LIMIT 1
        ');
        foreach($events_date->result() as $row) {
            $event_date = $row->start_date;
            $query = $this->db->query('
                SELECT 
                i3.players_phases_id,
                COUNT(i3.players_phases_id) as counting,
                SUM(i3.goals) as total_goals,
                SUM(i3.assists) as total_assists,
                SUM(i3.key_passes) as total_key_passes,
                SUM(i3.tackles) as total_tackles,
                SUM(i3.interceptions) as total_interceptions,
                SUM(i3.clearances) as total_clearances,
                SUM(i3.passes) as total_passes,
                SUM(i3.crosses) as total_crosses,
                SUM(i3.accurate_crosses) as total_accurate_crosses
                FROM (
                SELECT i1.*
                FROM soccer_stats i1
                LEFT OUTER JOIN soccer_stats i2 ON (i1.players_phases_id = i2.players_phases_id and i1.id > i2.id)
                WHERE i1.date < \''.$event_date.'\'
                GROUP BY i1.id  
                HAVING COUNT(*) < 4
                ) as i3
                WHERE i3.players_phases_id = '.$player_id.'
                GROUP BY i3.players_phases_id
                ORDER BY i3.players_phases_id ASC, i3.date DESC
                ');
        };
        return $query;
    }

    function get_player_stats_individual($contest_id, $player_id) {
        $table = $this->get_table();
        $events_date = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events` 
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        ');
        $this->db->join('soccer_stats', 'players_phases.players_id = soccer_stats.players_phases_id');
        $this->db->group_start();
        foreach($events_date->result() as $row) {
            $event_date = $row->start_date;
            $this->db->or_where('soccer_stats.date', $event_date);
        };
        $this->db->group_end();
        $this->db->where('players_phases.id', $player_id);
        $this->db->order_by('players_phases.id');
        $query = $this->db->get($table);
        return $query;
    }

    function get_player_stats_individual_trial($contest_id, $player_id) {
        $query_start = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events`
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        ORDER BY `sports_events`.`start_date` ASC
        LIMIT 1
        ');
        foreach($query_start->result() as $row) {
            $contest_start_date = $row->start_date;
        };

        $query_end = $this->db->query('
        SELECT DISTINCT sports_events.start_date
        FROM `contests_has_sports_events`
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        ORDER BY `sports_events`.`start_date` DESC
        LIMIT 1
        ');
        foreach($query_end->result() as $row) {
            $contest_end_date = $row->start_date;
        };

        $query_season = $this->db->query('
        SELECT teams_phases.start_date
        FROM teams_phases
        ORDER BY teams_phases.start_date DESC 
        LIMIT 1
        ');
        foreach($query_season->result() as $row) {
            $season_start_date = $row->start_date;
        };

        $query = $this->db->query('
        SELECT * 
        FROM `soccer_stats` 
        JOIN (
            SELECT 
            soccer_stats.id,
            soccer_stats.players_phases_id,
            soccer_stats.salary as latest_salary
            FROM soccer_stats
            WHERE soccer_stats.id IN (
                    SELECT MAX(soccer_stats.id)
                    FROM soccer_stats 
                    WHERE soccer_stats.date <= "' .$contest_end_date. '"
                    GROUP BY soccer_stats.players_phases_id
                    )
            ) i1 ON soccer_stats.players_phases_id = i1.players_phases_id
        WHERE (soccer_stats.date >= " '.$season_start_date.' " AND soccer_stats.date < " '.$contest_start_date.' " AND soccer_stats.players_phases_id = '.$player_id.') 
        ORDER BY `soccer_stats`.`date` DESC
        ');
        return $query;
    }
//
//    function get_player_stats_individual_trial($contest_id, $player_id) {
//        $table = $this->get_table();
//        $events_date = $this->db->query('
//        SELECT DISTINCT sports_events.start_date
//        FROM `contests_has_sports_events`
//        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
//        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
//        ORDER BY sports_events.start_date
//        LIMIT 1
//        ');
//        $this->db->join('soccer_stats', 'players_phases.players_id = soccer_stats.players_phases_id');
//        $this->db->group_start();
//        foreach($events_date->result() as $row) {
//            $event_date = $row->start_date;
//            $this->db->where('soccer_stats.date <', $event_date);
//            $this->db->where('soccer_stats.players_phases_id', $player_id);
//        };
//        $this->db->group_end();
//        $this->db->order_by('soccer_stats.date');
//        $query = $this->db->get($table);
//        return $query;
//    }

    function get_all_players_team($contest_id) {
        $table = $this->get_table();
        $sports_events_id = $this->db->query('
        SELECT sports_events.home_team_phase_id,
        sports_events.away_team_phase_id
        FROM contests_has_sports_events
        INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
        ');
        $this->db->join('players', 'players_phases.players_id = players.id');
        $this->db->group_start();
        foreach($sports_events_id->result() as $row) {
            $home_team_phase_id = $row->home_team_phase_id;
            $away_team_phase_id = $row->away_team_phase_id;
            $this->db->or_where('teams_phases_id', $home_team_phase_id);
            $this->db->or_where('teams_phases_id', $away_team_phase_id);
        };
        $this->db->group_end();
        $this->db->order_by('players_phases.id');
        $query = $this->db->get($table);
        return $query;
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
