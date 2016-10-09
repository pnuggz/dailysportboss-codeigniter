<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_games extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_games_status_active($league_id, $current_date, $user_id)
    {
        $query = $this->db->query('
            SELECT t1.id, t1.contest_name, t1.sponsors_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_rosters.roster_name, t1.leagues_id, t1.league_shorthand, t2.start_date, t2.start_time
            FROM ( 
                    SELECT contests.id, contests.contest_name, contests.sponsors_id, sports_events_end.start_date as end_date, sports_events_end.start_time as end_time, leagues.id as leagues_id, leagues.league_name, leagues.league_shorthand
                    FROM `contests`
                    JOIN contests_has_sports_events on contests_has_sports_events.contests_id = contests.id
                    JOIN sports_events AS sports_events_end on contests_has_sports_events.sports_events_id = sports_events_end.id
                    JOIN leagues ON leagues.id = sports_events_end.leagues_id
                    WHERE contests.contest_status = 0 AND sports_events_end.leagues_id = '.$league_id.' AND sports_events_end.start_date > \''.$current_date.'\'
                    GROUP BY contests.id
                    ORDER BY contests.id ASC, sports_events_end.start_date DESC, sports_events_end.start_time DESC
                ) as t1
            JOIN contests_users_entries ON t1.id = contests_users_entries.contest_id
            JOIN contests_rosters on contests_rosters.contests_users_entry_id = contests_users_entries.id
            JOIN (
                SELECT *
                FROM (
                SELECT DISTINCT contests_has_sports_events.contests_id, sports_events.start_date, sports_events.start_time
                FROM `contests_has_sports_events`
                JOIN sports_events ON sports_events.id = contests_has_sports_events.sports_events_id
                ORDER BY contests_has_sports_events.contests_id, sports_events.start_date ASC, sports_events.start_time ASC
                    ) tt1
                    GROUP BY tt1.contests_id
                ) t2 ON t2.contests_id = t1.id
                WHERE contests_users_entries.user_id = '.$user_id.'
        ORDER BY t2.start_date ASC, t2.start_time ASC, t1.contest_name ASC, contests_rosters.roster_name ASC, contests_users_entries.user_entry_count ASC
        ');
        return $query;
    }

    function get_games_status_inactive($league_id, $current_date, $user_id)
    {
        $query = $this->db->query('
            SELECT t1.id, t1.contest_name, t1.sponsors_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_rosters.roster_name, t1.leagues_id, t1.league_shorthand, t2.start_date, t2.start_time
            FROM ( 
                    SELECT contests.id, contests.contest_name, contests.sponsors_id, sports_events_end.start_date as end_date, sports_events_end.start_time as end_time, leagues.id as leagues_id, leagues.league_name, leagues.league_shorthand
                    FROM `contests`
                    JOIN contests_has_sports_events on contests_has_sports_events.contests_id = contests.id
                    JOIN sports_events AS sports_events_end on contests_has_sports_events.sports_events_id = sports_events_end.id
                    JOIN leagues ON leagues.id = sports_events_end.leagues_id
                    WHERE contests.contest_status = 1 AND sports_events_end.leagues_id = '.$league_id.' AND sports_events_end.start_date > \''.$current_date.'\'
                    GROUP BY contests.id
                    ORDER BY contests.id ASC, sports_events_end.start_date DESC, sports_events_end.start_time DESC
                ) as t1
            JOIN contests_users_entries ON t1.id = contests_users_entries.contest_id
            JOIN contests_rosters on contests_rosters.contests_users_entry_id = contests_users_entries.id
            JOIN (
                SELECT *
                FROM (
                SELECT DISTINCT contests_has_sports_events.contests_id, sports_events.start_date, sports_events.start_time
                FROM `contests_has_sports_events`
                JOIN sports_events ON sports_events.id = contests_has_sports_events.sports_events_id
                ORDER BY contests_has_sports_events.contests_id, sports_events.start_date ASC, sports_events.start_time ASC
                    ) tt1
                    GROUP BY tt1.contests_id
                ) t2 ON t2.contests_id = t1.id
                WHERE contests_users_entries.user_id = '.$user_id.'
        ORDER BY t2.start_date ASC, t2.start_time ASC, t1.contest_name ASC, contests_rosters.roster_name ASC, contests_users_entries.user_entry_count ASC
        ');
        return $query;
    }

    function get_contest_players($contest_id, $user_id, $user_entry_number)
    {
        $query = $this->db->query('
        SELECT * 
        FROM `contests_users_entries` 
        JOIN contests_rosters on contests_users_entries.id = contests_rosters.contests_users_entry_id
        WHERE contests_users_entries.contest_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
        ');
        return $query;
    }

    function get_all_players_list_contest($contest_id, $user_id, $user_entry_number)
    {
        $contest_user_entry = $this->db->query('
        SELECT contests_users_entries.id 
        FROM `contests_users_entries` 
        JOIN contests_rosters on contests_users_entries.id = contests_rosters.contests_users_entry_id
        WHERE contests_users_entries.contest_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
        ');
        foreach ($contest_user_entry->result() as $row) {
            $contest_user_entry_id = $row->id;
            $query = $this->db->query('
            SELECT players_phases.id as players_phases_id,
                                players.first_name,
                                players.last_name,
                                players_phases.teams_phases_id as players_phases_teams_phases_id,
                                players_phases.position,
                                players_phases.height,
                                players_phases.weight,
                                players_phases.depth_chart,
                                teams.team_name,
                                teams.team_shorthand,
                                soccer_stats_calcs.avg_fp,
                                soccer_stats_calcs.form,
                                T1.descrip
            FROM players_phases
            JOIN players ON players.id = players_phases.players_id
	    JOIN teams_phases ON teams_phases.id = players_phases.teams_phases_id
            JOIN teams ON teams_phases.teams_id = teams.id
            JOIN soccer_stats_calcs ON soccer_stats_calcs.players_phases_id = players_phases.id
            JOIN (
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player1 as \'player\', \'1\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player2, \'2\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player3, \'3\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player4, \'4\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player5, \'5\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player6, \'6\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player7, \'7\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player8, \'8\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player9, \'9\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
            UNION
            SELECT contests_rosters.contests_users_entry_id, contests_rosters.player10, \'9-10\' descrip
            FROM contests_rosters
            WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                ) T1 ON players_phases.id = T1.player
            ORDER BY T1.descrip
            ');
        }
        return $query;
    }

    function get_players_stats($contest_id, $user_id, $user_entry_number)
    {
        $contest_user_info = $this->db->query('
            SELECT DISTINCT sports_events.start_date, contests_has_sports_events.contests_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.id as contests_users_entries_id
            FROM `contests_has_sports_events` 
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN contests_users_entries ON contests_users_entries.contest_id = contests_has_sports_events.contests_id
            WHERE contests_has_sports_events.contests_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
            LIMIT 1
        ');
        foreach ($contest_user_info->result() as $row) {
            $event_date = $row->start_date;
            $contest_user_entry_id = $row->contests_users_entries_id;
            $query = $this->db->query('
                SELECT          soccer_stats.players_phases_id,
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
                JOIN (
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player1 as \'player\', \'p1\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player2, \'p2\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player3, \'p3\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player4, \'p4\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player5, \'p5\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player6, \'p6\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player7, \'p7\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player8, \'p8\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player9, \'p9\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player10, \'p10\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                            ) T1 ON soccer_stats.players_phases_id = T1.player    
                WHERE soccer_stats.date < \'' . $event_date . '\'
                GROUP BY soccer_stats.players_phases_id  
                ORDER BY `soccer_stats`.`players_phases_id` ASC
                ');
        };
        return $query;
    }

    function get_form($contest_id, $user_id, $user_entry_number)
    {
        $contest_user_info = $this->db->query('
            SELECT DISTINCT sports_events.start_date, contests_has_sports_events.contests_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.id as contests_users_entries_id
            FROM `contests_has_sports_events` 
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN contests_users_entries ON contests_users_entries.contest_id = contests_has_sports_events.contests_id
            WHERE contests_has_sports_events.contests_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
            LIMIT 1
        ');
        foreach ($contest_user_info->result() as $row) {
            $event_date = $row->start_date;
            $contest_user_entry_id = $row->contests_users_entries_id;
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
                WHERE i1.date < \'' . $event_date . '\'
                GROUP BY i1.id  
                HAVING COUNT(*) < 4
                ) as i3
                JOIN (
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player1 as \'player\', \'p1\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player2, \'p2\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player3, \'p3\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player4, \'p4\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player5, \'p5\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player6, \'p6\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player7, \'p7\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player8, \'p8\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player9, \'p9\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player10, \'p10\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                            ) T1 ON i3.players_phases_id = T1.player    
                GROUP BY i3.players_phases_id
                ORDER BY i3.players_phases_id ASC, i3.date DESC 
                ');
        };
        return $query;
    }

    function get_players_salary($contest_id, $user_id, $user_entry_number)
    {
        $contest_user_info = $this->db->query('
            SELECT DISTINCT sports_events.start_date, contests_has_sports_events.contests_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.id as contests_users_entries_id
            FROM `contests_has_sports_events` 
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN contests_users_entries ON contests_users_entries.contest_id = contests_has_sports_events.contests_id
            WHERE contests_has_sports_events.contests_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
            LIMIT 1
        ');
        foreach ($contest_user_info->result() as $row) {
            $event_date = $row->start_date;
            $contest_user_entry_id = $row->contests_users_entries_id;
            $query = $this->db->query('
                SELECT          soccer_stats.id,
                                soccer_stats.players_phases_id,
                                soccer_stats.salary
                FROM soccer_stats
                JOIN (
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player1 as \'player\', \'p1\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player2, \'p2\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player3, \'p3\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player4, \'p4\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player5, \'p5\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player6, \'p6\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player7, \'p7\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player8, \'p8\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player9, \'p9\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player10, \'p10\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                            ) T1 ON soccer_stats.players_phases_id = T1.player
                     WHERE soccer_stats.id IN (
                        SELECT MAX(soccer_stats.id)
                        FROM soccer_stats 
                    	WHERE soccer_stats.date <= DATE_ADD(\'' . $event_date . '\',INTERVAL 5 DAY)
                        GROUP BY soccer_stats.players_phases_id
                    ) ORDER BY `players_phases_id` ASC
                ');
        };
        return $query;
    }

    function get_team_fp($contest_id)
    {
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

        $query = $this->db->query('
            SELECT T1.id, T1.contest_id, T1.contests_users_entry_id, T1.user_id, T1.user_entry_count, T1.username, T1.roster_name,
                    (T1.total_goals + T1.total_assists + T1.total_key_passes + T1.total_tackles + T1.total_interceptions + T1.total_clearances + T1.total_passes + T1.total_crosses + T1.total_accurate_crosses) AS total_team_fp
            FROM (
                SELECT contests_users_entries.id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.contest_id, contests_rosters.contests_users_entry_id, users.username, contests_rosters.roster_name,
                    ((P1.goals + P2.goals + P3.goals + P4.goals + P5.goals + P6.goals + P7.goals + P8.goals + P9.goals + P10.goals)*5) AS total_goals,
                    ((P1.assists + P2.assists + P3.assists + P4.assists + P5.assists + P6.assists + P7.assists + P8.assists + P9.assists + P10.assists)*4) AS total_assists,
                    ((P1.key_passes + P2.key_passes + P3.key_passes + P4.key_passes + P5.key_passes + P6.key_passes + P7.key_passes + P8.key_passes + P9.key_passes + P10.key_passes)*1) AS total_key_passes,
                    ((P1.tackles + P2.tackles + P3.tackles + P4.tackles + P5.tackles + P6.tackles + P7.tackles + P8.tackles + P9.tackles + P10.tackles)*0.4) AS total_tackles,
                    ((P1.interceptions + P2.interceptions + P3.interceptions + P4.interceptions + P5.interceptions + P6.interceptions + P7.interceptions + P8.interceptions + P9.interceptions + P10.interceptions)*0.4) AS total_interceptions,
                    ((P1.clearances + P2.clearances + P3.clearances + P4.clearances + P5.clearances + P6.clearances + P7.clearances + P8.clearances + P9.clearances + P10.clearances)*0.5) AS total_clearances,
                    ((P1.passes + P2.passes + P3.passes + P4.passes + P5.passes + P6.passes + P7.passes + P8.passes + P9.passes + P10.passes)*0.02) AS total_passes,
                    ((P1.crosses + P2.crosses + P3.crosses + P4.crosses + P5.crosses + P6.crosses + P7.crosses + P8.crosses + P9.crosses + P10.crosses)*0.4) AS total_crosses,
                    ((P1.accurate_crosses + P2.accurate_crosses + P3.accurate_crosses + P4.accurate_crosses + P5.accurate_crosses + P6.accurate_crosses + P7.accurate_crosses + P8.accurate_crosses + P9.accurate_crosses + P10.accurate_crosses)*1) AS total_accurate_crosses
                FROM `contests_users_entries` 
                JOIN users ON contests_users_entries.user_id = users.id
                JOIN contests_rosters ON contests_rosters.contests_users_entry_id = contests_users_entries.id
                JOIN soccer_stats AS P1 ON P1.players_phases_id = contests_rosters.player1
                JOIN soccer_stats AS P2 ON P2.players_phases_id = contests_rosters.player2
                JOIN soccer_stats AS P3 ON P3.players_phases_id = contests_rosters.player3
                JOIN soccer_stats AS P4 ON P4.players_phases_id = contests_rosters.player4
                JOIN soccer_stats AS P5 ON P5.players_phases_id = contests_rosters.player5
                JOIN soccer_stats AS P6 ON P6.players_phases_id = contests_rosters.player6
                JOIN soccer_stats AS P7 ON P7.players_phases_id = contests_rosters.player7
                JOIN soccer_stats AS P8 ON P8.players_phases_id = contests_rosters.player8
                JOIN soccer_stats AS P9 ON P9.players_phases_id = contests_rosters.player9
                JOIN soccer_stats AS P10 ON P10.players_phases_id = contests_rosters.player10
                WHERE (P1.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P2.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P3.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P4.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P5.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P6.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P7.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P8.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P9.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P10.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") 
            ) T1
            WHERE T1.contest_id = ' . $contest_id . '
            ORDER BY T1.username ASC, T1.roster_name ASC
        ');
        return $query;
    }

    function simulate_team_fp($contest_id)
    {
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

        $query = $this->db->query('
            SELECT T1.id, T1.contest_id, T1.contests_users_entry_id, T1.user_id, T1.user_entry_count, T1.username, T1.roster_name,
                    (T1.total_goals + T1.total_assists + T1.total_key_passes + T1.total_tackles + T1.total_interceptions + T1.total_clearances + T1.total_passes + T1.total_crosses + T1.total_accurate_crosses) AS total_team_fp
            FROM (
                SELECT contests_users_entries.id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.contest_id, contests_rosters.contests_users_entry_id, users.username, contests_rosters.roster_name,
                    ((P1.goals + P2.goals + P3.goals + P4.goals + P5.goals + P6.goals + P7.goals + P8.goals + P9.goals + P10.goals)*5) AS total_goals,
                    ((P1.assists + P2.assists + P3.assists + P4.assists + P5.assists + P6.assists + P7.assists + P8.assists + P9.assists + P10.assists)*4) AS total_assists,
                    ((P1.key_passes + P2.key_passes + P3.key_passes + P4.key_passes + P5.key_passes + P6.key_passes + P7.key_passes + P8.key_passes + P9.key_passes + P10.key_passes)*1) AS total_key_passes,
                    ((P1.tackles + P2.tackles + P3.tackles + P4.tackles + P5.tackles + P6.tackles + P7.tackles + P8.tackles + P9.tackles + P10.tackles)*0.4) AS total_tackles,
                    ((P1.interceptions + P2.interceptions + P3.interceptions + P4.interceptions + P5.interceptions + P6.interceptions + P7.interceptions + P8.interceptions + P9.interceptions + P10.interceptions)*0.4) AS total_interceptions,
                    ((P1.clearances + P2.clearances + P3.clearances + P4.clearances + P5.clearances + P6.clearances + P7.clearances + P8.clearances + P9.clearances + P10.clearances)*0.5) AS total_clearances,
                    ((P1.passes + P2.passes + P3.passes + P4.passes + P5.passes + P6.passes + P7.passes + P8.passes + P9.passes + P10.passes)*0.02) AS total_passes,
                    ((P1.crosses + P2.crosses + P3.crosses + P4.crosses + P5.crosses + P6.crosses + P7.crosses + P8.crosses + P9.crosses + P10.crosses)*0.4) AS total_crosses,
                    ((P1.accurate_crosses + P2.accurate_crosses + P3.accurate_crosses + P4.accurate_crosses + P5.accurate_crosses + P6.accurate_crosses + P7.accurate_crosses + P8.accurate_crosses + P9.accurate_crosses + P10.accurate_crosses)*1) AS total_accurate_crosses
                FROM `contests_users_entries` 
                JOIN users ON contests_users_entries.user_id = users.id
                JOIN contests_rosters ON contests_rosters.contests_users_entry_id = contests_users_entries.id
                JOIN soccer_stats AS P1 ON P1.players_phases_id = contests_rosters.player1
                JOIN soccer_stats AS P2 ON P2.players_phases_id = contests_rosters.player2
                JOIN soccer_stats AS P3 ON P3.players_phases_id = contests_rosters.player3
                JOIN soccer_stats AS P4 ON P4.players_phases_id = contests_rosters.player4
                JOIN soccer_stats AS P5 ON P5.players_phases_id = contests_rosters.player5
                JOIN soccer_stats AS P6 ON P6.players_phases_id = contests_rosters.player6
                JOIN soccer_stats AS P7 ON P7.players_phases_id = contests_rosters.player7
                JOIN soccer_stats AS P8 ON P8.players_phases_id = contests_rosters.player8
                JOIN soccer_stats AS P9 ON P9.players_phases_id = contests_rosters.player9
                JOIN soccer_stats AS P10 ON P10.players_phases_id = contests_rosters.player10
                WHERE (P1.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P2.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P3.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P4.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P5.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P6.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P7.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P8.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P9.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") AND (P10.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'") 
            ) T1
            WHERE T1.contest_id = ' . $contest_id . '
            ORDER BY total_team_fp DESC
        ');
        return $query;
    }

    function get_player_fp($contest_id, $user_id, $user_entry_number)
    {
        $contest_user_info = $this->db->query('
            SELECT DISTINCT sports_events.start_date, contests_has_sports_events.contests_id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.id as contests_users_entries_id
            FROM `contests_has_sports_events` 
            JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
            JOIN contests_users_entries ON contests_users_entries.contest_id = contests_has_sports_events.contests_id
            WHERE contests_has_sports_events.contests_id = ' . $contest_id . ' AND contests_users_entries.user_id = ' . $user_id . ' AND contests_users_entries.user_entry_count = ' . $user_entry_number . '
            LIMIT 1
        ');
        foreach ($contest_user_info->result() as $row) {
            $contest_user_entry_id = $row->contests_users_entries_id;
        }

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


        $query = $this->db->query('
            SELECT T2.entry_id, T2.date, T2.contest_id, T2.player,
            ((T2.goals * 5) + (T2.assists * 4) + (T2.key_passes * 1) + (T2.tackles * 0.4) + (T2.interceptions * 0.4) + (T2.clearances * 0.5) + (T2.passes * 0.02) + (T2.crosses * 0.4) + (T2.accurate_crosses * 1)) AS total_player_fp
            FROM (
                SELECT contests_users_entries.id as entry_id, soccer_stats.date, contests_users_entries.contest_id, T1.player, soccer_stats.goals, soccer_stats.assists, soccer_stats.key_passes, soccer_stats.tackles, soccer_stats.interceptions, soccer_stats.clearances, soccer_stats.passes, soccer_stats.crosses, soccer_stats.accurate_crosses
                FROM `contests_users_entries`
                    JOIN (
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player1 as \'player\', \'p1\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player2, \'p2\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player3, \'p3\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player4, \'p4\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player5, \'p5\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player6, \'p6\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player7, \'p7\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player8, \'p8\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player9, \'p9\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    UNION
                    SELECT contests_rosters.contests_users_entry_id, contests_rosters.player10, \'p10\' descrip
                    FROM contests_rosters
                    WHERE contests_rosters.contests_users_entry_id = ' . $contest_user_entry_id . '
                    ) T1 ON contests_users_entries.id = T1.contests_users_entry_id
                JOIN soccer_stats ON soccer_stats.players_phases_id = T1.player
                ) T2
            WHERE T2.date BETWEEN "'.$contest_start_date.'" AND "'.$contest_end_date.'" 
            ORDER BY T2.entry_id
            ');
            return $query;
    }


}
