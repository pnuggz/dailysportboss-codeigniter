<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports_events extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

    function index(){
        $this->load->module('sports');
        $data['sports'] = $this->sports->get('sport_name');

        $this->load->module('leagues');
        $data['sports_leagues'] = $this->leagues->get_sport_league_name('league_name');

        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function league($league_id) {
        $this->load->model('mdl_sports_events');
        $data['active_events'] = $this->mdl_sports_events->get_event_status($league_id, TRUE);
        $data['inactive_events'] = $this->mdl_sports_events->get_event_status($league_id, FALSE);

        $data['home_team'] = $this->mdl_sports_events->get_home_team();
        $data['away_team'] = $this->mdl_sports_events->get_away_team();

        $data['view_file'] = 'league_sport_event';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add()
    {
        $this->form_validation->set_rules('home_team_phase_id', 'Home Team Phase ID', 'required');
        $this->form_validation->set_rules('away_team_phase_id', 'Away Team Phase ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');

        $league_id = $this->uri->segment(3);

        $this->load->module('teams_phases');
        $data['teams_list_home'] = $this->teams_phases->get_team_list_checked_ordered($league_id, 'team_name');

        $this->load->module('teams_phases');
        $data['teams_list_away'] = $this->teams_phases->get_team_list_checked_ordered($league_id, 'team_name');

        $this->load->module('leagues');
        $data['leagues_list'] = $this->leagues->get_where($league_id);

        $this->load->module('leagues');
        $data['league_sport_id'] = $this->leagues->get_where_custom('id', $league_id);
        foreach ($data['league_sport_id']->result() as $row) {
            $league_sport_id = $row->sports_id;

            $this->load->module('players');
            $data['players_list'] = $this->players->get_where_custom_ordered_checked('sports_id', $league_sport_id, 'last_name');
        }

        if ($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_phase';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'leagues_id' => $this->input->post('leagues_id'),
                'home_team_phase_id' => $this->input->post('home_team_phase_id'),
                'away_team_phase_id' => $this->input->post('away_team_phase_id'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'weather_id' => $this->input->post('position'),
                'soccer_live_id' => $this->input->post('number'),
            );

            if ($this->_insert($data)) {
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect('/sports_events/');
        }
    }

    function edit($update_id)
    {
        $this->form_validation->set_rules('home_team_phase_id', 'Home Team Phase ID', 'required');
        $this->form_validation->set_rules('away_team_phase_id', 'Away Team Phase ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['sport_event'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_sports_events');
            $data['league_selected'] = $this->mdl_sports_events->get_league_id($update_id);

            $this->load->model('mdl_sports_events');
            $data['home_team_phase_selected'] = $this->mdl_sports_events->get_home_team_id($update_id);

            $this->load->model('mdl_sports_events');
            $data['away_team_phase_selected'] = $this->mdl_sports_events->get_away_team_id($update_id);

            $data['view_file'] = 'edit_event';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'leagues_id' => $this->input->post('leagues_id'),
                'home_team_phase_id' => $this->input->post('home_team_phase_id'),
                'away_team_phase_id' => $this->input->post('away_team_phase_id'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'weather_id' => $this->input->post('position'),
                'soccer_live_id' => $this->input->post('number'),
            );

            if ($this->_update($update_id, $data)) {
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect('/sports_events/');
        }
    }

    function make_inactive($id){
        $this->load->model('mdl_sports_events');
        if($this->mdl_sports_events->make_inactive($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/sports_events/');
    }

    function make_active($id){
        $this->load->model('mdl_sports_events');
        if($this->mdl_sports_events->make_active($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/sports_events/');
    }

    function get_events_list($value) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_events_list($value);
        return $query;
    }

    function get_date_of_events($contest_id) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_date_of_events($contest_id);
        return $query;
    }
    
    function get($order_by) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_sports_events');
        $this->mdl_sports_events->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_sports_events');
        $this->mdl_sports_events->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_sports_events');
        $this->mdl_sports_events->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_sports_events');
        $count = $this->mdl_sports_events->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_sports_events');
        $max_id = $this->mdl_sports_events->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_sports_events');
        $query = $this->mdl_sports_events->_custom_query($mysql_query);
        return $query;
    }
    
}