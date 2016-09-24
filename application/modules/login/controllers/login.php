<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
    }

    function submit()
   {
           $this->load->helper('security');
           $this->load->model('mdl_users');
           if($this->input->post('username') == '' && $this->input->post('password') == '')
           {
               $this->output->set_output(json_encode('0'), 200);

           } else {

               $username = $this->input->post('username');
               $password = $this->input->post('password');

               $user_id = $this->mdl_users->login_users($username, $password);
               if($user_id){
                   $user_data = array('userid'    =>      $user_id,
                                      'username'   =>      $username,
                                      'logged_in'  =>      TRUE
                                      );

                   $this->session->set_userdata($user_data);
                   $this->session->set_userdata('token',$this->generate_token());
                   $this->output->set_output(json_encode(array('token'=>$this->session->userdata['token'])), 200);

               } else {
                   $this->output->set_output(json_encode('0'), 200);
               }
           }
       }

       function generate_token() {
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
     						'userid'   => $this->session->userdata['userid'], // userid from the users table
     						'username'   => $this->session->userdata['username'] // userid from the users table
     				]
     		];
     		$key = base64_encode('dailysportboss');
     		$jwt = $this->jwt->encode($data, $key,'HS256');
     		return $jwt;
     	}

}
