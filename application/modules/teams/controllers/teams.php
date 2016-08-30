<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('/cmshome/');
        }
    }

        function index() {
            $this->load->module('leagues');
            $data['leagues'] = $this->leagues->get('id');

            $data['teams'] = $this->get('team_name');

            $data['view_file'] = "manage";
            $this->load->module('template');
            $this->template->cmslayout($data);
        }

        function add() {

            $this->form_validation->set_rules('team_name', 'Team Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('team_nickname', 'Team Nickname', 'trim|xss_clean');
            $this->form_validation->set_rules('team_shorthand', 'Team Shorthand', 'trim|xss_clean');

            if($this->form_validation->run() == FALSE) {
                $data['view_file'] = 'add_team';
                $this->load->module('template');
                $this->template->cmslayout($data);

            } else {

                $data = array(  'team_name'         =>      $this->input->post('team_name'),
                                'team_nickname'     =>      $this->input->post('team_nickname'),
                                'team_shorthand'    =>      $this->input->post('team_shorthand'),
                );

                if($this->_insert($data)){
                    return $query;
                    $this->session->set_flashdata('team_created', 'The team has been added');
                }
                redirect ('/teams/');
            }
        }

    function edit($update_id) {
        $this->form_validation->set_rules('team_name', 'Team Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('team_nickname', 'Team Nickname', 'trim|xss_clean');
        $this->form_validation->set_rules('team_shorthand', 'Team Shorthand', 'trim|xss_clean');

        if($this->form_validation->run() == FALSE) {
            $data['team'] = $this->get_where_custom('id', $update_id);

            $data['view_file'] = 'edit_team';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {

            $data = array(  'team_name'         =>      $this->input->post('team_name'),
                            'team_nickname'     =>      $this->input->post('team_nickname'),
                            'team_shorthand'    =>      $this->input->post('team_shorthand'),
            );

            if($this->_update($update_id, $data)){
                return TRUE;
                $this->session->set_flashdata('team_updated', 'The team has been updated');
            }
            redirect ('/teams/');
        }
    }

    function delete($update_id) {
        $this->_delete($update_id, $data);
        $this->session->set_flashdata('team_deleted', 'The team has been deleted');
        redirect ('/teams/');
    }

    function get($order_by) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_teams');
        $this->mdl_teams->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_teams');
        $this->mdl_teams->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_teams');
        $this->mdl_teams->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_teams');
        $count = $this->mdl_teams->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_teams');
        $max_id = $this->mdl_teams->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_teams');
        $query = $this->mdl_teams->_custom_query($mysql_query);
        return $query;
    }

}