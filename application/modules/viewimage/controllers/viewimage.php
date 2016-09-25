<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewimage extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    function logo($type,$id)
    {
      $this->load->model('mdlviewimage');
      $this->mdlviewimage->get_logo($type,$id);
    }

    function banner($type,$id)
    {
      $this->load->model('mdlviewimage');
      $this->mdlviewimage->get_banner($type,$id);
    }

}
