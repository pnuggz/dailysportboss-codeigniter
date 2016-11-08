<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
    }

    function register()
   {
           $this->load->helper('security');
           $this->load->model('mdl_users');
           $this->load->library('form_validation');

           $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[30]|xss_clean');
           $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[30]|xss_clean');
           $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email|callback_cekemails');
           $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|xss_clean|callback_cekusernames');
           $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|xss_clean');
           $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[6]|max_length[30]|xss_clean|matches[password]');
           $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[512]|xss_clean');
           $this->form_validation->set_rules('zipcode', 'Zip Code', 'numeric|trim|required|max_length[100]|xss_clean');
           $this->form_validation->set_rules('mobilephone', 'Mobile Phone', 'numeric|trim|required|max_length[512]|xss_clean');
           $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_checkdateformat');

           if($this->form_validation->run($this) == FALSE)
           {
             $new=array();
             foreach( $this->form_validation->error_array() as $key=>$value) {
              	$new['message'][]= $this->form_validation->error_array()[$key];
              }
               $this->output->set_output(json_encode(array('error'=>$new)), 200);

           } else {
             $this->load->model('mdl_users');
               $enc_password = md5($this->input->post('password'));
               $sub = $this->input->post('subscribe');
               if(!$sub)$sub=0;
               $data = array('first_name'      =>       $this->input->post('first_name'),
                             'last_name'    =>      $this->input->post('last_name'),
                             'email'    =>      $this->input->post('email'),
                             'username'     =>      $this->input->post('username'),
                             'password'     =>      $enc_password,
                             'address'    =>      $this->input->post('address'),
                             'zipcode'    =>      $this->input->post('zipcode'),
                             'phonenumber'     =>      $this->input->post('mobilephone'),
                             'birthday'     =>      date('Y-m-d',strtotime($this->input->post('birthday'))),
                             'subscribe'     => $sub,
                             'activation'    => 0
                            );

               $id = $this->_insert($data);
               $this->load->library('Mail');
               $this->load->library('jwt');
               $token = $this->generate_token($id);
               $send = new Mail();
               $message = 'http://localhost:3000/account/#/signup_complete/'.$token;
               $send->sendMail($this->input->post('email'),'Email Verification',$message);
               $this->output->set_output(json_encode(array('success'=>array('message'=>"Registration success, please check your email for verification."))), 200);
           }
       }

       public function checkdateformat($date) {
          if (preg_match('/^\d{2}\-\d{2}\-\d{4}$/', $date)) {
              if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                  {return TRUE;}
              else
                  {$this->form_validation->set_message('checkdateformat', 'Invalid format birthday date.'); return FALSE;}
          } else {
              $this->form_validation->set_message('checkdateformat', 'Invalid format birthday date.');
              return FALSE;
          }
      }

      public function cekusernames($username) {
        $this->load->model('mdl_users');
        $cekusername = $this->mdl_users->check_users($username);
        if($cekusername > 0)
        {
          $this->form_validation->set_message('cekusernames', 'The Username field is already registered.');
          return FALSE;
        }else{
          return TRUE;
        }
      }

      public function cekemails($email) {
        $this->load->model('mdl_users');
        $cekemail = $this->mdl_users->check_email($email);
        if($cekemail > 0)
        {
          $this->form_validation->set_message('cekemails', 'The Email field is already registered.');
          return FALSE;
        }else{
          return TRUE;
        }
     }

       function _insert($data) {
           $this->load->model('mdl_users');
           return $this->mdl_users->_insert($data);
       }

       function username() {
           $this->load->model('mdl_users');
           $result = $this->mdl_users->check_users($this->input->post('username'));
           $this->output->set_output(json_encode($result), 200);
       }

       function email() {
           $this->load->model('mdl_users');
           $result = $this->mdl_users->check_email($this->input->post('email'));
           $this->output->set_output(json_encode($result), 200);
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
