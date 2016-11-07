<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index(){

    }

    function v1($token) {
      $this->load->model('mdl_users');
      if($token)
      {
        $this->load->library('jwt');
        $decode_token = $this->decode_token($token);
          $id = $decode_token->data->userid;
          $this->load->model('mdl_users');

          $data = array('activation'      =>       1,
                       );
          $this->mdl_users->_update($id,$data);
          $this->output->set_output(json_encode(array('success'=>array('message'=>"Your account has activate."))), 200);
      }else{
        $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, your form invalid token."))), 200);
      }
    }

   function _update($id, $data) {
       $this->load->model('mdl_users');
       $this->mdl_users->_update($id, $data);
   }

   function generate_token($userid) {
 		$tokenId    = base64_encode(mcrypt_create_iv(32));
 		$issuedAt   = time();
 		$notBefore  = $issuedAt;             //Adding 10 seconds
 		$expire     = strtotime('+1 months');
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

 		$key = base64_encode('dailysportboss');
 		$jwtdec = $this->jwt->decode($jwt, $key);
 		return $jwtdec;
 	}

}
