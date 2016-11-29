<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
require_once(APPPATH.DS."modules/secure_area.php");

class Games extends Secure_area {

  function __construct() {
      parent::__construct($this->input->request_headers());
      }

      function index()
      {
      }

    function listgames($league_id)
    {
        $current_date = '2016-03-18';
        $user_id = $this->session->userdata('userid');

        $this->load->model('mdl_games');
        $data['active_contests'] = $this->mdl_games->get_games_status_active($league_id, $current_date, $user_id);
        $data['inactive_contests'] = $this->mdl_games->get_games_status_inactive($league_id, $current_date, $user_id);

        $result = array(
          'token' => $this->session->userdata['token'],
          'data'  => $data
        );
        $this->output->set_output(json_encode($result), 200);
    }

    function league($league_id)
    {
        $current_date = '2016-03-18';
        $user_id = $this->session->userdata('user_id');

        $this->load->model('mdl_games');
        $data['active_contests'] = $this->mdl_games->get_games_status_active($league_id, $current_date, $user_id);
        $data['inactive_contests'] = $this->mdl_games->get_games_status_inactive($league_id, $current_date, $user_id);

        $data['view_file'] = 'league_games';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function details($contest_id,$user_entry_number)
    {
        $user_id = $this->session->userdata('userid');

        $data = $this->get_contest_players($contest_id, $user_id, $user_entry_number);

        $result = array(
          'token' => $this->session->userdata['token'],
          'data'  => $data
        );
        $this->output->set_output(json_encode($result), 200);
    }

    function get_players($contest_id,$user_entry_number)
    {
        $user_id = $this->session->userdata('userid');

        $this->load->module('contests');
        $data = $this->contests->get_events_id($contest_id);

        foreach ($data->result() as $row) {
            $array_team_home[] = $row->team_id_home;
            $array_team_away[] = $row->team_id_away;
        }

        $data = $this->get_all_players_list_contest($contest_id, $user_id, $user_entry_number);

        foreach ($data->result() as $row){
            foreach ($array_team_home as $key => $tidh) {
                if ($row->players_phases_teams_phases_id == $tidh) {
                    $oppid = $array_team_away[$key];
                } else {

                }
            }

            foreach ($array_team_away as $key => $tida) {
                if ($row->players_phases_teams_phases_id == $tida) {
                    $oppid = $array_team_home[$key];
                } else {

                }
            }

            $array_players[] = array(
                'player_phase_id'   =>      $row->players_phases_id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
                'team_phase_id'       =>      $row->players_phases_teams_phases_id,
                'team_name'     =>      $row->team_name,
                'team_shorthand'        =>      $row->team_shorthand,
                'pos'      =>      $row->position,
                'role'     =>      $row->depth_chart,
                'oppid'     =>      $oppid,
                'fp_avg'    =>  $row->avg_fp,
                'fp_form'    =>  $row->form,
            );
        };

//        $player_stats = $this->get_players_stats($contest_id, $user_id, $user_entry_number);
//        foreach ($player_stats->result() as $row) {
//            $count = $row->counting;
//            $fp_goals = $row->total_goals * 5;
//            $fp_assists = $row->total_assists * 4;
//            $fp_key_passes = $row->total_key_passes * 1;
//            $fp_tackles = $row->total_tackles * 0.4;
//            $fp_interceptions = $row->total_interceptions * 0.4;
//            $fp_clearances = $row->total_clearances * 0.5;
//            $fp_passes = $row->total_passes * 0.02;
//            $fp_crosses = $row->total_crosses * 0.4;
//            $fp_accurate_crosses = $row->total_accurate_crosses * 1;
//            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;
//            $fp_avg = $fp_total / $count;
//
//            $array_fp_avg[] = array(
//                'player_phase_id'   => $row->players_phases_id,
//                'fp_avg'    =>  $fp_avg
//            );
//
//        }
//
//        $player_form_raw = $this->get_form($contest_id, $user_id, $user_entry_number);
//        foreach ($player_form_raw->result() as $row) {
//            $count = $row->counting;
//            $fp_goals = $row->total_goals * 5;
//            $fp_assists = $row->total_assists * 4;
//            $fp_key_passes = $row->total_key_passes * 1;
//            $fp_tackles = $row->total_tackles * 0.4;
//            $fp_interceptions = $row->total_interceptions * 0.4;
//            $fp_clearances = $row->total_clearances * 0.5;
//            $fp_passes = $row->total_passes * 0.02;
//            $fp_crosses = $row->total_crosses * 0.4;
//            $fp_accurate_crosses = $row->total_accurate_crosses * 1;
//            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;
//
//            if($count === 5) {
//                $fp_form = $fp_total / 5;
//            } else {
//                $fp_form = $fp_total / $count;
//            }
//
//            $array_fp_form[] = array(
//                'player_phase_id'   => $row->players_phases_id,
//                'fp_form'    =>  $fp_form
//            );
//
//        }

        $player_stats = $this->get_players_salary($contest_id, $user_id, $user_entry_number);
        foreach ($player_stats->result() as $row) {

            $array_salary[] = array(
                'player_phase_id'   => $row->players_phases_id,
                'salary'    =>  $row->salary
            );
        }

        $d = array();
        foreach ($array_players as $arr) {
            $comb = array(
                'player_phase_id'   =>      $arr['player_phase_id'],
                'first_name'   =>     $arr['first_name'],
                'last_name'      =>      $arr['last_name'],
                'team_phase_id'       =>      $arr['team_phase_id'],
                'team_name'     =>      $arr['team_name'],
                'team_shorthand'        =>      $arr['team_shorthand'],
                'pos'      =>      $arr['pos'],
                'role'      =>      $arr['role'],
                'oppid'      =>      $arr['oppid'],
                'fp_avg'    =>  $arr['fp_avg'],
                'fp_form'    =>  $arr['fp_form'],
                'salary'   =>  ''
            );
            foreach ($array_salary as $arr2) {
                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
                    $comb['salary'] = $arr2['salary'];
                    break;
                }
            }
            $d[] = $comb;
        }

//        $e = array();
//        foreach ($d as $arr) {
//            $comb = array(
//                'player_phase_id'   =>      $arr['player_phase_id'],
//                'first_name'   =>     $arr['first_name'],
//                'last_name'      =>      $arr['last_name'],
//                'team_phase_id'       =>      $arr['team_phase_id'],
//                'team_name'     =>      $arr['team_name'],
//                'team_shorthand'        =>      $arr['team_shorthand'],
//                'pos'      =>      $arr['pos'],
//                'oppid'      =>      $arr['oppid'],
//                'fp_avg'   =>  $arr['fp_avg'],
//                'fp_form'    =>  ''
//            );
//            foreach ($array_fp_form as $arr2) {
//                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
//                    $comb['fp_form'] = $arr2['fp_form'];
//                    break;
//                }
//            }
//            $e[] = $comb;
//        }
//
//        $f = array();
//        foreach ($e as $arr) {
//            $comb = array(
//                'player_phase_id'   =>      $arr['player_phase_id'],
//                'first_name'   =>     $arr['first_name'],
//                'last_name'      =>      $arr['last_name'],
//                'team_phase_id'       =>      $arr['team_phase_id'],
//                'team_name'     =>      $arr['team_name'],
//                'team_shorthand'        =>      $arr['team_shorthand'],
//                'pos'      =>      $arr['pos'],
//                'oppid'      =>      $arr['oppid'],
//                'fp_avg'   =>  $arr['fp_avg'],
//                'fp_form'    =>  $arr['fp_form'],
//                'salary'    =>  ''
//            );
//            foreach ($array_salary as $arr2) {
//                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
//                    $comb['salary'] = $arr2['salary'];
//                    break;
//                }
//            }
//            $f[] = $comb;
//        }
        echo json_encode($d);
    }

    function simulate_player_fp() {
        $contest_id = $this->uri->segment(3);
        $user_id = $this->uri->segment(4);
        $user_entry_number = $this->uri->segment(5);
//        $contest_id = 2;
//        $user_id = 1;
//        $user_entry_number = 1;
        $opid = 0;

        $this->load->module('contests');
        $data = $this->contests->get_events_id($contest_id);
        foreach ($data->result() as $row) {
            $array_team_home[] = $row->team_id_home;
            $array_team_away[] = $row->team_id_away;
        }

        $data = $this->get_all_players_list_contest($contest_id, $user_id, $user_entry_number);
        foreach ($data->result() as $row){
            foreach ($array_team_home as $key => $tidh) {
                if ($row->players_phases_teams_phases_id == $tidh) {
                    $oppid = $array_team_away[$key];
                } else {

                }
            }

            foreach ($array_team_away as $key => $tida) {
                if ($row->players_phases_teams_phases_id == $tida) {
                    $oppid = $array_team_home[$key];
                } else {

                }
            }

            $array_players[] = array(
                'player_phase_id'   =>      $row->players_phases_id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
                'team_phase_id'       =>      $row->players_phases_teams_phases_id,
                'team_name'     =>      $row->team_name,
                'team_shorthand'        =>      $row->team_shorthand,
                'pos'      =>      $row->position,
                'oppid'     =>      $oppid
            );
        };

        $player_stats = $this->get_player_fp($contest_id, $user_id, $user_entry_number);
        foreach ($player_stats->result() as $row) {

            $array_fp[] = array(
                'player_phase_id'   => $row->player,
                'player_fp'    =>  $row->total_player_fp
            );
        }

        $d = array();
        foreach ($array_players as $arr) {
            $comb = array(
                'player_phase_id'   =>      $arr['player_phase_id'],
                'first_name'   =>     $arr['first_name'],
                'last_name'      =>      $arr['last_name'],
                'team_phase_id'       =>      $arr['team_phase_id'],
                'team_name'     =>      $arr['team_name'],
                'team_shorthand'        =>      $arr['team_shorthand'],
                'pos'      =>      $arr['pos'],
                'oppid'      =>      $arr['oppid'],
                'player_fp'   =>  ''
            );
            foreach ($array_fp as $arr2) {
                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
                    $comb['player_fp'] = $arr2['player_fp'];
                    break;
                }
            }
            $d[] = $comb;
        }
        echo json_encode($d);
    }


    function get_contest_players($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_contest_players($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_player_fp($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_player_fp($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_events() {
        $contest_id = $this->uri->segment(3);

        $this->load->module('contests');
        $data = $this->contests->get_events($contest_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'team_id_home'          =>      $row->team_id_home,
                'team_name_home'        =>      $row->team_name_home,
                'team_id_away'          =>      $row->team_id_away,
                'team_name_away'        =>      $row->team_name_away,
                'start_date'            =>      $row->start_date,
                'start_time'            =>      $row->start_time,
                'home_ground'           =>      $row->home_ground
            );
        }
        echo json_encode($array);
    }

    function get_team_fp() {
        $contest_id = $this->uri->segment(3);

        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_team_fp($contest_id);
        foreach ($query->result() as $row) {
            $array[] = array(
                'entry_id'      =>      $row->user_id,
                'entry_number'      =>      $row->user_entry_count,
                'entry_username'    =>      $row->username,
                'entry_roster_name'     =>      $row->roster_name,
                'entry_total_team_fp'       =>      $row->total_team_fp
            );
        }
        echo json_encode($array);
    }

    function simulate_team_fp($contest_id) {

        $this->load->model('mdl_games');
        $query = $this->mdl_games->simulate_team_fp($contest_id);
        foreach ($query->result() as $row) {
            $array[] = array(
                'entry_id'      =>      $row->user_id,
                'entry_number'      =>      $row->user_entry_count,
                'entry_username'    =>      $row->username,
                'entry_roster_name'     =>      $row->roster_name,
                'entry_total_team_fp'       =>      $row->total_team_fp
            );
        }
        echo json_encode($array);
    }

    function get($order_by) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get($order_by);
        return $query;
    }

    function get_all_players_list_contest($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_all_players_list_contest($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_players_stats($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_players_stats($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_form($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_form($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_players_salary($contest_id, $user_id, $user_entry_number) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_players_salary($contest_id, $user_id, $user_entry_number);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_games');
        $this->mdl_games->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_games');
        $this->mdl_games->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_games');
        $this->mdl_games->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_games');
        $count = $this->mdl_games->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_games');
        $max_id = $this->mdl_games->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_games');
        $query = $this->mdl_games->_custom_query($mysql_query);
        return $query;
    }

}
