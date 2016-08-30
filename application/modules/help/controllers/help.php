<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['view_file'] = 'help';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function howtoplay() {
        $data['view_file'] = 'howtoplay';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function rules() {
        $data['view_file'] = 'rules';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function support() {
        $data['view_file'] = 'support';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function videotest() {
        $data['view_file'] = 'videotest';
        $this->load->module('template');
        $this->template->none($data);
    }

    function get_words() {
        $this->load->model('mdl_help');
        $data = $this->mdl_help->get_words();
        foreach ($data->result() as $row) {
            $array[] = array(
                'word_id' => $row->id,
                'word'  =>  $row->word
            );
        }
        echo json_encode($array);
    }

}
