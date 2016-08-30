<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contests_entry extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->module('sports');
        $data['sports'] = $this->sports->get('sport_name');

        $this->load->module('leagues');
        $data['sports_leagues'] = $this->leagues->get_sport_league_name('league_name');

        $data['view_file'] = "manage";
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function league($league_id)
    {
        $this->load->model('mdl_contests_entry');
        $data['active_contests'] = $this->mdl_contests_entry->get_contest_status($league_id, TRUE);
        $data['inactive_contests'] = $this->mdl_contests_entry->get_contest_status($league_id, FALSE);

        $data['view_file'] = 'league_sport_event';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function details($contest_id)
    {
        $this->load->module('contests_users_entries');
        $data['users_details'] = $this->contests_users_entries->get_users_list($contest_id);

        $data['contest_id'] = $contest_id;

        $data['view_file'] = 'details';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function add()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('roster_name', 'Roster Name', 'required|trim|xss_clean');

        $contest_id = $this->uri->segment(3);

        $this->load->module('contests');
        $data['contest_details'] = $this->contests->get_where_custom('id', $contest_id);

        $this->load->module('users');
        $data['users_id'] = $this->users->get('username');

        if ($this->form_validation->run() == FALSE) {

            $data['view_file'] = 'add_contest_entry';
            $this->load->module('template');
            $this->template->cmslayout($data);

        } else {
            $user_id = $this->input->post('user_id');
            $contest_id = $this->input->post('contest_id');
            $this->load->module('contests_users_entries');
            $user_id_count =  $this->contests_users_entries->get_user_entry_count($user_id, $contest_id);
            foreach ($user_id_count->result() as $row) {
                $user_id_count = $row->user_entry_count;
                $user_id_count_entry = $user_id_count + 1;
            }

            $this->load->module('contests');
            $data['contest_details'] = $this->contests->get_where_custom('id', $contest_id);

            $user_contest_data = array(
                'contest_id'            =>      $this->input->post('contest_id'),
                'user_id'               =>      $this->input->post('user_id'),
                'user_entry_count'      =>      $user_id_count_entry
            );

            $roster_name = array(
                'roster_name'       =>      $this->input->post('roster_name')
            );

            $forwards_post = $this->input->post('forwards');
            $midfielders_post = $this->input->post('midfielders');
            $defenders_post = $this->input->post('defenders');

            $forwards = array(
                'player1'       =>      $forwards_post[0],
                'player2'       =>      $forwards_post[1]
            );

            $midfielders = array(
                'player3'       =>      $midfielders_post[0],
                'player4'       =>      $midfielders_post[1],
                'player5'       =>      $midfielders_post[2],
                'player6'       =>      $midfielders_post[3]
            );

            $defenders = array(
                'player7'       =>      $defenders_post[0],
                'player8'       =>      $defenders_post[1],
                'player9'       =>      $defenders_post[2],
                'player10'       =>      $defenders_post[3]
            );

            $contest_roster_data = array_merge($roster_name, $forwards, $midfielders, $defenders);

            if ($this->_transactions_new_contest_entry($contest_roster_data, $user_contest_data)) {
                $this->session->set_flashdata('team_phase_created', 'The team phase has been set');
            }
            redirect('/contests_entry/');
        }

    }

    function roster() {
        $contest_id = $this->uri->segment(3);
        $data['db_selected_players'] = $this->get_db_selected_players($contest_id);

        $data['view_file'] = 'roster';
        $this->load->module('template');
        $this->template->cmslayout($data);
    }

    function get_players_forward()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'forward');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function get_players_midfielder()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'midfielder');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function get_players_defender()
    {
        $contest_id = $this->uri->segment(3);

        $this->load->module('players_phases');
        $data = $this->players_phases->get_players_list_contest($contest_id, 'defender');
        foreach ($data->result() as $row){
            $array[] = array(
                'players_phases_id'   =>      $row->id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
            );
        }
        echo json_encode( $array );
    }

    function _transactions_new_contest_entry($contest_roster_data, $user_contest_data) {
        $this->load->model('mdl_contests_entry');
        $this->mdl_contests_entry->_transactions_new_contest_entry($contest_roster_data, $user_contest_data);
    }

    function get_db_selected_players($contest_id) {
        $this->load->model('mdl_contests_entry');
        $query = $this->mdl_contests_entry->get_db_selected_players($contest_id);
        return $query;
    }

    function get_events() {
        $contest_id = $this->uri->segment(3);

        $this->load->module('contests');
        $data = $this->contests->get_events($contest_id);
        foreach ($data->result() as $row) {
            $array[] = array(
                'team_id_home'          =>      $row->team_id_home,
                'team_name_home'        =>      $row->team_name_home,
                'team_id_away'          =>      $row->team_id_away,
                'team_name_away'        =>      $row->team_name_away,
                'start_date'            =>      $row->start_date,
                'start_time'            =>      $row->start_time,
                'home_ground'           =>      $row->home_ground
            );
        }
        echo json_encode($array);
    }

    function get_players()
    {
        $contest_id = 1;

        $this->load->module('players_phases');
        $data = $this->players_phases->get_all_players_list_contest($contest_id);
        foreach ($data->result() as $row){
            $array[] = array(
                'player_phase_id'   =>      $row->players_phases_id,
                'first_name'   =>      $row->first_name,
                'last_name'      =>      $row->last_name,
                'team_phase_id'       =>      $row->players_phases_teams_phases_id,
                'team_name'     =>      $row->team_name,
                'team_shorthand'        =>      $row->team_shorthand,
                'pos'      =>      $row->position
            );
        }
        echo json_encode( $array );
    }

    function get_fake_data() {
        sleep(2);

        $fakeDatabase = array(
            array(
                'postTitle'     =>      '1st Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '2nd Post',
                'postContent'   =>      'The content for the second post'
            ),
            array(
                'postTitle'     =>      '3rd Post',
                'postContent'   =>      'The content for the third post'
            ),
            array(
                'postTitle'     =>      '4th Post',
                'postContent'   =>      'The content for the fourth post'
            ),
            array(
                'postTitle'     =>      '5th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '6th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '7th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '8th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '9th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '10th Post',
                'postContent'   =>      'The content for the first post'
            ),
            array(
                'postTitle'     =>      '11th Post',
                'postContent'   =>      'The content for the first post'
            )
        );

        if(isset($_GET['page']) && isset($_GET['items_per_page']) && $_GET['page'] > 0 && $_GET['items_per_page'] > 0) {
            $offset = (($_GET['page'] - 1) * $_GET['items_per_page']);
            $length = ($_GET['items_per_page']);

            $posts = array_slice($fakeDatabase, $offset, $length);
            $result = array('total_posts' => count($fakeDatabase), 'posts' => $posts);
            $result = json_encode($result);

            echo $result;
        }
    }
}