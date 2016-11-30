<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lobby extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
    }

    function cekToken($token){
      if(array_key_exists('Authorization',$token))
   		{
   			if($token['Authorization'] && substr($token['Authorization'],0,5) != "Basic")
   			{
   				$decode_token = $this->decode_token($token['Authorization']);
   	      if($decode_token->exp > time())
   	  		{
            return array('userid'=>$decode_token->data->userid,'username'=>$decode_token->data->username);
   	  		}else{
   					echo json_encode(array('error'=>array('message'=>"Sorry, your session has expired please login again.")));http_response_code(401);exit;
   				}
   			}
       }
    }

    function leagues()
    {
        $cektoken = $this->cekToken($this->input->request_headers());
        $this->load->model('Mdl_draft');
        if($cektoken)
        {
          $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        }else{
          $token = '';
        }

        $data = array(
          'token' => $token,
          'data'  => $this->Mdl_draft->get_league()
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function players($contest_id)
    {
        $cektoken = $this->cekToken($this->input->request_headers());
        if($cektoken)
        {
          $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        }else{
          $token = '';
        }

        $opid = 0;
        $array_players = array();
        $this->load->module('contestslobby');
        $data = $this->contestslobby->get_events_id($contest_id);
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
          'token' => $token,
          'data' => $array_players,
        );
        $this->output->set_output(json_encode($result), 200);
    }

    function playerdetail($contest_id,$player_id) {
        $cektoken = $this->cekToken($this->input->request_headers());
        if($cektoken)
        {
          $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        }else{
          $token = '';
        }
        $this->load->module('players_phaseslobby');
        $player_stats = $this->players_phaseslobby->get_player_stats_individual_trial($contest_id, $player_id);

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


        $this->load->module('players_phaseslobby');
        $data = $this->players_phaseslobby->get_players_list_contest_individual($contest_id, $player_id);

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
          'token' => $token,
          'data' => $result,
        );

        $this->output->set_output(json_encode($datas), 200);

    }

    function events($contest_id) {
        $cektoken = $this->cekToken($this->input->request_headers());
        $this->load->model('mdl_draft');
        if($cektoken)
        {
          $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        }else{
          $token = '';
        }
        $data = array(
          "token" => $token,
          "data" => $this->mdl_draft->get_events($contest_id),
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function contests($league_id=null)
    {
        $cektoken = $this->cekToken($this->input->request_headers());
        $this->load->model('Mdl_draft');
        if($cektoken)
        {
          $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        }else{
          $token = '';
        }

        $data = array(
          'token' => $token,
          'data'  => array(
              'active_contests' => $this->Mdl_draft->get_contest_status($league_id, TRUE,$cektoken),
              'inactive_contests' => $this->Mdl_draft->get_contest_status($league_id, FALSE,$cektoken)
          )
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function contestdetails($league_id,$contest_id) {
        $cektoken = $this->cekToken($this->input->request_headers());
        $array = array();
        if($cektoken) {
            $user_id = $cektoken['userid'];
            $user_entry_count = 0;

            $this->load->model('Mdl_draft');
            $data1 = $this->Mdl_draft->get_user_entry_count($contest_id, $user_id);
                foreach ($data1->result() as $row) {
                    $user_entry_count = $row->user_entry_count;
                }
            $token = $this->generate_token($cektoken['userid'],$cektoken['username']);
        } else {
            $user_entry_count = '-';
            $token = '';
        }


        $this->load->model('Mdl_draft');
        $data = $this->Mdl_draft->get_contest_details($league_id, $contest_id);
        foreach ($data->result() as $row){

            $array = array(
                'contest_id'            =>  $row->contests_id,
                'league_id'             =>  $row->leagues_id,
                'contest_name'          =>  $row->contest_name,
                'entry_max'             =>  $row->entry_max,
                'entry_fee'             =>  $row->entry_fee,
                'entry_max_register'    => $row->entry_limit_register,
                'sponsors_id'           =>  $row->sponsors_id,
                'sponsorname'           =>  $row->sponsor,
                'sponsorlogo'           =>  base_url().'viewimage/logo/sponsor/'.$row->sponsors_id,
                'sponsorbanner'         =>  base_url().'viewimage/banner/sponsor/'.$row->sponsors_id,
                'league_name'           =>  $row->league_name,
                'league_shorthand'      =>  $row->league_shorthand,
                'start_date'            =>  date('d-m-Y',strtotime($row->start_date)),
                'start_time'            =>  $row->start_time,
                'entry_count'           =>  $row->entry_count,
                'user_entry_count'      =>  $user_entry_count,
                "prize" => $row->currency.' '.number_format($row->prize).$row->upto
            );
        }
        $this->output->set_output(json_encode(array('token'=>$token,'data'=>$array)), 200);
    }

    function generate_token($userid,$username) {
      $this->load->library('jwt');
  		$tokenId    = base64_encode(mcrypt_create_iv(32));
  		$issuedAt   = time();
  		$notBefore  = $issuedAt;             //Adding 10 seconds
  		$expire     = $notBefore + 10800;            // Adding 60 seconds
  		$serverName = $this->input->server('SERVER_NAME'); // Retrieve the server name from config file

  		/*
  		 * Create the token as an array
  		 */
  		$data = [
  				'iat'  => $issuedAt,         // Issued at: time when the token was generated
  				'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
  				'iss'  => $serverName,       // Issuer
  				'nbf'  => $notBefore,        // Not before
  				'exp'  => $expire,           // Expire
  				'data' => [                  // Data related to the signer user
  						'userid'   => $userid, // userid from the users table
              'username' => $username,
  				]
  		];
  		$key = base64_encode('dailysportboss');
  		$jwt = $this->jwt->encode($data, $key,'HS256');
  		return $jwt;
  	}

    function decode_token($jwt) {
  		$this->load->library('jwt');
  		$key = base64_encode('dailysportboss');
  		$jwtdec = $this->jwt->decode($jwt, $key);
  		return $jwtdec;
  	}

}
