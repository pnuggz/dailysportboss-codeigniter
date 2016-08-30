<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }
     
     function loginsubmit()
        {
            $this->load->helper('security');
            $this->load->library('form_validation');
            $this->load->model('mdl_users');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[30]|xss_clean');

            if ($this->form_validation->run() == FALSE)
            {
                $this->login();
                
            } else {
                
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user_id = $this->mdl_users->login_users($username, $password);
            };
            
            if($user_id){
                $user_data = array('user_id'    =>      $user_id,
                                   'username'   =>      $username,
                                   'logged_in'  =>      TRUE,
                                   );                             
                                    
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');    
                
                redirect('/');
                
            } else {
                
                $this->session->set_flashdata('login_failed', 'Sorry, the login info you entered is invalid.');
                
                redirect('/');
            }   
        }
        
        
        function registrationsubmit()
        {
            $this->load->helper('security');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[30]|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[30]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[30]|xss_clean|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[30]|xss_clean');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|max_length[30]|xss_clean|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->register();
                
            } else {
                
                $enc_password = md5($this->input->post('password'));
                
                $data = array('first_name'      =>       $this->input->post('first_name'),
                              'last_name'    =>      $this->input->post('last_name'),
                              'email'    =>      $this->input->post('email'),
                              'username'     =>      $this->input->post('username'),
                              'password'     =>      $enc_password,
                             );
                
                $this->_insert($data);
                $this->session->set_flashdata('registered', 'You are now registered. Please Login');    
                redirect('/');
            }
        }
        
    function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

        redirect ('/');
    }

    function login() {
        $data['view_file'] = "loginform";
        $this->load->module('template');
        $this->template->home($data);
    }
    
    function register() {
        $data['view_file'] = "registrationform";
        $this->load->module('template');
        $this->template->home($data);
    }
    
    function get($order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_users');
        $query = $this->mdl_users->get_where($id);
        return $query;
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