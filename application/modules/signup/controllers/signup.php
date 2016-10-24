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
           $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email');
           $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|xss_clean');
           $this->form_validation->set_rules('password', 'Password', 'required|max_length[30]|xss_clean');
           $this->form_validation->set_rules('password2', 'Confirm Password', 'required|max_length[30]|xss_clean|matches[password]');
           $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[512]|xss_clean');
           $this->form_validation->set_rules('mobilephone', 'Mobile Phone', 'numeric|trim|required|max_length[512]|xss_clean');
           $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
           if($this->checkDateFormat($this->input->post('birthday')) == false){
             return $this->output->set_output(json_encode(array('error'=>array('birthday'=>"Invalid format birthday date"))), 200);
           }

           if($this->form_validation->run() == FALSE)
           {

              $data = array('error'=>$this->form_validation->error_array());
               $this->output->set_output(json_encode($data), 200);

           } else {
             $this->load->model('mdl_users');
             $cekusername = $this->mdl_users->check_users($this->input->post('username'));

             $cekemail = $this->mdl_users->check_email($this->input->post('email'));

             if($cekusername > 0)
             {
               $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, there is already an account registered with the same username."))), 200);
             }else if($cekemail > 0)
             {
               $this->output->set_output(json_encode(array('error'=>array('message'=>"Sorry, there is already an account registered with the same email address."))), 200);
             }else{
               $enc_password = md5($this->input->post('password'));
               $sub = $this->input->post('subscribe');
               if(!$sub)$sub=0;
               $data = array('first_name'      =>       $this->input->post('first_name'),
                             'last_name'    =>      $this->input->post('last_name'),
                             'email'    =>      $this->input->post('email'),
                             'username'     =>      $this->input->post('username'),
                             'password'     =>      $enc_password,
                             'address'    =>      $this->input->post('address'),
                             'phonenumber'     =>      $this->input->post('mobilephone'),
                             'birthday'     =>      date('Y-m-d',strtotime($this->input->post('birthday'))),
                             'subscribe'     => $sub
                            );

               $this->_insert($data);
               $this->output->set_output(json_encode(array('success'=>array('message'=>"Registration success, Enjoy your game."))), 200);
             }
           }
       }

       function checkDateFormat($date) {
          if (preg_match('/^\d{2}\-\d{2}\-\d{4}$/', $date)) {
              if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                  return true;
              else
                  return false;
          } else {
              return false;
          }
      }

       function _insert($data) {
           $this->load->model('mdl_users');
           $this->mdl_users->_insert($data);
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

}
