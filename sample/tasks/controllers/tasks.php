<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $user_id = $this->session->userdata('user_id');
    }
    
    function details($id) {
        $data['task'] = $this->get_where($id);
        foreach($data['task']->result() as $row) {
            $list_id = $row->list_id;
        }
        
        $this->load->module('lists');
        $data['list_name'] = $this->lists->get_list_name($list_id);
    
        $data['view_file'] = "details";
        $this->load->module('template');
        $this->template->home($data);
    }
    
    function add($list_id) {
        $this->load->helper('security');
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('task_body', 'Task Body', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->module('lists');
            $data['list_name'] = $this->lists->get_list_name($list_id);
            
            $data['view_file'] = 'add_task';
            $this->load->module('template');
            $this->template->home($data);
            
        } else {
        
            $data = array('task_name'   =>      $this->input->post('task_name'),
                          'task_body'   =>      $this->input->post('task_body'),
                          'due_date'    =>      $this->input->post('due_date'),
                          'list_id'    =>      $list_id,
                         );
            
            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('task_created', 'Your task has been created');
            }
            redirect ('lists/details/'.$list_id.'/');
        }
    }
    
    function edit($task_id) {
        $this->load->helper('security');
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('task_body', 'Task Body', 'trim|xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->module('lists');
            $return_id = 'list_id';
            $data['list_data'] = $this->get_where_id($task_id, $return_id);
            $data['list_name'] = $this->lists->get_list_name($data['list_data']);
            $data['this_task'] = $this->get_where($task_id);
            
            $data['view_file'] = 'edit_task';
            $this->load->module('template');
            $this->template->home($data);
            
        } else {
            $return_id = 'list_id';
            $list_id = $this->get_where_id($task_id, $return_id);
        
            $data = array('task_name'   =>      $this->input->post('task_name'),
                          'task_body'   =>      $this->input->post('task_body'),
                          'due_date'    =>      $this->input->post('due_date'),
                          'list_id'    =>      $list_id,
                         );
            
            if($this->_update($task_id, $data)){
                $return_id = 'list_id';
                $list_id = $this->get_where_id($task_id, $return_id);
                $this->session->set_flashdata('task_updated', 'Your task has been edited');
            }
            redirect ('/lists/details/'.$list_id.'/');
        }
    }
    
    function delete($task_id) {
        $return_id = 'list_id';
        $list_id = $this->get_where_id($task_id, $return_id);
        $this->_delete($task_id, $data);
        $this->session->set_flashdata('task_deleted', 'Your task has been deleted');
        redirect ('lists/details/'.$list_id.'/');
    }
    
    function get($order_by) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->get_where($id);
        return $query;
    }
    
    function get_where_id($id, $return_id) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->get_where_id($id, $return_id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->get_where_custom($col, $value);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_tasks');
        $this->mdl_tasks->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_tasks');
        $this->mdl_tasks->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_tasks');
        $this->mdl_tasks->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_tasks');
        $count = $this->mdl_tasks->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_tasks');
        $max_id = $this->mdl_tasks->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_tasks');
        $query = $this->mdl_tasks->_custom_query($mysql_query);
        return $query;
    }
    
}