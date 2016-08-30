<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends MX_Controller {
    
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

    function index() {
        $this->load->helper('date');
        $this->load->model('mdl_players');
        $data['players'] = $this->mdl_players->get_players();
        
        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add() {
        $this->form_validation->set_rules('sports_id', 'Sport ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', 'DOB', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');

        $this->load->module('sports');
        $data['sports_list'] = $this->sports->get('sport_name');

        if($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_player';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'first_name'            =>      $this->input->post('first_name'),
                'last_name'             =>      $this->input->post('last_name'),
                'nickname'              =>      $this->input->post('nickname'),
                'dob'                   =>      $this->input->post('dob'),
                'nationality'           =>      $this->input->post('nationality'),
            );

            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('player_created', 'The player has been added');
            }
            redirect ('/players/');
        }
    }

    function edit($update_id) {
        $this->form_validation->set_rules('sports_id', 'Sport ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('dob', 'DOB', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');

        $this->load->module('sports');
        $data['sports_list'] = $this->sports->get('sport_name');

        if($this->form_validation->run() == FALSE) {
            $data['player'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_players');
            $data['sport_selected'] = $this->mdl_players->get_sport_id($update_id);

            $data['view_file'] = 'edit_player';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'first_name'            =>      $this->input->post('first_name'),
                'last_name'             =>      $this->input->post('last_name'),
                'nickname'              =>      $this->input->post('nickname'),
                'dob'                   =>      $this->input->post('dob'),
                'nationality'           =>      $this->input->post('nationality'),
            );

            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('player_edited', 'The player has been edited');
            }
            redirect ('/players/');
        }
    }

    function get_where_custom_ordered_checked($col, $value, $order_by) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get_where_custom_ordered_checked($col, $value, $order_by);
        return $query;
    }
    
    function get($order_by) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_players');
        $this->mdl_players->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_players');
        $this->mdl_players->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_players');
        $this->mdl_players->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_players');
        $count = $this->mdl_players->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_players');
        $max_id = $this->mdl_players->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_players');
        $query = $this->mdl_players->_custom_query($mysql_query);
        return $query;
    }
    
}