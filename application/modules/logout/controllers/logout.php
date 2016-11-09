<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
         $this->session->unset_userdata('logged_in');
         $this->session->unset_userdata('userid');
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('token');
         $this->session->sess_destroy();
         $this->output->set_output(json_encode(array('success'=>array('message'=>'Success log out'))), 200);
     }

}
