<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
require_once(APPPATH.DS."modules/secure_area.php");
class Draft extends Secure_area
{

    function __construct() {
        parent::__construct($this->input->request_headers());
        }

    function index($contest_id)
    {
        $user_id_count_entry = 1;

        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('roster_name', 'Roster Name', 'required|trim|xss_clean');

        $contest_id = 1;

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

            $this->output->set_output(json_encode($contest_roster_data), 200);
        }

    }

    function leagues()
    {
        $this->load->model('mdl_draft');
        $data = array(
          'token' => $this->session->userdata['token'],
          'data'  => $this->mdl_draft->get_league()
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function contests($league_id)
    {
        $this->load->model('mdl_draft');
        $data = array(
          'token' => $this->session->userdata['token'],
          'data'  => array(
              'active_contests' => $this->mdl_draft->get_contest_status($league_id, TRUE),
              'inactive_contests' => $this->mdl_draft->get_contest_status($league_id, FALSE)
          )
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function games($contest_id)
    {
        $user_id = $this->session->userdata('userid');

        $this->load->model('mdl_draft');
        $details = $this->mdl_draft->get_users_list($contest_id, $user_id);
        $data = array(
          'token' => $this->session->userdata['token'],
          'data'  => $details
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function add()
    {
        $user_id_count_entry = 1;
        $user_id = $this->session->userdata('userid');


        $this->load->module('contests');
            $user_id = $this->session->userdata('userid');
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

            $defenders = array(
                'player1'       =>      $defenders_post[0],
                'player2'       =>      $defenders_post[1],
                'player3'       =>      $defenders_post[2],
                'player4'       =>      $defenders_post[3]
            );

            $midfielders = array(
                'player5'       =>      $midfielders_post[0],
                'player6'       =>      $midfielders_post[1],
                'player7'       =>      $midfielders_post[2],
                'player8'       =>      $midfielders_post[3]
            );

            $forwards = array(
                'player9'       =>      $forwards_post[0],
                'player10'       =>      $forwards_post[1]
            );

            $contest_roster_data = array_merge($roster_name, $forwards, $midfielders, $defenders);

            if ($this->_transactions_new_contest_entry($contest_roster_data, $user_contest_data)) {
                $this->output->set_output(json_encode("The team phase has been set"), 200);
            }else{
              $this->output->set_output(json_encode("0"), 200);
            }

    }

    function contestdetails($league_id,$contest_id) {

        if($this->session->userdata('logged_in')) {
            $user_id = $this->session->userdata('userid');
            $user_entry_count = 0;

            $this->load->model('mdl_draft');
            $data1 = $this->mdl_draft->get_user_entry_count($contest_id, $user_id);
                foreach ($data1->result() as $row) {
                    $user_entry_count = $row->user_entry_count;
                }
        } else {
            $user_entry_count = '-';
        }


        $this->load->model('mdl_draft');
        $data = $this->mdl_draft->get_contest_details($league_id, $contest_id);
        foreach ($data->result() as $row){

            $array = array(
                'contest_id'            =>  $row->contests_id,
                'league_id'             =>  $row->leagues_id,
                'contest_name'          =>  $row->contest_name,
                'entry_max'             =>  $row->entry_max,
                'sponsors_id'           =>  $row->sponsors_id,
                'league_name'           =>  $row->league_name,
                'league_shorthand'      =>  $row->league_shorthand,
                'start_date'            =>  date('d-m-Y',strtotime($row->start_date)),
                'start_time'            =>  $row->start_time,
                'entry_count'           =>  $row->entry_count,
                'user_entry_count'      =>  $user_entry_count
            );
        }
        $this->output->set_output(json_encode($array), 200);
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
        $this->load->model('mdl_draft');
        $this->mdl_draft->_transactions_new_contest_entry($contest_roster_data, $user_contest_data);
    }

    function get_db_selected_players($contest_id) {
        $this->load->model('mdl_draft');
        $query = $this->mdl_draft->get_db_selected_players($contest_id);
        return $query;
    }

    function events($contest_id) {

        $this->load->model('mdl_draft');
        $data = array(
          "token" => $this->session->userdata['token'],
          "data" => $this->mdl_draft->get_events($contest_id),
        );
        $this->output->set_output(json_encode($data), 200);
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

    function players($contest_id)
    {
        $opid = 0;

        $this->load->module('contests');
        $data = $this->contests->get_events_id($contest_id);
        foreach ($data->result() as $row) {
            $array_team_home[] = $row->team_id_home;
            $array_team_away[] = $row->team_id_away;
        }

        $this->load->model('mdl_draft');
        $data = $this->mdl_draft->get_all_players_one($contest_id);
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
                'salary'    =>  $row->salary
            );
        };
        $result = array(
          'token' => $this->session->userdata['token'],
          'data' => $array_players,
        );
        $this->output->set_output(json_encode($result), 200);
    }

    function playerdetail($contest_id,$player_id) {

        $this->load->module('players_phases');
        $player_stats = $this->players_phases->get_player_stats_individual_trial($contest_id, $player_id);

        $array_stat_individual = array();
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
                'fp_total'  => $fp_total,
                'salary' => $row->latest_salary
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
                'fp_avg' => $row->avg_fp,
                'fp_form' => $row->form,
                'depth_chart'   => $row->depth_chart
            );
        }




        $result = array();
        foreach( $array_player_individual as $keyA => $valA ) {
            foreach( $array_stat_individual as $keyB => $valB ) {
                if( $valA['player_phase_id'] == $valB['player_phase_id'] ) {
                    $result[] = $valA + $valB;
                }
            }
        }



        $datas = array(
          'token' => $this->session->userdata['token'],
          'data' => $result,
        );

        $this->output->set_output(json_encode($datas), 200);

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

    function get_words() {
        $this->load->model('mdl_draft');
        $data = $this->mdl_draft->get_words();
        foreach ($data->result() as $row) {
            $array[] = array(
                'word_id' => $row->id,
                'word'  =>  $row->word
            );
        }
        echo json_encode($array);
    }
}
