<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contestslobby extends MX_Controller {

    function __construct() {
        parent::__construct();
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
        $this->load->model('mdl_contests');
        $data['active_contests'] = $this->mdl_contests->get_contest_status($league_id, TRUE);
        $data['inactive_contests'] = $this->mdl_contests->get_contest_status($league_id, FALSE);

        $data['view_file'] = 'league_contest';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function details($update_id) {
        $this->load->model('mdl_contests');
        $data['contest_details'] = $this->mdl_contests->get_details_where($update_id);

        $data['games_list_home'] = $this->mdl_contests->get_sports_events_home($update_id);
        $data['games_list_away'] = $this->mdl_contests->get_sports_events_away($update_id);

        $data['view_file'] = 'details';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add()
    {
        $this->form_validation->set_rules('leagues_id', 'League ID', 'required');
        $this->form_validation->set_rules('contest_name', 'Contest Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('entry_max', 'Entry Max', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');

        $league_id = $this->uri->segment(3);

        $this->load->module('leagues');
        $data['leagues_list'] = $this->leagues->get_where($league_id);
        foreach ($data['leagues_list']->result() as $row) {
            $league_insert_id = $row->id;

            $this->load->module('sports_events');
            $data['events_lists'] = $this->sports_events->get_events_list($league_insert_id);
        }

        if ($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_contest';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data1 = array(
                'leagues_id' => $this->input->post('leagues_id'),
                'contest_name' => $this->input->post('contest_name'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'entry_max' => $this->input->post('entry_max'),
            );

            if(isset($_REQUEST['submit'])) {
                $data2 = $_REQUEST['field_name'];
            }

            if ($this->_transactions_new_contest($data1, $data2)) {
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');

            }
            redirect('/contests/');
        }

    }

    function edit($update_id)
    {
        $this->form_validation->set_rules('leagues_id', 'League ID', 'required');
        $this->form_validation->set_rules('contest_name', 'Contest Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('entry_max', 'Entry Max', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['contest'] = $this->get_where_custom('id', $update_id);

            $this->load->model('mdl_contests');
            $data['league_selected'] = $this->mdl_contests->get_league_id($update_id);
            foreach ($data['league_selected']->result() as $row) {
                $league_id = $row->leagues_id;

                $this->load->module('sports_events');
                $data['events_lists'] = $this->sports_events->get_events_list($league_id);
            }

            $this->load->model('mdl_contests');
            $data['contest_games_selected'] = $this->mdl_contests->get_contest_games($update_id);

            $data['view_file'] = 'edit_phase';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data1 = array(
                'leagues_id' => $this->input->post('leagues_id'),
                'contest_name' => $this->input->post('contest_name'),
                'start_date' => $this->input->post('start_date'),
                'start_time' => $this->input->post('start_time'),
                'entry_max' => $this->input->post('entry_max'),
            );

            if(isset($_REQUEST['submit'])) {
                $data2 = $_REQUEST['field_name'];
            }

            if ($this->_transactions_new_contest($data1, $data2)) {
                return $query;
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');

            }
            redirect('/players_phases/');
        }
    }


    function make_inactive($id){
        $this->load->model('mdl_contests');
        if($this->mdl_contests->make_inactive($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/contests/');
    }

    function make_active($id){
        $this->load->model('mdl_contests');
        if($this->mdl_contests->make_active($id)) {
            $this->session->set_flashdata('team_phase_make_inactive', 'This team phase is now inactive');
        }
        redirect('/contests/');
    }

    function _transactions_new_contest($data1, $data2) {
        $this->load->model('mdl_contests');
        $this->mdl_contests->_transactions_new_contest($data1, $data2);
    }

    function get_events($contest_id) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_events($contest_id);
        return $query;
    }

    function get_events_id($contest_id) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_events_id($contest_id);
        return $query;
    }

    function get_formula($contest_id) {
        $this->load->module('contests');
        $query = $this->contests->get_formula($contest_id);
        return $query;
    }

    function get($order_by) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_contests');
        $this->mdl_contests->_insert($data);
    }

    function _insert1($data) {
        $this->load->model('mdl_contests');
        $this->mdl_contests->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_contests');
        $this->mdl_contests->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_contests');
        $this->mdl_contests->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_contests');
        $count = $this->mdl_contests->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_contests');
        $max_id = $this->mdl_contests->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_contests');
        $query = $this->mdl_contests->_custom_query($mysql_query);
        return $query;
    }

}