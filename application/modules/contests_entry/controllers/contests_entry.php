<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contests_entry extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->module('sports');
        $data['sports'] = $this->sports->get('sport_name');

        $this->load->module('leagues');
        $data['sports_leagues'] = $this->leagues->get_sport_league_name('league_name');

        $data['view_file'] = "manage";
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function league($league_id)
    {
        $this->load->model('mdl_contests_entry');
        $data['active_contests'] = $this->mdl_contests_entry->get_contest_status($league_id, TRUE);
        $data['inactive_contests'] = $this->mdl_contests_entry->get_contest_status($league_id, FALSE);

        $data['view_file'] = 'league_contests_entry';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function details($contest_id)
    {
        $this->load->module('contests_users_entries');
        $data['users_details'] = $this->contests_users_entries->get_users_list($contest_id);

        $data['contest_id'] = $contest_id;

        $data['view_file'] = 'details';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add()
    {
        $user_id_count_entry = 1;
        
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('roster_name', 'Roster Name', 'required|trim|xss_clean');

        $contest_id = $this->uri->segment(3);

        $this->load->module('contests');
        $data['contest_details'] = $this->contests->get_where_custom('id', $contest_id);

        $this->load->module('users');
        $data['users_id'] = $this->users->get('username');

        if ($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_contest_entry';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {
            $user_id = $this->input->post('user_id');
            $contest_id = $this->input->post('contest_id');
            $this->load->module('contests_users_entries');
            $user_id_count =  $this->contests_users_entries->get_user_entry_count($user_id, $contest_id);
            foreach ($user_id_count->result() as $row) {
                $user_id_count = $row->user_entry_count;
                $user_id_count_entry = $user_id_count + 1;
            }

            $this->load->module('contests');
            $data['contest_details'] = $this->contests->get_where_custom('id', $contest_id);

            $user_contest_data = array(
                'contest_id'            =>      $this->input->post('contest_id'),
                'user_id'               =>      $this->input->post('user_id'),
                'user_entry_count'      =>      $user_id_count_entry
            );

            $roster_name = array(
                'roster_name'       =>      $this->input->post('roster_name')
            );

            $forwards_post = $this->input->post('forwards');
            $midfielders_post = $this->input->post('midfielders');
            $defenders_post = $this->input->post('defenders');

            $forwards = array(
                'player1'       =>      $forwards_post[0],
                'player2'       =>      $forwards_post[1]
            );

            $midfielders = array(
                'player3'       =>      $midfielders_post[0],
                'player4'       =>      $midfielders_post[1],
                'player5'       =>      $midfielders_post[2],
                'player6'       =>      $midfielders_post[3]
            );

            $defenders = array(
                'player7'       =>      $defenders_post[0],
                'player8'       =>      $defenders_post[1],
                'player9'       =>      $defenders_post[2],
                'player10'       =>      $defenders_post[3]
            );

            $contest_roster_data = array_merge($roster_name, $forwards, $midfielders, $defenders);

            if ($this->_transactions_new_contest_entry($contest_roster_data, $user_contest_data)) {
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect('/games/details/'.$contest_id.'/'.$user_id.'/'.$user_id_count_entry.'/');
        }

    }

    function roster() {
        $contest_id = $this->uri->segment(3);
        $data['db_selected_players'] = $this->get_db_selected_players($contest_id);

        $data['view_file'] = 'roster';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function get_players_forward()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'forward');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function get_players_midfielder()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'midfielder');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function get_players_defender()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'defender');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function _transactions_new_contest_entry($contest_roster_data, $user_contest_data) {
        $this->load->model('mdl_contests_entry');
        $this->mdl_contests_entry->_transactions_new_contest_entry($contest_roster_data, $user_contest_data);
    }

    function get_db_selected_players($contest_id) {
        $this->load->model('mdl_contests_entry');
        $query = $this->mdl_contests_entry->get_db_selected_players($contest_id);
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

    function get_events_id()
    {
        $contest_id = 1;
        $tid = 20;
        $opid = 0;


        foreach ($array_home as $key => $tidh) {
            if ($tid == $tidh) {
                $opid = $array_away[$key];
            } else {

            }
        }

        foreach ($array_away as $key => $tidh) {
            if ($tid == $tidh) {
                $opid = $array_home[$key];
            } else {

            }
        }

        echo '<pre>';
        print_r($array_home);
        echo '</pre>';

        echo '<pre>';
        print_r($array_away);
        echo '</pre>';

        echo '<pre>';
            print_r($opid);
        echo '</pre>';

//        echo json_encode($array);
    }

    function get_players()
    {
        $contest_id = $this->uri->segment(3);
        $opid = 0;

        $this->load->module('contests');
        $data = $this->contests->get_events_id($contest_id);
        foreach ($data->result() as $row) {
            $array_team_home[] = $row->team_id_home;
            $array_team_away[] = $row->team_id_away;
        }

        $this->load->module('players_phases');
        $data = $this->players_phases->get_all_players_list_contest($contest_id);
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

        $this->load->module('players_phases');
        $player_stats = $this->players_phases->get_player_stats($contest_id);
        foreach ($player_stats->result() as $row) {
            $count = $row->counting;
            $fp_goals = $row->total_goals * 5;
            $fp_assists = $row->total_assists * 4;
            $fp_key_passes = $row->total_key_passes * 1;
            $fp_tackles = $row->total_tackles * 0.4;
            $fp_interceptions = $row->total_interceptions * 0.4;
            $fp_clearances = $row->total_clearances * 0.5;
            $fp_passes = $row->total_passes * 0.02;
            $fp_crosses = $row->total_crosses * 0.4;
            $fp_accurate_crosses = $row->total_accurate_crosses * 1;
            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;
            $fp_avg = $fp_total / $count;

            $array_fp_avg[] = array(
                'player_phase_id'   => $row->players_phases_id,
                'fp_avg'    =>  $fp_avg
            );

        }

        $this->load->module('players_phases');
        $player_form_raw = $this->players_phases->get_form($contest_id);
        foreach ($player_form_raw->result() as $row) {
            $count = $row->counting;
            $fp_goals = $row->total_goals * 5;
            $fp_assists = $row->total_assists * 4;
            $fp_key_passes = $row->total_key_passes * 1;
            $fp_tackles = $row->total_tackles * 0.4;
            $fp_interceptions = $row->total_interceptions * 0.4;
            $fp_clearances = $row->total_clearances * 0.5;
            $fp_passes = $row->total_passes * 0.02;
            $fp_crosses = $row->total_crosses * 0.4;
            $fp_accurate_crosses = $row->total_accurate_crosses * 1;
            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;

            if($count === 5) {
                $fp_form = $fp_total / 5;
            } else {
                $fp_form = $fp_total / $count;
            }

            $array_fp_form[] = array(
                'player_phase_id'   => $row->players_phases_id,
                'fp_form'    =>  $fp_form
            );

        }

        $this->load->module('players_phases');
        $player_stats = $this->players_phases->get_player_salary($contest_id);
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
                'oppid'      =>      $arr['oppid'],
                'fp_avg'   =>  ''
        );
            foreach ($array_fp_avg as $arr2) {
                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
                    $comb['fp_avg'] = $arr2['fp_avg'];
                    break;
                }
            }
            $d[] = $comb;
        }

        $e = array();
        foreach ($d as $arr) {
            $comb = array(
                'player_phase_id'   =>      $arr['player_phase_id'],
                'first_name'   =>     $arr['first_name'],
                'last_name'      =>      $arr['last_name'],
                'team_phase_id'       =>      $arr['team_phase_id'],
                'team_name'     =>      $arr['team_name'],
                'team_shorthand'        =>      $arr['team_shorthand'],
                'pos'      =>      $arr['pos'],
                'oppid'      =>      $arr['oppid'],
                'fp_avg'   =>  $arr['fp_avg'],
                'fp_form'    =>  ''
            );
            foreach ($array_fp_form as $arr2) {
                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
                    $comb['fp_form'] = $arr2['fp_form'];
                    break;
                }
            }
            $e[] = $comb;
        }

        $f = array();
        foreach ($e as $arr) {
            $comb = array(
                'player_phase_id'   =>      $arr['player_phase_id'],
                'first_name'   =>     $arr['first_name'],
                'last_name'      =>      $arr['last_name'],
                'team_phase_id'       =>      $arr['team_phase_id'],
                'team_name'     =>      $arr['team_name'],
                'team_shorthand'        =>      $arr['team_shorthand'],
                'pos'      =>      $arr['pos'],
                'oppid'      =>      $arr['oppid'],
                'fp_avg'   =>  $arr['fp_avg'],
                'fp_form'    =>  $arr['fp_form'],
                'salary'    =>  ''
            );
            foreach ($array_salary as $arr2) {
                if ($arr2['player_phase_id'] == $arr['player_phase_id']) {
                    $comb['salary'] = $arr2['salary'];
                    break;
                }
            }
            $f[] = $comb;
        }
        echo json_encode($f);
    }

    function calc_form_data() {
        $contest_id = $this->uri->segment(3);
        $player_id = $this->uri->segment(4);

        $i = 0;
        $fp_form = 0;
        $fp_average = 0;

        $this->load->module('players_phases');
        $player_stats = $this->players_phases->get_player_stats_individual_trial($contest_id, $player_id);
        foreach ($player_stats->result() as $row) {
            $fp_goals = $row->goals * 5;
            $fp_assists = $row->assists * 4;
            $fp_key_passes = $row->key_passes * 1;
            $fp_tackles = $row->tackles * 0.4;
            $fp_interceptions = $row->interceptions * 0.4;
            $fp_clearances = $row->clearances * 0.5;
            $fp_passes = $row->passes * 0.02;
            $fp_crosses = $row->crosses * 0.4;
            $fp_accurate_crosses = $row->accurate_crosses * 1;
            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;
            if ($i < 3) {
                $fp_form += $fp_total;
            }
            $fp_average += $fp_total;
            $i++;

            $array_stat_individual[] = array(
                'player_phase_id' => $row->players_phases_id,
                'date'  => $row->date,
                'goals' => $row->goals,
                'assists' => $row->assists,
                'key_passes' => $row->key_passes,
                'tackles' => $row->tackles,
                'interceptions' => $row->interceptions,
                'clearances' => $row->clearances,
                'passes' => $row->passes,
                'crosses' => $row->crosses,
                'accurate_crosses' => $row->accurate_crosses,
                'fp_total'  => $fp_total
            );
        }

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest_individual($contest_id, $player_id);
        foreach ($data->result() as $row) {
            $from = new DateTime($row->dob);
            $to = new DateTime('today');
            $age = $from->diff($to)->y;

            $array_player_individual[] = array(
                'player_phase_id' => $row->players_phases_id,
                'first_name' => $row->first_name,
                'last_name' => $row->last_name,
                'weight' => $row->weight,
                'height' => $row->height,
                'team_phase_id' => $row->players_phases_teams_phases_id,
                'team_name' => $row->team_name,
                'team_shorthand' => $row->team_shorthand,
                'pos' => $row->position,
                'age' => $age,
                'depth_chart'   => $row->depth_chart
            );
        }

        $this->load->module('players_phases');
        $player_form_raw = $this->players_phases->get_form_individual($contest_id, $player_id);
        foreach ($player_form_raw->result() as $row) {
            $count = $row->counting;
            $fp_goals = $row->total_goals * 5;
            $fp_assists = $row->total_assists * 4;
            $fp_key_passes = $row->total_key_passes * 1;
            $fp_tackles = $row->total_tackles * 0.4;
            $fp_interceptions = $row->total_interceptions * 0.4;
            $fp_clearances = $row->total_clearances * 0.5;
            $fp_passes = $row->total_passes * 0.02;
            $fp_crosses = $row->total_crosses * 0.4;
            $fp_accurate_crosses = $row->total_accurate_crosses * 1;
            $fp_total = $fp_goals + $fp_assists + $fp_key_passes + $fp_tackles + $fp_interceptions + $fp_clearances + $fp_passes + $fp_crosses + $fp_accurate_crosses;

            if($count === 3) {
                $fp_form = $fp_total / 3;
            } else {
                $fp_form = $fp_total / $count;
            }

            $fp_forms = array(
                'fp_form'    =>  $fp_form
            );

        }

        $fp_avg = array( 'fp_avg' => $fp_average / count($array_stat_individual) );

        $result = array();
        foreach( $array_player_individual as $keyA => $valA ) {
            foreach( $array_stat_individual as $keyB => $valB ) {
                if( $valA['player_phase_id'] == $valB['player_phase_id'] ) {
                    $result[] = $valA + $valB;
                }
            }
        }

        $size = count($result);
        $p = 0;
        while($p < $size) {
            $final_result[] = $result[$p] + $fp_avg + $fp_forms;
            $p++;
        }
        echo json_encode($final_result);

    }

    function get_fake_data() {
        sleep(2);

        $fakeDatabase = array(
            array(
                'postTitle'     =>      '1st Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '2nd Post',
                'postContent'   =>      'The content for the second post'
            ),
            array(
                'postTitle'     =>      '3rd Post',
                'postContent'   =>      'The content for the third post'
            ),
            array(
                'postTitle'     =>      '4th Post',
                'postContent'   =>      'The content for the fourth post'
            ),
            array(
                'postTitle'     =>      '5th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '6th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '7th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '8th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '9th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '10th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '11th Post',
                'postContent'   =>      'The content for the first post'
            )
        );

        if(isset($_GET['page']) && isset($_GET['items_per_page']) && $_GET['page'] > 0 && $_GET['items_per_page'] > 0) {
            $offset = (($_GET['page'] - 1) * $_GET['items_per_page']);
            $length = ($_GET['items_per_page']);

            $posts = array_slice($fakeDatabase, $offset, $length);
            $result = array('total_posts' => count($fakeDatabase), 'posts' => $posts);
            $result = json_encode($result);

            echo $result;
        }
    }
}