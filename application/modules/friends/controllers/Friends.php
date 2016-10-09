<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends MX_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('login/');
        }
    }

    function index() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');
            redirect('login/');
        }

        $data['view_file'] = 'friends_leagues_home';
        $this->load->module('template');
        $this->template->friendslayout($data);
    }

    function details() {
        $data['view_file'] = 'details';
        $this->load->module('template');
        $this->template->friendslayout($data);
    }

    // This function call from AJAX
    function submit_invite() {
        $friends_leagues_id = $this->uri->segment(3);

        $data = array(
            'friends_leagues_id'      =>      $friends_leagues_id,
            'sender_user_id'          =>      $this->input->post('sender_id'),
            'recipient_user_id'       =>      $this->input->post('recipient_id')
        );

        $this->load->model('mdl_friends');
        $this->mdl_friends->submit_invite($data);

        echo json_encode($data);
    }


    function get_friends_leagues_list($user_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_leagues_list($user_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'friends_league_id'     =>      $row->friends_leagues_id,
                'league_name'           =>      $row->friends_league_name,
                'owner_username'        =>      $row->owner_username,
                'season_number'         =>      $row->last_season_number
            );
        }
        echo json_encode($array);
    }

    function get_friends_requests_count($user_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_requests_count($user_id);

        if (empty($data)) {
            $array[] = array(
                'count'             =>      0,
            );
        } else {
            foreach ($data->result() as $row) {
                $array[] = array(
                    'count' => $row->count_requests,
                );
            }
        }
        echo json_encode($array);
    }

    function get_friends_request($user_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_request($user_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'friends_league_id'     =>      $row->friends_leagues_id,
                'friends_league_name'   =>      $row->friends_league_name,
                'sender_id'             =>      $row->sender_user_id,
                'sender_username'       =>      $row->sender_username,
                'recipient_id'          =>      $row->recipient_user_id,
                'recipient_username'    =>      $row->recipient_username,
                'date_sent'             =>      $row->date_sent
            );
        }
        echo json_encode($array);
    }

    function accept_invitation() {
        $flid = $this->input->post('flid');
        $sid = $this->input->post('sid');
        $rid = $this->input->post('rid');
        
        $data = array(
            'friends_leagues_id'            =>      $this->input->post('flid'),
            'users_id'                      =>      $this->input->post('rid')
        );
        
        $this->load->model('mdl_friends');
        $this->mdl_friends->accept_invitation($data);
        $this->mdl_friends->delete_request($flid, $sid, $rid);

        echo json_encode($data);
    }

    function delete_invitation() {
        $flid = $this->input->post('flid');
        $sid = $this->input->post('sid');
        $rid = $this->input->post('rid');

        $this->load->model('mdl_friends');
        $this->mdl_friends->delete_request($flid, $sid, $rid);
    }

    function get_sent_friends_request($friends_leagues_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_sent_friends_request($friends_leagues_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'sender_id'             =>      $row->sender_user_id,
                'sender_username'       =>      $row->sender_username,
                'friends_league_id'     =>      $row->id,
                'friends_league_name'   =>      $row->friends_league_name,
                'recipient_id'          =>      $row->recipient_user_id,
                'recipient_username'    =>      $row->recipient_username,
                'date_sent'             =>      $row->date_sent
            );
        }
        echo json_encode($array);
    }

    function get_friends_league($friends_leagues_id) {
        $friends_leagues_id = $this->uri->segment(3);

        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_league($friends_leagues_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'friends_league_id'     =>      $row->id,
                'league_name'           =>      $row->friends_league_name,
                'owner_username'        =>      $row->owner_username,
                'season_number'         =>      $row->season_number
            );
        }
        echo json_encode($array);
    }
    
    function get_friends_leagues_table($friends_leagues_id, $season_number) {
        $friends_leagues_id = $this->uri->segment(3);
        $season_number = $this->uri->segment(4);

        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_leagues_table($friends_leagues_id, $season_number);
        foreach ($data->result() as $row) {
            $array[] = array(
                'user_id'       =>      $row->user_id,
                'username'      =>      $row->username,
                'games_played'  =>      $row->contests_played,
                'avg_fp'        =>      $row->avg_total_team_fp
            );
        }
        echo json_encode($array);
    }

    function get_friends_leagues_table_past($friends_leagues_id, $season_number) {
        $friends_leagues_id = $this->uri->segment(3);
        $season_number = $this->uri->segment(4);

        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_friends_leagues_table_past($friends_leagues_id, $season_number);
        foreach ($data->result() as $row) {
            $array[] = array(
                'user_id'       =>      $row->id,
                'username'      =>      $row->username,
                'games_played'  =>      $row->games_played,
                'avg_fp'        =>      $row->final_fp
            );
        }
        echo json_encode($array);
    }

    function invitation_check() {
        $col = 'username';
        $value = $this->uri->segment(3);
        $friends_leagues_id = $this->uri->segment(4);
        $user_id = $this->session->userdata('user_id');
        $recipient_id = 0;

        $this->load->module('users');
        $data = $this->users->get_where_custom($col, $value);
        foreach ($data->result() as $row) {
            $recipient_id = $row->id;

        }

        if ($recipient_id > 0) {
            $this->load->model('mdl_friends');
            $data1 = $this->mdl_friends->send_request_checker($user_id, $recipient_id);
            $data2 = $this->mdl_friends->already_in_league_checker($friends_leagues_id, $recipient_id);

            if ($data1->num_rows() > 0) {
                $array[] = array(
                    'recipient_id' => $recipient_id,
                    'checker' => 4
                );
            } else if ($data1->num_rows() > 0 && $data2->num_rows() == 0) {
                $array[] = array(
                    'recipient_id' => $recipient_id,
                    'checker' => 1
                );
            } else if ($data1->num_rows() >= 0 && $data2->num_rows() > 0) {
                $array[] = array(
                    'recipient_id' => $recipient_id,
                    'checker' => 3
                );
            } else if ($data1->num_rows() == 0 && $data2->num_rows() == 0) {
                $array[] = array(
                    'recipient_id' => $recipient_id,
                    'checker' => 0
                );
            }
        } else {
            $array[] = array(
                'recipient_id'  =>  $recipient_id,
                'checker' => 2
            );
        }
        echo json_encode($array);
    }

    function get_current_users($friends_leagues_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_current_users($friends_leagues_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'username'  =>  $row->username
            );
        }
        echo json_encode($array);
    }

    function get_upcoming_friends_leagues_contests($friends_leagues_id) {
        $this->load->model('mdl_friends');
        $data = $this->mdl_friends->get_upcoming_friends_leagues_contests($friends_leagues_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'contest_id'  =>  $row->id,
                'contest_name'  =>  $row->contest_name,
                'start_date'    =>  $row->start_date,
                'end_date'      =>  $row->end_date
            );
        }
        echo json_encode($array);
    }

    function save_season_history($friends_leagues_id) {
        $ranking_table = json_decode($_POST['history_table'], true);

        $this->load->model('mdl_friends');
        
        $data = $this->mdl_friends->get_friends_leagues($friends_leagues_id);
        foreach ($data->result() as $row) {
            $start_date = $row->last_update;
            $current_season_number = $row->season_number;
        }

        $update_season_number = $current_season_number + 1;

        foreach($ranking_table as $i => $row) {
            $array = array(
                'friends_leagues_id'        =>      $ranking_table[$i][4],
                'season_number'             =>      $ranking_table[$i][5],
                'user_id'                   =>      $ranking_table[$i][6],
                'games_played'              =>      $ranking_table[$i][2],
                'final_fp'                  =>      $ranking_table[$i][3],
                'start_date'                =>      $start_date
            );

            $this->mdl_friends->_insert_history($array, $friends_leagues_id, $update_season_number);
        }
    }
}