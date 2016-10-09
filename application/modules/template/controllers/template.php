<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function cmslayout($data) {
        $this->load->view('cmslayout', $data);
    }

    function lobby($data) {
        $this->load->view('lobby', $data);
    }

    function lobbylayout($data) {
        $this->load->view('lobbylayout', $data);
    }

    function draftlayout($data) {
        $this->load->view('draftlayout', $data);
    }

    function gameslayout($data) {
        $this->load->view('gameslayout', $data);
    }

    function homelayout($data) {
        $this->load->view('homelayout', $data);
    }

    function loginlayout($data) {
        $this->load->view('loginlayout', $data);
    }

    function pagelayout($data) {
        $this->load->view('pagelayout', $data);
    }

    function none($data) {
        $this->load->view('none', $data);
    }

    function friendslayout($data) {
        $this->load->view('friendslayout', $data);
    }

    function subscribelayout($data) {
        $this->load->view('subscribelayout', $data);
    }
}