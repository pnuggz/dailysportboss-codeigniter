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
           if($this->input->post('username') == '' || $this->input->post('password') == '')
           {
               $this->output->set_output(json_encode(array('error'=>array(
                 'message' => 'Sorry, username and password must be filled.',
               ))), 400);

           } else {

               $username = $this->input->post('username');
               $password = $this->input->post('password');
               $cekusername = $this->mdl_users->check_users($username);
               if($cekusername)
               {

                    $user_id = $this->mdl_users->login_users($username, $password);
                   if($user_id){
                     if($cekusername->activation == 1)
                      {
                       $user_data = array('userid'    =>      $user_id,
                                          'username'   =>      $username,
                                          'logged_in'  =>      TRUE
                                          );

                       $this->session->set_userdata($user_data);
                       $this->session->set_userdata('token',$this->generate_token());
                       $query = $this->mdl_users->get_where($this->session->userdata['userid']);
                       $data = array();
                       foreach($query->result() as $row)
                       {
                         $birthday = '';
                         if($row->birthday && $row->birthday != '0000-00-00')$birthday =date('d-m-Y',strtotime($row->birthday));

                         $data = array(
                           'id'=> $row->id,
                           'email' => $row->email,
                           'username' => $row->username,
                           'firstname' => $row->first_name,
                           'lastname' => $row->last_name,
                           'registerdate' => date('d-m-Y H:i',strtotime($row->register_date)),
                         );
                       }
                       $this->output->set_output(json_encode(array('token'=>$this->session->userdata['token'],'data'=>$data)), 200);
                     }else{
                       $this->output->set_output(json_encode(array('error'=>array(
                         'message' => 'Sorry, you need activate your account first, please check your email for verification.',
                       ))), 400);http_response_code(400);
                     }

                   } else {
                     $this->output->set_output(json_encode(array('error'=>array(
                       'message' => 'Sorry, incorrect password entered.',
                     ))), 400);http_response_code(400);
                   }

               }else {
                 $this->output->set_output(json_encode(array('error'=>array(
                   'message' => 'Sorry, entered username does not exist. please register first.',
                 ))), 400);http_response_code(400);
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
