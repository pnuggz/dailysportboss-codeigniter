<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

    function index() {
        $data['sports'] = $this->get('id');

        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add() {

        $this->form_validation->set_rules('sport_name', 'Sport Name', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            $data['view_file'] = 'add_sport';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(  'sport_name'         =>      $this->input->post('sport_name'),
            );

            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('sport_created', 'The sport has been added');
            }
            redirect ('/sports/');
        }
    }

    function edit($update_id) {
        $this->form_validation->set_rules('sport_name', 'Sport Name', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            $data['sports'] = $this->get_where_custom('id', $update_id);

            $data['view_file'] = 'edit_sport';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(  'sport_name'         =>      $this->input->post('sport_name'),
            );

            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('sport_deleted', 'The sport has been updated');
            }
            redirect ('/sports/');
        }
    }

    function delete($update_id) {
        $this->_delete($update_id, $data);
        $this->session->set_flashdata('sport_deleted', 'The sport has been deleted');
        redirect ('/sports/');
    }

    function get($order_by) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_sports');
        $this->mdl_sports->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_sports');
        $this->mdl_sports->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_sports');
        $this->mdl_sports->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_sports');
        $count = $this->mdl_sports->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_sports');
        $max_id = $this->mdl_sports->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_sports');
        $query = $this->mdl_sports->_custom_query($mysql_query);
        return $query;
    }
    
}