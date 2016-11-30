<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
require_once(APPPATH.DS."modules/secure_area.php");

class Draft extends Secure_area {

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



    function join($contest_id)
    {
        if(array_key_exists('userid',$this->session->userdata))
        {
          $userid = $this->session->userdata('userid');
        }else{
          $userid = '';
        }

        if($userid)
        {
          $this->load->model('mdl_draft');
          $err = array();
          $cekContest = $this->mdl_draft->check_contest_start($contest_id);
          $cekCount = $this->mdl_draft->check_contest_count($contest_id,$userid);
          $cekmaxCount = $this->mdl_draft->check_register_contest_count($contest_id,$userid);
          if($cekContest==0)
          {
            $err['message'][] = 'Sorry, Contests already start.';
          }

          if($cekCount)
          {
            $err['message'][] = 'Sorry, cannot join contests because reach limit registered team.';
          }

          if($cekmaxCount)
          {
            $err['message'][] = 'Sorry, cannot join contests because reach maximum entry.';
          }

          if(!array_key_exists('message',$err))
          {
            $data = array(
              'token' => $this->session->userdata['token']
            );
            $this->output->set_output(json_encode($data), 200);
          }else{
            $this->output->set_output(json_encode(array('error'=>$err)), 200);
          }

        }else{
          echo json_encode(array('error'=>array('message'=>"Sorry, your session has expired please login again.")));exit;
        }

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

    function add($contest_id)
    {
      if(array_key_exists('userid',$this->session->userdata))
      {
        $userid = $this->session->userdata('userid');
      }else{
        $userid = '';
      }

      if($userid)
      {
        $this->load->model('mdl_draft');
        $err = array();
        $cekContest = $this->mdl_draft->check_contest_start($contest_id);
        $cekCount = $this->mdl_draft->check_contest_count($contest_id,$userid);
        $cekmaxCount = $this->mdl_draft->check_register_contest_count($contest_id,$userid);
        if($cekContest==0)
        {
          $err['message'][] = 'Sorry, contests already start.';
        }

        if($cekCount)
        {
          $err['message'][] = 'Sorry, cannot join contests because reach limit registered team.';
        }

        if($cekmaxCount)
        {
          $err['message'][] = 'Sorry, cannot join contests because reach maximum entry.';
        }

        if(!array_key_exists('message',$err))
        {
          $user_id_count_entry = 1;
          $user_id = $this->session->userdata('userid');
          $this->load->helper('security');
          $this->load->library('form_validation');
          $this->form_validation->set_rules('roster_name', 'Roster Name', 'trim|required|max_length[512]|xss_clean');
          $this->form_validation->set_rules('forwards[]', 'Forwards', 'required|callback_cekforward');
          $this->form_validation->set_rules('midfielders[]', 'Midfielders', 'required|callback_cekmidfielders');
          $this->form_validation->set_rules('defenders[]', 'Defenders', 'required|callback_cekdefenders');


          if($this->form_validation->run($this) == FALSE)
          {
            $new=array();
            foreach( $this->form_validation->error_array() as $key=>$value) {
               $new['message'][]= $this->form_validation->error_array()[$key];
             }
              $this->output->set_output(json_encode(array('error'=>$new)), 400);http_response_code(400);

          }else{
            $this->load->module('contests');
              $user_id = $this->session->userdata('userid');

              $this->load->module('contests_users_entries');
              $user_id_count =  $this->contests_users_entries->get_user_entry_count($user_id, $contest_id);
              foreach ($user_id_count->result() as $row) {
                  $user_id_count = $row->user_entry_count;
                  $user_id_count_entry = $user_id_count + 1;
              }

              $this->load->module('contests');
              $data['contest_details'] = $this->contests->get_where_custom('id', $contest_id);

              $user_contest_data = array(
                  'contest_id'            =>      $contest_id,
                  'user_id'               =>      $user_id,
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
              $insertentry = $this->_transactions_new_contest_entry($contest_roster_data, $user_contest_data);

              if ($insertentry) {
                  $this->output->set_output(json_encode(array("success"=>array("message"=>"The team phase has been set"))), 200);
              }else{
                $this->output->set_output(json_encode(array("error"=>array("message"=>"Setting team phase failed"))), 400);http_response_code(400);
              }
          }

        }else{
          $this->output->set_output(json_encode(array('error'=>$err)), 200);http_response_code(400);
        }

      }else{
        echo json_encode(array('error'=>array('message'=>"Sorry, your session has expired please login again.")));http_response_code(401);exit;
      }
    }

    function cekforward()
    {
      $validforward = 2;
      if(count($this->input->post('forwards')) < $validforward || count($this->input->post('forwards')) > $validforward)
      {
        $this->form_validation->set_message('cekforward', 'Forwards must have 2 players.');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    function cekmidfielders()
    {
      $validmidfielders = 4;
      if(count($this->input->post('midfielders')) < $validmidfielders  || count($this->input->post('midfielders')) > $validmidfielders)
      {
        $this->form_validation->set_message('cekmidfielders', 'Mid Fielders must have 4 players.');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    function cekdefenders()
    {
      $validdefenders = 4;
      if(count($this->input->post('defenders')) < $validdefenders  || count($this->input->post('defenders')) > $validdefenders)
      {
        $this->form_validation->set_message('cekdefenders', 'Defenders must have 4 players.');
        return FALSE;
      }else{
        return TRUE;
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
        $this->load->model('mdl_draft');
        return $this->mdl_draft->_transactions_new_contest_entry($contest_roster_data, $user_contest_data);
    }

    function get_db_selected_players($contest_id) {
        $this->load->model('mdl_draft');
        $query = $this->mdl_draft->get_db_selected_players($contest_id);
        return $query;
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
