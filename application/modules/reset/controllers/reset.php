<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
    }

   function request()
   {
     $this->load->helper('security');
     $this->load->model('mdl_users');
     $this->load->library('form_validation');
     $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email');
     if($this->form_validation->run($this) == FALSE)
     {

        $data = array('error'=>$this->form_validation->error_array());
         $this->output->set_output(json_encode($data), 200);

     } else {
       $this->load->model('mdl_users');

       $cekemail = $this->mdl_users->check_email($this->input->post('email'));

       if($cekemail)
       {
         $this->load->library('Mail');
         $this->load->library('jwt');
         $token = $this->generate_token($cekemail);
         $send = new Mail();
         $message = base_url().'reset/form/'.$token;
         $send->sendMail($this->input->post('email'),'Reset Password',$message);
         $this->output->set_output(json_encode(array('success'=>array('message'=>"Request reset password has been send to your email, please check your email."))), 200);
       }else{
         $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, this email address not available."))), 200);
       }
     }
   }

   function form($token)
   {
     if($token)
     {
       $this->load->library('jwt');
       $decode_token = $this->decode_token($token);
       if($decode_token->exp > time())
       {
         $userid = $decode_token->data->userid;
         $this->output->set_output(json_encode(array('token'=>$token)), 200);
       }else{
         $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, your form already expired."))), 200);
       }
     }else{
       $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, your form already expired."))), 200);
     }
   }

   function password($token) {
     $this->load->model('mdl_users');
     $this->load->library('form_validation');
     if($token)
     {
       $this->load->library('jwt');
       $decode_token = $this->decode_token($token);
       if($decode_token->exp > time())
       {
          $id = $decode_token->data->userid;
          $this->form_validation->set_rules('newpassword', 'New Password', 'required|max_length[30]|xss_clean');
          $this->form_validation->set_rules('newpassword2', 'Confirm New Password', 'required|max_length[30]|xss_clean|matches[newpassword]');
          if($this->form_validation->run() == FALSE)
          {
            $new=array();
            foreach( $this->form_validation->error_array() as $key=>$value) {
               $new['message'][]= $this->form_validation->error_array()[$key];
             }
              $this->output->set_output(json_encode(array('error'=>$new)), 200);
          }else {
            $this->load->model('mdl_users');
            $enc_password = md5($this->input->post('newpassword'));

            $data = array('password'      =>       $enc_password,
                         );

            $this->mdl_users->_update($id,$data);
            $this->output->set_output(json_encode(array('success'=>array('message'=>"Your password has change."))), 200);
          }
       }else{
         $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, your form already expired."))), 200);
       }
     }else{
       $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, your form already expired."))), 200);
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
