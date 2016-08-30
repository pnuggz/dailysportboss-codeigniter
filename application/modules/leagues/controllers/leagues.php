<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leagues extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

    function index() {
        $this->load->model('mdl_leagues');
        $data['leagues'] = $this->mdl_leagues->get_sport_name();

        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add() {

        $this->form_validation->set_rules('league_name', 'League Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('league_shorthand', 'League Shorthand', 'trim|required|xss_clean');
        $this->form_validation->set_rules('league_country', 'League Shorthand', 'trim|required|xss_clean');

        $this->load->module('sports');
        $data['sports_list'] = $this->sports->get('sport_name');

        if($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_league';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'league_name'           =>      $this->input->post('league_name'),
                'league_shorthand'      =>      $this->input->post('league_shorthand'),
                'league_country'        =>      $this->input->post('league_country'),
            );

            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('league_created', 'The league has been added');
            }
            redirect ('/leagues/');
        }
    }

    function edit($update_id) {
        $this->form_validation->set_rules('league_name', 'League Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('league_shorthand', 'League Shorthand', 'trim|required|xss_clean');
        $this->form_validation->set_rules('league_country', 'League Shorthand', 'trim|required|xss_clean');

        $this->load->module('sports');
        $data['sports_list'] = $this->sports->get('sport_name');

        if($this->form_validation->run() == FALSE) {
            $data['league'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_leagues');
            $data['sport_selected'] = $this->mdl_leagues->get_sport_id($update_id);

            $data['view_file'] = 'edit_league';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'league_name'           =>      $this->input->post('league_name'),
                'league_shorthand'      =>      $this->input->post('league_shorthand'),
                'league_country'        =>      $this->input->post('league_country'),
            );

            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('sport_deleted', 'The sport has been updated');
            }
            redirect ('/leagues/');
        }
    }

    function delete($update_id) {
        $this->_delete($update_id, $data);
        $this->session->set_flashdata('sport_deleted', 'The sport has been deleted');
        redirect ('/leagues/');
    }

    function get_sport_league_name($order_by) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get_sport_league_name($order_by);
        return $query;

    }

    function get($order_by) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_leagues');
        $this->mdl_leagues->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_leagues');
        $this->mdl_leagues->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_leagues');
        $this->mdl_leagues->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_leagues');
        $count = $this->mdl_leagues->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_leagues');
        $max_id = $this->mdl_leagues->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_leagues');
        $query = $this->mdl_leagues->_custom_query($mysql_query);
        return $query;
    }
    
}