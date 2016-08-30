<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_contests_entry extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_contest_status($league_id, $active = TRUE)
    {
        $this->db->select('
                                  contests.id as contests_id,
                                  contests.leagues_id,
                                  contests.contest_name,
                                  contests.start_date,
                                  contests.start_time,
                                  contests.entry_max,
                                  contests.sponsors_id,
                                  contests.contest_status,
                                  leagues.id as leagues_id,
                                  leagues.league_name,
                                  leagues.league_shorthand,
                                  ');
        $this->db->join('leagues', 'contests.leagues_id = leagues.id', 'inner');
        $this->db->where('leagues.id', $league_id);
        $this->db->order_by('start_date');
        $this->db->order_by('start_time');
        if ($active == TRUE) {
            $this->db->where('contests.contest_status', 0);
        } else {
            $this->db->where('contests.contest_status', 1);
        }
        $query = $this->db->get('contests');
        if ($query->num_rows() < 1) {
            return FALSE;
        }
        return $query;
    }

    function _transactions_new_contest_entry($contest_roster_data, $user_contest_data){
        $this->db->trans_start();
        $this->db->insert('contests_users_entries', $user_contest_data);
        $contest_user_entry_id = $this->db->query('SELECT contests_users_entries.id FROM contests_users_entries ORDER BY contests_users_entries.id DESC LIMIT 1');
        foreach ($contest_user_entry_id->result() as $row) {
            $contests_users_entry_id = $row->id;
            $array = array( 'contests_users_entry_id'    =>     $contests_users_entry_id);
            };
        $contest_roster_data_entry = array_merge($contest_roster_data, $array);
        $this->db->insert('contests_rosters', $contest_roster_data_entry);
        $this->db->trans_complete();
    }

    function get_db_selected_players($contest_id) {
        $query = $this->db->query('
        SELECT 
        players_p1.first_name as first_name_p1,
        players_p1.last_name as last_name_p1,
        players_phases_p1.position as position_p1,
        players_phases_p1.depth_chart as depth_chart_p1,
        players_p2.first_name as first_name_p2,
        players_p2.last_name as last_name_p2,
        players_phases_p2.position as position_p2,
        players_phases_p2.depth_chart as depth_chart_p2,
        players_p3.first_name as first_name_p3,
        players_p3.last_name as last_name_p3,
        players_phases_p3.position as position_p3,
        players_phases_p3.depth_chart as depth_chart_p3,
        players_p4.first_name as first_name_p4,
        players_p4.last_name as last_name_p4,
        players_phases_p4.position as position_p4,
        players_phases_p4.depth_chart as depth_chart_p4,
        players_p5.first_name as first_name_p5,
        players_p5.last_name as last_name_p5,
        players_phases_p5.position as position_p5,
        players_phases_p5.depth_chart as depth_chart_p5,
        players_p6.first_name as first_name_p6,
        players_p6.last_name as last_name_p6,
        players_phases_p6.position as position_p6,
        players_phases_p6.depth_chart as depth_chart_p6,
        players_p7.first_name as first_name_p7,
        players_p7.last_name as last_name_p7,
        players_phases_p7.position as position_p7,
        players_phases_p7.depth_chart as depth_chart_p7,
        players_p8.first_name as first_name_p8,
        players_p8.last_name as last_name_p8,
        players_phases_p8.position as position_p8,
        players_phases_p8.depth_chart as depth_chart_p8,
        players_p9.first_name as first_name_p9,
        players_p9.last_name as last_name_p9,
        players_phases_p9.position as position_p9,
        players_phases_p9.depth_chart as depth_chart_p9,
        players_p10.first_name as first_name_p10,
        players_p10.last_name as last_name_p10,
        players_phases_p10.position as position_p10,
        players_phases_p10.depth_chart as depth_chart_p10
        FROM contests_rosters
        INNER JOIN players_phases AS players_phases_p1 ON contests_rosters.player1 = players_phases_p1.id
        INNER JOIN players AS players_p1 ON players_phases_p1.players_id = players_p1.id
        INNER JOIN players_phases AS players_phases_p2 ON contests_rosters.player2 = players_phases_p2.id
        INNER JOIN players AS players_p2 ON players_phases_p2.players_id = players_p2.id
        INNER JOIN players_phases AS players_phases_p3 ON contests_rosters.player3 = players_phases_p3.id
        INNER JOIN players AS players_p3 ON players_phases_p3.players_id = players_p3.id
        INNER JOIN players_phases AS players_phases_p4 ON contests_rosters.player4 = players_phases_p4.id
        INNER JOIN players AS players_p4 ON players_phases_p4.players_id = players_p4.id
        INNER JOIN players_phases AS players_phases_p5 ON contests_rosters.player5 = players_phases_p5.id
        INNER JOIN players AS players_p5 ON players_phases_p5.players_id = players_p5.id
        INNER JOIN players_phases AS players_phases_p6 ON contests_rosters.player6 = players_phases_p6.id
        INNER JOIN players AS players_p6 ON players_phases_p6.players_id = players_p6.id
        INNER JOIN players_phases AS players_phases_p7 ON contests_rosters.player7 = players_phases_p7.id
        INNER JOIN players AS players_p7 ON players_phases_p7.players_id = players_p7.id
        INNER JOIN players_phases AS players_phases_p8 ON contests_rosters.player8 = players_phases_p8.id
        INNER JOIN players AS players_p8 ON players_phases_p8.players_id = players_p8.id
        INNER JOIN players_phases AS players_phases_p9 ON contests_rosters.player9 = players_phases_p9.id
        INNER JOIN players AS players_p9 ON players_phases_p9.players_id = players_p9.id
        INNER JOIN players_phases AS players_phases_p10 ON contests_rosters.player10 = players_phases_p10.id
        INNER JOIN players AS players_p10 ON players_phases_p10.players_id = players_p10.id
        WHERE contests_rosters.id = ' .$contest_id. '
        ');
        return $query;
    }

}