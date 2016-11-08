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
   			if($token['Authorization'])
   			{
   				$decode_token = $this->decode_token($token['Authorization']);
   	      if($decode_token->exp > time())
   	  		{

            return $decode_token->data->userid;
   	  		}else{
   					echo json_encode(array('error'=>array('message'=>"Sorry, your session has expired please login again.")));exit;
   				}
   			}
       }
    }

    function leagues()
    {
        $cektoken = $this->cekToken($this->input->request_headers());
        $this->load->model('mdl_draft');
        if($cektoken)
        {
          $token = $this->generate_token($cektoken);
        }else{
          $token = '';
        }

        $data = array(
          'token' => $token,
          'data'  => $this->mdl_draft->get_league()
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function contests($league_id=null)
    {
        $cektoken = $this->cekToken($this->input->request_headers());
        $this->load->model('mdl_draft');
        if($cektoken)
        {
          $token = $this->generate_token($cektoken);
        }else{
          $token = '';
        }
        $data = array(
          'token' => $token,
          'data'  => array(
              'active_contests' => $this->mdl_draft->get_contest_status($league_id, TRUE,$cektoken),
              'inactive_contests' => $this->mdl_draft->get_contest_status($league_id, FALSE,$cektoken)
          )
        );
        $this->output->set_output(json_encode($data), 200);
    }

    function contestdetails($league_id,$contest_id) {
        $cektoken = $this->cekToken($this->input->request_headers());
        $array = array();
        if($cektoken) {
            $user_id = $cektoken;
            $user_entry_count = 0;

            $this->load->model('mdl_draft');
            $data1 = $this->mdl_draft->get_user_entry_count($contest_id, $user_id);
                foreach ($data1->result() as $row) {
                    $user_entry_count = $row->user_entry_count;
                }
            $token = $this->generate_token($cektoken);
        } else {
            $user_entry_count = '-';
            $token = '';
        }


        $this->load->model('mdl_draft');
        $data = $this->mdl_draft->get_contest_details($league_id, $contest_id);
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

    function generate_token($userid) {
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
