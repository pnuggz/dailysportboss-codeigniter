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
           $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email|is_unique[users.email]');
           $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|xss_clean|is_unique[users.username]');
           $this->form_validation->set_rules('password', 'Password', 'required|max_length[30]|xss_clean');
           $this->form_validation->set_rules('password2', 'Confirm Password', 'required|max_length[30]|xss_clean|matches[password]');
           if($this->form_validation->run() == FALSE)
           {
               $this->output->set_output(json_encode(validation_errors()), 200);

           } else {
             $this->load->model('mdl_users');
             $cekusername = $this->mdl_users->check_users($this->input->post('username'));

             $cekemail = $this->mdl_users->check_email($this->input->post('email'));

             if($cekusername == 0)
             {
               $this->output->set_output(json_encode("Username Already Exists"), 200);
             }else if($cekemail == 0)
             {
               $this->output->set_output(json_encode("Email Already Exists"), 200);
             }else{
               $enc_password = md5($this->input->post('password'));

               $data = array('first_name'      =>       $this->input->post('first_name'),
                             'last_name'    =>      $this->input->post('last_name'),
                             'email'    =>      $this->input->post('email'),
                             'username'     =>      $this->input->post('username'),
                             'password'     =>      $enc_password,
                            );

               $this->_insert($data);
               $this->output->set_output(json_encode("Success"), 200);
             }
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
