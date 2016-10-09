<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_friends extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_friends_leagues_list($user_id) {
        $query = $this->db->query('
            SELECT 
            friends_leagues.id AS friends_leagues_id,
            friends_leagues.friends_league_name,
            friends_leagues.owner_user_id,
            friends_leagues.season_number AS last_season_number,
            user_info_owner.username AS owner_username
            FROM friends_leagues
            JOIN users AS user_info_owner ON user_info_owner.id = friends_leagues.owner_user_id
            JOIN friends_leagues_has_users ON friends_leagues_has_users.friends_leagues_id = friends_leagues.id
            JOIN users AS user_info ON user_info.id = friends_leagues_has_users.users_id
            WHERE friends_leagues_has_users.users_id = '.$user_id.' AND friends_leagues_has_users.phase_status = 0
        ');
        return $query;
//        JOIN friends_leagues_has_users ON friends_leagues_has_users.friends_leagues_id = friends_leagues.id
//        JOIN users AS user_info ON user_info.id = friends_leagues_has_users.users_id
    }

    function get_friends_request($user_id) {
        $query = $this->db->query('
			SELECT
			friends_leagues_requests.friends_leagues_id,
            friends_leagues.friends_league_name,
            friends_leagues_requests.sender_user_id,
            sender_user_info.username as sender_username,
            friends_leagues_requests.recipient_user_id,
            recipient_user_info.username as recipient_username,
            DATE(friends_leagues_requests.date_sent) as date_sent
            FROM friends_leagues_requests
            JOIN users as sender_user_info ON sender_user_info.id = friends_leagues_requests.sender_user_id
            JOIN users as recipient_user_info ON recipient_user_info.id = friends_leagues_requests.recipient_user_id
            JOIN friends_leagues ON friends_leagues.id = friends_leagues_requests.friends_leagues_id
            WHERE friends_leagues_requests.recipient_user_id = '.$user_id.'
        ');
        return $query;
    }

    function accept_invitation($data) {
        $this->db->insert('friends_leagues_has_users', $data);
    }

    function delete_request($flid, $sid, $rid) {
        $this->db->query('
            DELETE FROM friends_leagues_requests
            WHERE friends_leagues_requests.friends_leagues_id = '.$flid.' AND friends_leagues_requests.sender_user_id = '.$sid.' AND friends_leagues_requests.recipient_user_id = '.$rid.'
        ');
    }

    function get_sent_friends_request($friends_leagues_id) {
        $query = $this->db->query('
            SELECT
            friends_leagues_requests.id,
            friends_leagues.id,
            friends_leagues.friends_league_name,
            friends_leagues_requests.sender_user_id,
            sender_user_info.username as sender_username,
            friends_leagues_requests.recipient_user_id,
            recipient_user_info.username as recipient_username,
            DATE(friends_leagues_requests.date_sent) as date_sent
            FROM friends_leagues_requests
            JOIN users as sender_user_info ON sender_user_info.id = friends_leagues_requests.sender_user_id
            JOIN users as recipient_user_info ON recipient_user_info.id = friends_leagues_requests.recipient_user_id
            JOIN friends_leagues ON friends_leagues.id = friends_leagues_requests.friends_leagues_id
            WHERE friends_leagues_requests.friends_leagues_id = '.$friends_leagues_id.'
        ');
        return $query;
    }

    function get_friends_requests_count($user_id) {
        $query = $this->db->query('
            SELECT COUNT(friends_leagues_requests.recipient_user_id) AS count_requests 
            FROM friends_leagues_requests
            WHERE friends_leagues_requests.recipient_user_id = '.$user_id.';
        ');
        return $query;
    }

    function get_friends_league($friends_leagues_id) {
        $query = $this->db->query('
            SELECT 
            friends_leagues.id,
            friends_leagues.friends_league_name,
            friends_leagues.owner_user_id,
            friends_leagues.season_number,
            user_info_owner.username AS owner_username
            FROM friends_leagues
            JOIN users AS user_info_owner ON user_info_owner.id = friends_leagues.owner_user_id
            WHERE friends_leagues.id = '.$friends_leagues_id.' 
        ');
        return $query;
    }

    function get_friends_leagues_table($friends_leagues_id, $season_number) {
        $query = $this->db->query('
            SELECT     
            T3.friends_leagues_id, 
            T3.user_id, 
            T3.username, 
            T3.phase_status, 
            COUNT(T3.user_id) as contests_played,
            AVG(T3.max_total_team_fp) AS avg_total_team_fp
            FROM (
                SELECT 
                friends_leagues_has_users.friends_leagues_id, 
                T2.user_id, 
                T2.username, 
                friends_leagues_has_users.phase_status, 
                T2.contest_id, 
                T2.start_date, 
                T2.end_date, 
                T2.roster_name, 
                MAX(T2.total_team_fp) AS max_total_team_fp
                FROM `friends_leagues_has_users`
                JOIN friends_leagues_has_contests ON friends_leagues_has_users.friends_leagues_id = friends_leagues_has_contests.friends_leagues_id
                JOIN friends_leagues ON friends_leagues.id = friends_leagues_has_users.friends_leagues_id
                JOIN (
                    SELECT T1.id, T1.contest_id, T1.start_date, T1.end_date, T1.contests_users_entry_id, T1.user_id, T1.user_entry_count, T1.username, T1.roster_name,
                                    (T1.total_goals + T1.total_assists + T1.total_key_passes + T1.total_tackles + T1.total_interceptions + T1.total_clearances + T1.total_passes + T1.total_crosses + T1.total_accurate_crosses) AS total_team_fp
                            FROM (
                                SELECT contests_users_entries.id, contests_users_entries.user_id, contests_users_entries.user_entry_count, contests_users_entries.contest_id, contests_rosters.contests_users_entry_id, users.username, contests_rosters.roster_name, T_date_start.start_date, T_date_end.end_date,
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
                                JOIN (
                                    SELECT
                                    contests_has_sports_events.contests_id,
                                    MIN(sports_events.start_date) as start_date
                                    FROM 
                                    `contests_has_sports_events` 
                                    JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                                    GROUP BY contests_has_sports_events.contests_id
                                ) T_date_start ON contests_users_entries.contest_id = T_date_start.contests_id
                                JOIN (
                                    SELECT
                                    contests_has_sports_events.contests_id,
                                    MAX(sports_events.start_date) as end_date
                                    FROM 
                                    `contests_has_sports_events` 
                                    JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                                    GROUP BY contests_has_sports_events.contests_id
                                ) T_date_end ON contests_users_entries.contest_id = T_date_end.contests_id
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
                                WHERE (P1.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P2.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P3.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P4.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P5.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P6.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P7.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P8.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P9.date BETWEEN T_date_start.start_date AND T_date_end.end_date) AND (P10.date BETWEEN T_date_start.start_date AND T_date_end.end_date) 
                            ) T1
                    ) T2 ON friends_leagues_has_users.users_id = T2.user_id AND friends_leagues_has_contests.contests_id = T2.contest_id
                    WHERE friends_leagues_has_users.friends_leagues_id = '.$friends_leagues_id.' AND friends_leagues_has_users.phase_status = 0 AND friends_leagues_has_contests.season_number = '.$season_number.' AND T2.start_date > friends_leagues.last_update
                    GROUP BY T2.contest_id, T2.user_id
                ) T3
            GROUP BY T3.user_id
            ORDER BY avg_total_team_fp DESC
        ');
        return $query;
    }

    function get_friends_leagues_table_past($friends_leagues_id, $season_number) {
        $query = $this->db->query('
        SELECT users.id, users.username, friends_leagues_history.games_played, friends_leagues_history.final_fp
        FROM friends_leagues_history
        JOIN users ON friends_leagues_history.user_id = users.id
        WHERE friends_leagues_history.friends_leagues_id = '.$friends_leagues_id.' AND friends_leagues_history.season_number = '.$season_number.'
        ORDER BY friends_leagues_history.final_fp DESC
        ');
        return $query;
    }

    function send_request_checker($sender_id, $recipient_id) {
        $query = $this->db->query ('
            SELECT friends_leagues_requests.id
            FROM friends_leagues_requests
            WHERE friends_leagues_requests.sender_user_id = '.$sender_id.' AND friends_leagues_requests.recipient_user_id = '.$recipient_id.'
        ');
        return $query;
    }

    function already_in_league_checker($friends_leagues_id, $recipient_id) {
        $query = $this->db->query ('
        SELECT friends_leagues_has_users.id
        FROM friends_leagues_has_users
        WHERE friends_leagues_has_users.friends_leagues_id = '.$friends_leagues_id.' AND friends_leagues_has_users.users_id = '.$recipient_id.'
        ');
        return $query;
    }

    function submit_invite($data) {
        $this->db->insert('friends_leagues_requests', $data);
    }

    function get_current_users($friends_leagues_id) {
        $query = $this->db->query('
            SELECT users.username
            FROM `friends_leagues`
            JOIN friends_leagues_has_users ON friends_leagues.id = friends_leagues_has_users.friends_leagues_id
            JOIN users ON friends_leagues_has_users.users_id = users.id
            WHERE friends_leagues.id = '.$friends_leagues_id.'
        ');
        return $query;
    }

    function get_upcoming_friends_leagues_contests($friends_leagues_id) {
        $query = $this->db->query('
            SELECT contests.id, contests.contest_name, T_date_start.start_date, T_date_end.end_date
            FROM friends_leagues_has_contests
            JOIN friends_leagues ON friends_leagues.id = friends_leagues_has_contests.friends_leagues_id
            JOIN contests ON contests.id = friends_leagues_has_contests.contests_id
            JOIN (
                SELECT
                contests_has_sports_events.contests_id,
                MIN(sports_events.start_date) as start_date
                FROM 
                `contests_has_sports_events` 
                JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                GROUP BY contests_has_sports_events.contests_id
            ) T_date_start ON contests.id = T_date_start.contests_id
            JOIN (
                SELECT
                contests_has_sports_events.contests_id,
                MAX(sports_events.start_date) as end_date
                FROM 
                `contests_has_sports_events` 
                JOIN sports_events ON contests_has_sports_events.sports_events_id = sports_events.id
                GROUP BY contests_has_sports_events.contests_id
            ) T_date_end ON contests.id = T_date_end.contests_id
            WHERE friends_leagues.id = '.$friends_leagues_id.' AND T_date_start.start_date >= CURDATE()
        ');
        return $query;
    }
    
    function get_friends_leagues($friends_leagues_id) {
        $query = $this->db->query('
            SELECT 
            friends_leagues.season_number,
            friends_leagues.last_update
            FROM friends_leagues
            WHERE friends_leagues.id = '.$friends_leagues_id.'
        ');
        return $query;
    }

    function _insert_history($array, $friends_leagues_id, $update_season_number) {
        $this->db->insert('friends_leagues_history',$array);
        $this->db->query('
            UPDATE friends_leagues
            SET friends_leagues.season_number = '.$update_season_number.'
            WHERE friends_leagues.id = '.$friends_leagues_id.'
        ');
    }

}