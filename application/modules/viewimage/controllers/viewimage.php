<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewimage extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    function logo($type,$device,$id)
    {
      $this->load->model('mdlviewimage');
      $this->mdlviewimage->get_logo($type,$device,$id);
    }

    function banner($type,$device,$id)
    {
      $this->load->model('mdlviewimage');
      $this->mdlviewimage->get_banner($type,$device,$id);
    }

    function player($id)
    {
      $this->load->model('mdlviewimage');
      $this->mdlviewimage->get_player_photo($id);
    }

}
