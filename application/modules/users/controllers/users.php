<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
require_once(APPPATH.DS."modules/secure_area.php");

class Users extends Secure_area {

    function __construct() {
        parent::__construct($this->input->request_headers());
    }

    function index()
    {
      $this->load->model('mdl_users');
      $query = $this->mdl_users->get_where($this->session->userdata['userid']);
      $data = array();
      foreach($query->result() as $row)
      {
        $birthday = '';
        if($row->birthday && $row->birthday != '0000-00-00')$birthday =date('d-m-Y',strtotime($row->birthday));
        $this->load->library('jwt');
        $token = $this->generate_token($row->id);
        $data = array(
          'id'=> $row->id,
          'email' => $row->email,
          'username' => $row->username,
          'firstname' => $row->first_name,
          'lastname' => $row->last_name,
          'registerdate' => date('d-m-Y H:i',strtotime($row->register_date)),
          'address' => $row->address,
          'zipcode' => $row->zipcode,
          'mobilephone' => $row->phonenumber,
          'birthday' => $birthday,
          'subscribe' => $row->subscribe,
          'gender' => $row->gender
        );
      }
      $this->output->set_output(json_encode(array('token'=>$token,'data'=>$data)), 200);
    }


    function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('token');
        $this->session->sess_destroy();
        $this->output->set_output(json_encode(array('success'=>array('message'=>'Success log out'))), 200);
    }

    function edit() {
      $this->load->helper('security');
      $id = $this->session->userdata['userid'];
      $this->load->library('form_validation');

      $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[30]|xss_clean');
      $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[30]|xss_clean');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email');
      $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[512]|xss_clean');
      $this->form_validation->set_rules('zipcode', 'Zip Code', 'numeric|trim|required|max_length[100]|xss_clean');
      $this->form_validation->set_rules('mobilephone', 'Mobile Phone', 'numeric|trim|required|max_length[512]|xss_clean');
      $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_checkdateformat');
      $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
      if($this->form_validation->run() == FALSE)
      {
        $new=array();
        foreach( $this->form_validation->error_array() as $key=>$value) {
           $new['message'][]= $this->form_validation->error_array()[$key];
         }
          $this->output->set_output(json_encode(array('error'=>$new)), 200);http_response_code(400);
      }else {
        $this->load->model('mdl_users');

          $data = array('first_name'      =>       $this->input->post('firstname'),
                        'last_name'    =>      $this->input->post('lastname'),
                        'email'    =>      $this->input->post('email'),
                        'address'    =>      $this->input->post('address'),
                        'phonenumber'     =>      $this->input->post('mobilephone'),
                        'gender'     =>      $this->input->post('gender'),
                        'zipcode'    =>      $this->input->post('zipcode'),
                        'birthday'     =>      date('Y-m-d',strtotime($this->input->post('birthday'))),
                        'subscribe'     =>      $this->input->post('subscribe')
                       );

          $this->mdl_users->_update($id,$data);
          $this->output->set_output(json_encode(array('success'=>array('message'=>"Edit profile success.",'token'=>$this->session->userdata['token']))), 200);
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

   public function cekemails($email) {
     $id = $this->session->userdata['userid'];
     $this->load->model('mdl_users');
     $cekemail = $this->mdl_users->check_email($email,$id);
     if($cekemail > 0)
     {
       $this->form_validation->set_message('cekemails', 'The Email field is already registered.');
       return FALSE;
     }else{
       return TRUE;
     }
  }

    function changepassword() {
      $this->load->model('mdl_users');
      $id = $this->session->userdata['userid'];
      $this->load->library('form_validation');
      $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|max_length[30]|xss_clean');
      $this->form_validation->set_rules('newpassword', 'New Password', 'required|max_length[30]|xss_clean');
      $this->form_validation->set_rules('newpassword2', 'Confirm New Password', 'required|max_length[30]|xss_clean|matches[newpassword]');
      if($this->form_validation->run() == FALSE)
      {
        $new=array();
        foreach( $this->form_validation->error_array() as $key=>$value) {
           $new['message'][]= $this->form_validation->error_array()[$key];
         }
          $this->output->set_output(json_encode(array('error'=>$new)), 400);http_response_code(400);

      }else {
        $this->load->model('mdl_users');
        $oldpassword = md5($this->input->post('oldpassword'));
        $cekpassword = $this->mdl_users->check_password($oldpassword,$id);
        if($cekpassword == 0)
        {
          $this->output->set_output(json_encode("Invalid Password"), 400);http_response_code(400);
        }else{
          $enc_password = md5($this->input->post('newpassword'));

          $data = array('password'      =>       $enc_password,
                       );

          $this->mdl_users->_update($id,$data);
          $this->output->set_output(json_encode($this->session->userdata['token']), 200);
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

    function get_where_custom($col, $value) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_users');
        $this->mdl_users->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_users');
        $this->mdl_users->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_users');
        $count = $this->mdl_users->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_users');
        $max_id = $this->mdl_users->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->_custom_query($mysql_query);
        return $query;
    }


}
