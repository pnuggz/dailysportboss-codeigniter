<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

    }

    function ads($id)
    {
      $this->load->model('mdlviewvideo');
      $this->mdlviewvideo->get_video_ads($id);
    }

}
