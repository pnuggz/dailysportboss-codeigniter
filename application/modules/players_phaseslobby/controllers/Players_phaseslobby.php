<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players_phaseslobby extends MX_Controller {

    function __construct() {
        parent::__construct($this->input->request_headers());
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
        $this->load->model('mdl_players_phases');
        $data['active_players'] = $this->mdl_players_phases->get_player_status($league_id, TRUE);
        $data['inactive_players'] = $this->mdl_players_phases->get_player_status($league_id, FALSE);

        $data['view_file'] = 'league_player_phase';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add()
    {
            $this->form_validation->set_rules('players_id', 'Player ID', 'required');
            $this->form_validation->set_rules('teams_phases_id', 'Team Phase ID', 'required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
            $this->form_validation->set_rules('height', 'Height', 'trim|required|xss_clean');
            $this->form_validation->set_rules('weight', 'Weight', 'trim|required|xss_clean');
            $this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');
            $this->form_validation->set_rules('number', 'Number', 'trim|required|xss_clean');
            $this->form_validation->set_rules('depth_chart', 'Depth Chart', 'trim|required|xss_clean');

            $league_id = $this->uri->segment(3);

            $this->load->module('teams_phases');
            $data['teams_list'] = $this->teams_phases->get_team_list_checked_ordered($league_id, 'team_name');

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
                    'players_id' => $this->input->post('players_id'),
                    'teams_phases_id' => $this->input->post('teams_phases_id'),
                    'height' => $this->input->post('height'),
                    'weight' => $this->input->post('weight'),
                    'position' => $this->input->post('position'),
                    'number' => $this->input->post('number'),
                    'depth_chart' => $this->input->post('depth_chart'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                );

                if ($this->_insert($data)) {
                    return $query;
                    $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
                }
                redirect('/players_phases/');
        }
    }

    function edit($update_id)
    {
        $this->form_validation->set_rules('teams_phases_id', 'Team Phase ID', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('height', 'Height', 'trim|required|xss_clean');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');
        $this->form_validation->set_rules('number', 'Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('depth_chart', 'Depth Chart', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['player_phase'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_players_phases');
            $data['league_selected'] = $this->mdl_players_phases->get_league_id($update_id);

            $this->load->model('mdl_players_phases');
            $data['team_phase_selected'] = $this->mdl_players_phases->get_team_id($update_id);

            $this->load->model('mdl_players_phases');
            $data['player_selected'] = $this->mdl_players_phases->get_player_id($update_id);

            $data['view_file'] = 'edit_phase';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(
                'leagues_id' => $this->input->post('leagues_id'),
                'players_id' => $this->input->post('players_id'),
                'teams_phases_id' => $this->input->post('teams_phases_id'),
                'height' => $this->input->post('height'),
                'weight' => $this->input->post('weight'),
                'position' => $this->input->post('position'),
                'number' => $this->input->post('number'),
                'depth_chart' => $this->input->post('depth_chart'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
            );

            if ($this->_update($update_id, $data)) {
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect('/players_phases/');
        }
    }

    function make_inactive($id){
        $this->load->model('mdl_players_phases');
        if($this->mdl_players_phases->make_inactive($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/players_phases/');
    }

    function make_active($id){
        $this->load->model('mdl_players_phases');
        if($this->mdl_players_phases->make_active($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/players_phases/');
    }

    function get_players_list_contest($contest_id, $position){
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_players_list_contest($contest_id, $position);
        return $query;
    }

    function get_all_players_list_contest($contest_id){
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_all_players_list_contest($contest_id);
        return $query;
    }

    function get_players_list_contest_individual($contest_id, $player_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_players_list_contest_individual($contest_id, $player_id);
        return $query;
    }

    function get_player_stats($contest_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_player_stats($contest_id);
        return $query;
    }

    function get_player_salary($contest_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_player_salary($contest_id);
        return $query;
    }

    function get_player_stats_individual($contest_id, $player_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_player_stats_individual($contest_id, $player_id);
        return $query;
    }

    function get_player_stats_individual_trial($contest_id, $player_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_player_stats_individual_trial($contest_id, $player_id);
        return $query;
    }

    function get_form($contest_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_form($contest_id);
        return $query;
    }

    function get_form_individual($contest_id,$player_id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_form_individual($contest_id, $player_id);
        return $query;
    }

    function get($order_by) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_players_phases');
        $this->mdl_players_phases->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_players_phases');
        $this->mdl_players_phases->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_players_phases');
        $this->mdl_players_phases->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_players_phases');
        $count = $this->mdl_players_phases->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_players_phases');
        $max_id = $this->mdl_players_phases->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_players_phases');
        $query = $this->mdl_players_phases->_custom_query($mysql_query);
        return $query;
    }

}
