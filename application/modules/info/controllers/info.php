<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['view_file'] = 'info';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function termsofuse() {
        $data['view_file'] = 'termsofuse';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }

    function privacy() {
        $data['view_file'] = 'privacy';
        $this->load->module('template');
        $this->template->pagelayout($data);
    }
    

}
