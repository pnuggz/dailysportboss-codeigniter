<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lobby extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $data['view_file'] = 'lobby';
        $this->load->module('template');
        $this->template->lobby($data);
    }
    
}