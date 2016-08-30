<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams_phases extends MX_Controller {
    
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

    function index() {
        $this->load->module('sports');
        $data['sports'] = $this->sports->get('sport_name');

        $this->load->module('leagues');
        $data['sports_leagues'] = $this->leagues->get_sport_league_name('league_name');


        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function league($league_id) {
        $this->load->model('mdl_teams_phases');
        $data['active_teams'] = $this->mdl_teams_phases->get_team_status($league_id, TRUE);
        $data['inactive_teams'] = $this->mdl_teams_phases->get_team_status($league_id, FALSE);

        $data['view_file'] = 'league_team_phase';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add() {
        $this->form_validation->set_rules('teams_id', 'Team ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('stadium_name', 'Stadium Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stadium_city', 'Stadium City', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stadium_country', 'Stadium Country', 'trim|required|xss_clean');

        $league_id = $this->uri->segment(3);

        $this->load->module('leagues');
        $data['leagues_list'] = $this->leagues->get_where_custom('id', $league_id);
        foreach ($data['leagues_list']->result() as $row) {
            $this->load->module('sports');
            $data['sports_list'] = $this->sports->get_where_custom('id', $row->sports_id);
        }

        $this->load->module('teams');
        $data['teams_list'] = $this->teams->get('team_name');



        if($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_phase';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'leagues_id'            =>      $this->input->post('leagues_id'),
                'teams_id'              =>      $this->input->post('teams_id'),
                'start_date'            =>      $this->input->post('start_date'),
                'end_date'              =>      $this->input->post('end_date'),
                'stadium_name'          =>      $this->input->post('stadium_name'),
                'stadium_city'          =>      $this->input->post('stadium_city'),
                'stadium_country'       =>      $this->input->post('stadium_country'),
            );

            if($this->_insert($data)){
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect ('/teams_phases/');
        }
    }

    function edit($update_id) {
        $this->form_validation->set_rules('sports_id', 'Sport ID', 'required');
        $this->form_validation->set_rules('leagues_id', 'League ID', 'required');
        $this->form_validation->set_rules('teams_id', 'Team ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('stadium_name', 'Stadium Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stadium_city', 'Stadium City', 'trim|required|xss_clean');
        $this->form_validation->set_rules('stadium_country', 'Stadium Country', 'trim|required|xss_clean');

        $this->load->module('sports');
        $data['sports_list'] = $this->sports->get('sport_name');

        $this->load->module('leagues');
        $data['leagues_list'] = $this->leagues->get('league_name');

        $this->load->module('teams');
        $data['teams_list'] = $this->teams->get('team_name');

        if($this->form_validation->run() == FALSE) {
            $data['team_phase'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_teams_phases');
            $data['sport_selected'] = $this->mdl_teams_phases->get_sport_id($update_id);

            $this->load->model('mdl_teams_phases');
            $data['league_selected'] = $this->mdl_teams_phases->get_league_id($update_id);

            $this->load->model('mdl_teams_phases');
            $data['team_selected'] = $this->mdl_teams_phases->get_team_id($update_id);

            $data['view_file'] = 'edit_phase';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'sports_id'             =>      $this->input->post('sports_id'),
                'leagues_id'            =>      $this->input->post('leagues_id'),
                'teams_id'              =>      $this->input->post('teams_id'),
                'start_date'            =>      $this->input->post('start_date'),
                'end_date'              =>      $this->input->post('end_date'),
                'stadium_name'          =>      $this->input->post('stadium_name'),
                'stadium_city'          =>      $this->input->post('stadium_city'),
                'stadium_country'       =>      $this->input->post('stadium_country'),
            );

            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('team_phase_edited', 'The team phase has been edited');
            }
            redirect ('/teams_phases/');
        }
    }

    function make_inactive($id){
        $this->load->model('mdl_teams_phases');
        $league_id = $this->mdl_teams_phases->get_league_id($id);
        if($this->mdl_teams_phases->make_inactive($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/teams_phases/');
    }

    function make_active($id){
        $this->load->model('mdl_teams_phases');
        if($this->mdl_teams_phases->make_active($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/teams_phases/');
    }

    function get_team_list_checked_ordered($value, $order_by) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get_team_list_checked_ordered($value, $order_by);
        return $query;
    }

    function get_leagues($sports_id){
        $this->load->model('mdl_teams_phases');
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->mdl_teams_phases->get_leagues_by_sports($sports_id)));
    }

    function get($order_by) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_teams_phases');
        $this->mdl_teams_phases->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_teams_phases');
        $this->mdl_teams_phases->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_teams_phases');
        $this->mdl_teams_phases->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_teams_phases');
        $count = $this->mdl_teams_phases->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_teams_phases');
        $max_id = $this->mdl_teams_phases->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_teams_phases');
        $query = $this->mdl_teams_phases->_custom_query($mysql_query);
        return $query;
    }
    
}