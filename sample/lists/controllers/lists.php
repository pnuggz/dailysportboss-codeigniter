<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends MX_Controller {
    
    function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect ('');
        }
    }
    
    function index() {
        $user_id = $this->session->userdata('user_id');
        $create_date = 'create_date ';
        
        $data['lists'] = $this->get_where_custom_ordered('list_user_id',$user_id,$create_date);
        
        $data['view_file'] = "lists";
        $this->load->module('template');
        $this->template->home($data);
    }

    function details($id) {
        $data['list'] = $this->get_where($id);
        
        $this->load->model('mdl_lists');      
        $data['active_tasks'] = $this->mdl_lists->get_list_tasks($id, TRUE);
        $data['inactive_tasks'] = $this->mdl_lists->get_list_tasks($id, FALSE);
    
        $data['view_file'] = "details";
        $this->load->module('template');
        $this->template->home($data);
    }
    
    function add() {
        $this->load->helper('security');
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('list_name', 'List Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('list_body', 'List Body', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['view_file'] = 'add_list';
            $this->load->module('template');
            $this->template->home($data);
            
        } else {
        
            $data = array('list_name'   =>      $this->input->post('list_name'),
                          'list_body'   =>      $this->input->post('list_body'),
                          'list_user_id'    =>      $this->session->userdata('user_id'),
                         );
            
            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('list_created', 'Your task list has been created');
                redirect ('/lists/');
            }
        }
    }
    
    function edit($update_id) {
        $this->load->helper('security');
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('list_name', 'List Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('list_body', 'List Body', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $data['list'] = $this->get_where_custom('id', $update_id);
        
            $data['view_file'] = 'edit_list';
            $this->load->module('template');
            $this->template->home($data);
            
        } else {
        
            $data = array('list_name'   =>      $this->input->post('list_name'),
                          'list_body'   =>      $this->input->post('list_body'),
                          'list_user_id'    =>      $this->session->userdata('user_id'),
                         );
            
            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('list_updated', 'Your task list has been updated');
                redirect ('/lists/');
            }
        }
    }
        
    function delete($update_id) {
        $this->_delete($update_id, $data);
        $this->session->set_flashdata('list_deleted', 'Your task list has been deleted');
        redirect ('/lists/');
    }
    
    function get_list_name($list_id) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get_list_name($list_id);
        return $query;
    }
    
    function get($order_by) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_lists');
        $this->mdl_lists->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_lists');
        $this->mdl_lists->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_lists');
        $this->mdl_lists->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_lists');
        $count = $this->mdl_lists->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_lists');
        $max_id = $this->mdl_lists->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_lists');
        $query = $this->mdl_lists->_custom_query($mysql_query);
        return $query;
    }
    
}