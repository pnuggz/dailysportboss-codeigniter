<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_draft extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_contest_status($league_id, $active = TRUE,$userid=null)
    {
        $whereleague = '';
        if($league_id){
          $whereleague = " and leagues.id = ".$league_id;
        }

        $result = array();
        $query = $this->db->query('
              SELECT
              contests.id as contests_id,
              contests.leagues_id,
              contests.contest_name,
              contests.entry_max,
              contests.entry_fee,
              contests.entry_limit_register,
              contests.sponsors_id,
              contests.contest_status,
              leagues.id as leagues_id,
              leagues.league_name,
              leagues.league_shorthand,
              t1.start_date,
              t1.start_time,
              contests_prize.prize,
              contests_prize.upto,
              contests_prize.currency,
              sponsors.sponsor,
              COALESCE(t2.entry, 0 ) as entry_count,
              t3.sports_events_start_date,
              t3.sports_events_start_time
              FROM contests
              LEFT JOIN contests_prize ON contests_prize.id = contests.contests_prizes_id
              JOIN leagues ON leagues.id = contests.leagues_id
              JOIN sponsors ON sponsors.id = contests.sponsors_id
              JOIN (
                    SELECT tt1.contests_id, tt1.start_date, tt1.start_time
                    FROM (
                    SELECT DISTINCT contests_has_sports_events.contests_id, sports_events.start_date, sports_events.start_time
                    FROM `contests_has_sports_events`
                    JOIN sports_events ON sports_events.id = contests_has_sports_events.sports_events_id
                    ORDER BY contests_has_sports_events.contests_id, sports_events.start_date ASC, sports_events.start_time ASC
                        ) tt1
                        GROUP BY tt1.contests_id
              ) t1 ON t1.contests_id = contests.id
              LEFT JOIN (
                    SELECT contests_users_entries.contest_id, COUNT(*) as entry
                    FROM contests_users_entries
                    GROUP BY contest_id
              ) t2 ON t2.contest_id = contests.id
              JOIN (
                    SELECT t31.contests_id AS contests_has_sports_events_contests_id,
                           t31.sports_events_id,
                           t31.start_date AS sports_events_start_date,
                           t31.start_time AS sports_events_start_time,
                           t31.event_status AS sports_events_event_status
                    FROM (
                        SELECT DISTINCT contests_has_sports_events.contests_id,
                               contests_has_sports_events.id AS contests_has_sports_events_id,
                               contests_has_sports_events.sports_events_id AS contests_has_sports_events_sports_events_id,
                               sports_events.id AS sports_events_id,
                               sports_events.start_date,
                               sports_events.start_time,
                               sports_events.event_status
                        FROM contests_has_sports_events
                        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                        ORDER BY sports_events.start_date ASC, sports_events.start_time ASC
                    ) t31
                    WHERE t31.event_status = 0
                    GROUP BY t31.contests_id
              ) t3 ON t3.contests_has_sports_events_contests_id = contests.id
              WHERE  contests.contest_status = 0 AND ((CURRENT_DATE BETWEEN contests.start_date AND SUBDATE(t3.sports_events_start_date, INTERVAL 1 DAY)) OR (CURRENT_DATE = t3.sports_events_start_date AND CURRENT_TIME <= SUBTIME(t3.sports_events_start_time, \'00:30:00\')))              ORDER BY t1.start_date DESC, t1.start_time ASC, contests.contest_name DESC
        ');
         $query;
         foreach($query->result() as $row)
         {

           $user_entry_count = 0;
           if($userid) {

               $data1 = $this->get_user_entry_count($row->contests_id, $userid);
                   foreach ($data1->result() as $rows) {
                       $user_entry_count = $rows->user_entry_count;
                   }
           }else{
             $user_entry_count = '-';
           }
           $date = new DateTime($row->start_date.' '.$row->start_time);
           $result[] = array(
             "contest_id" => $row->contests_id,
             "contest_name" => $row->contest_name,
             "league_shorthand" => $row->league_shorthand,
             "start_date" => $row->start_date,
             "start_time" => $row->start_time,
             'start_timestamp'       =>      $date->getTimestamp(),
             'start_fulldate'        =>      date('D M j G:i:s T Y', $date->getTimestamp()),
             "entry_max" => $row->entry_max,
             "entry_fee" => $row->entry_fee,
             "entry_count" => $row->entry_count,
             'entry_max_register' => $row->entry_limit_register,
             'user_entry_count'      =>  $user_entry_count,
             "sponsor_id" => $row->sponsors_id,
             "sponsorname"  => $row->sponsor,
             'sponsorlogo'           =>  base_url().'viewimage/logo/sponsor/'.$row->sponsors_id,
             'sponsorbanner'         =>  base_url().'viewimage/banner/sponsor/'.$row->sponsors_id,
             "leagues_id" => $row->leagues_id,
             "prize" => $row->currency.' '.number_format($row->prize).$row->upto
           );
         }
         return $result;
    }

    function check_contest_start($contest_id)
    {
      $result = 0;
      $today = date('Y-m-d');
      $now = date('H:i:s');
      $query = $this->db->query("
        SELECT *
        FROM contests
        WHERE start_date > '".$today."' AND id = '".$contest_id."'
        ");
       $query;

       if($query->num_rows() > 0)
       {
          $result = $query->num_rows();
       }else{
         $query1 = $this->db->query("
           SELECT *
           FROM contests
           WHERE start_date >= '".$today."' AND start_time >= '".$now."' AND id = '".$contest_id."'
           ");
          $query1;
          $result = $query1->num_rows();
       }

       return $result;
    }

    function get_league()
    {
      $result = array();
      $query = $this->db->query('
        SELECT leagues.id,
               leagues.sports_id,
               leagues.league_name,
               leagues.league_shorthand,
               leagues.league_country
        FROM leagues
        ORDER BY id,sports_id ASC
        ');
       $query;

       foreach($query->result() as $row)
       {
         $result[] = array(
           'leagues_id' => $row->id,
           'sports_id' => $row->sports_id,
           'league_name' => $row->league_name,
           'league_shorthand' => $row->league_shorthand,
           'league_country' => $row->league_country,
           'league_logo'   =>  base_url().'viewimage/logo/leagues/'.$row->id,
         );
       }

       return $result;
    }

    function get_contest_details($league_id, $contest_id)
    {
        $query = $this->db->query('
          SELECT
          contests.id as contests_id,
          contests.leagues_id,
          contests.contest_name,
          contests.entry_max,
          contests.entry_fee,
          contests.entry_limit_register,
          contests.sponsors_id,
          contests.contest_status,
          leagues.id as leagues_id,
          leagues.league_name,
          leagues.league_shorthand,
          t1.start_date,
          t1.start_time,
          contests_prize.prize,
          contests_prize.upto,
          contests_prize.currency,
          sponsors.sponsor,
          COALESCE(t2.entry, 0 ) as entry_count
          FROM contests
          LEFT JOIN contests_prize ON contests_prize.id = contests.contests_prizes_id
          JOIN leagues ON leagues.id = contests.leagues_id
          JOIN sponsors ON sponsors.id = contests.sponsors_id
          JOIN (
                SELECT tt1.contests_id, tt1.start_date, tt1.start_time
                FROM (
                SELECT DISTINCT contests_has_sports_events.contests_id, sports_events.start_date, sports_events.start_time
                FROM `contests_has_sports_events`
                JOIN sports_events ON sports_events.id = contests_has_sports_events.sports_events_id
                ORDER BY contests_has_sports_events.contests_id, sports_events.start_date ASC, sports_events.start_time ASC
                    ) tt1
                    GROUP BY tt1.contests_id
          ) t1 ON t1.contests_id = contests.id
          LEFT JOIN (
                SELECT contests_users_entries.contest_id, COUNT(*) as entry
                FROM contests_users_entries
                GROUP BY contest_id
          ) t2 ON t2.contest_id = contests.id
          WHERE leagues.id = '.$league_id.' AND contests.contest_status = 0 AND contests.id = '.$contest_id.'
          ORDER BY t1.start_date ASC, t1. start_time ASC, contests.contest_name DESC
        ');
        return $query;
    }

    function get_user_entry_count($contest_id, $user_id) {
        $result = $this->db->query('
                  SELECT COALESCE(t1.user_entry, 0 ) as user_entry_count
                  FROM (
                  SELECT contests_users_entries.contest_id, contests_users_entries.user_id, count(*) as user_entry
                  FROM contests_users_entries
                  WHERE contests_users_entries.contest_id = '.$contest_id.' AND contests_users_entries.user_id = '.$user_id.'
                  GROUP BY contests_users_entries.contest_id, contests_users_entries.user_id
                ) t1
        ');
        return $result;
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

    function get_users_list($contest_id, $user_id) {
        $result = array();
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
        WHERE contests_users_entries.contest_id = ' .$contest_id. ' AND user_id = '.$user_id.'
        ');
        foreach($query->result() as $row)
        {
          $result[] = array(
            "contests_users_entries_id" => $row->contests_users_entries_id,
            "entry_date_time" => $row->entry_date_time,
            "contest_id" => $row->contest_id,
            "user_entry_count" => $row->user_entry_count,
            "contests_rosters_id" => $row->contests_rosters_id,
            "roster_name" => $row->roster_name,
            "userid" => $row->user_id,
            "first_name" => $row->first_name,
            "last_name" => $row->last_name,
            "username" => $row->username,
            "email" => $row->email,
          );
        }
        return $result;
    }

    function get_start_date($contest_id) {
        $query = $this->db->query('
            SELECT
            sports_events.start_date
            FROM `contests_has_sports_events`
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN teams_phases as teams_phases_home ON sports_events.home_team_phase_id = teams_phases_home.id
            JOIN teams_phases as teams_phases_away ON sports_events.away_team_phase_id = teams_phases_away.id
            JOIN teams as teams_home ON teams_phases_home.teams_id = teams_home.id
            JOIN teams as teams_away ON teams_phases_away.teams_id = teams_away.id
            WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
            ORDER BY sports_events.start_date ASC
            LIMIT 1
        ');
        return $query;
    }

    function get_end_date($contest_id) {
        $query = $this->db->query('
            SELECT
            sports_events.start_date
            FROM `contests_has_sports_events`
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN teams_phases as teams_phases_home ON sports_events.home_team_phase_id = teams_phases_home.id
            JOIN teams_phases as teams_phases_away ON sports_events.away_team_phase_id = teams_phases_away.id
            JOIN teams as teams_home ON teams_phases_home.teams_id = teams_home.id
            JOIN teams as teams_away ON teams_phases_away.teams_id = teams_away.id
            WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
            ORDER BY sports_events.start_date DESC
            LIMIT 1
        ');
        return $query;
    }

    function get_data_opp_one($teams_phasesid)
    {
        $result = array();
        $query_start = $this->db->query('
        SELECT teams.team_name,teams.team_shorthand
        FROM teams_phases
        JOIN teams ON teams_phases.teams_id = teams.id
        WHERE teams_phases.id = '.$teams_phasesid.'
        ');
        foreach ($query_start->result() as $row) {
          $result = array(
            'team_name' => $row->team_name,
            'team_shorthand' => $row->team_shorthand,
          );
        }
        return $result;
    }

    function get_all_players_one($contest_id,$position) {
        $query_start = $this->db->query('
            SELECT
            sports_events.start_date
            FROM `contests_has_sports_events`
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
            ORDER BY sports_events.start_date ASC
            LIMIT 1
        ');
        foreach ($query_start->result() as $row) {
            $contest_start_date = $row->start_date;
        }

        $query_end = $this->db->query('
            SELECT
            sports_events.start_date
            FROM `contests_has_sports_events`
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            WHERE contests_has_sports_events.contests_id = ' .$contest_id. '
            ORDER BY sports_events.start_date DESC
            LIMIT 1
        ');
        foreach ($query_end->result() as $row) {
            $contest_end_date = $row->start_date;
        }

        $wherepos='';

        if($position)
        {

          $wherepos = " AND players_phases.position ='".ucfirst(strtolower($position))."'";
        }

        $query = $this->db->query('
                SELECT
                i9.players_phases_id,
                i9.players_phases_teams_phases_id,
                i9.position,
                i9.height,
                i9.weight,
                i9.depth_chart,
                i9.descrip,
                i6.salary,
                players.first_name,
                players.last_name,
                teams.team_name,
                teams.team_shorthand,
                soccer_stats_calcs.avg_fp,
                soccer_stats_calcs.form
                FROM (
                    SELECT players_phases.id as players_phases_id,
                                    players_phases.teams_phases_id as players_phases_teams_phases_id,
                                    players_phases.position,
                                    players_phases.height,
                                    players_phases.weight,
                                    players_phases.depth_chart,
                                    teamsId.descrip,
                                    teamsId.teams_phases_ids
                    FROM (
                    SELECT
                    sports_events.home_team_phase_id as teams_phases_ids, \'home\' descrip
                    FROM contests_has_sports_events
                    INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                    WHERE contests_has_sports_events.contests_id = '.$contest_id.'
                        UNION
                        SELECT
                        sports_events.away_team_phase_id, \'away\' descrip
                        FROM contests_has_sports_events
                        INNER JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
                    ) teamsId
                    JOIN players_phases ON players_phases.teams_phases_id = teamsId.teams_phases_ids
                    WHERE players_phases.phase_status = 0 '.$wherepos.'
                ) i9
                JOIN soccer_stats_calcs ON soccer_stats_calcs.players_phases_id = i9.players_phases_id
                JOIN (
                    SELECT
                    soccer_stats.id,
                    soccer_stats.players_phases_id,
                    soccer_stats.salary
                    FROM soccer_stats
                    WHERE soccer_stats.id IN (
                            SELECT MAX(soccer_stats.id)
                            FROM soccer_stats
                            WHERE soccer_stats.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'"
                            GROUP BY soccer_stats.players_phases_id
                        )
                ) i6 ON i9.players_phases_id = i6.players_phases_id
                JOIN teams_phases ON teams_phases.id = i9.players_phases_teams_phases_id
                JOIN teams ON teams.id = teams_phases.teams_id
                JOIN players_phases ON players_phases.id = i9.players_phases_id
                JOIN players ON players.id = players_phases.players_id
        ');
        return $query;
    }

    function get_events($contest_id) {
        $query = $this->db->query('
        SELECT
        sports_events.id as eventsid,
        sports_events.home_team_phase_id as team_id_home,
        sports_events.away_team_phase_id as team_id_away,
        teams_home.team_shorthand as team_shorthand_home,
        teams_away.team_shorthand as team_shorthand_away,
        teams_home.team_name as team_name_home,
        teams_away.team_name as team_name_away,
        sports_events.start_date,
        sports_events.start_time,
        teams_phases_home.stadium_name as home_ground
        FROM `contests_has_sports_events`
        JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
        JOIN teams_phases as teams_phases_home ON sports_events.home_team_phase_id = teams_phases_home.id
        JOIN teams_phases as teams_phases_away ON sports_events.away_team_phase_id = teams_phases_away.id
        JOIN teams as teams_home ON teams_phases_home.teams_id = teams_home.id
        JOIN teams as teams_away ON teams_phases_away.teams_id = teams_away.id
        WHERE contests_has_sports_events.contests_id = '.$contest_id.'
        ORDER BY sports_events.start_date, sports_events.start_time, teams_away.team_shorthand
        ');

        $result = array();
        foreach ($query->result() as $row) {
          $date = new DateTime($row->start_date.' '.$row->start_time);
            $result[] = array(
                'eventsid'              =>      $row->eventsid,
                'team_id_home'          =>      $row->team_id_home,
                'team_shorthand_home'   =>      $row->team_shorthand_home,
                'team_name_home'        =>      $row->team_name_home,
                'team_id_away'          =>      $row->team_id_away,
                'team_shorthand_away'   =>      $row->team_shorthand_away,
                'team_name_away'        =>      $row->team_name_away,
                'start_date'            =>      $row->start_date,
                'start_time'            =>      $row->start_time,
                'start_timestamp'       =>      $date->getTimestamp(),
                'start_fulldate'        =>      date('D M j G:i:s T Y', $date->getTimestamp()),
                'home_ground'           =>      $row->home_ground
            );
        }

        return $result;
    }

    function get_words() {
        $query = $this->db->query('
            SELECT video_tests.id, video_tests.word
            FROM video_tests
        ');
        return $query;
    }
}
