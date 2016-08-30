<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmshome extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {     
        //if($this->session->userdata('logged_in')) {
        //    $user_id = $this->session->userdata('user_id');
        //    $create_date = 'create_date';
            
        //    $this->load->module('lists');
        //    $data['lists'] = $this->lists->get_where_custom_ordered('list_user_id', $user_id, $create_date);
        //}
                
        $data['view_file'] = "cmshome";
        $this->load->module('template');
        $this->template->cmslayout($data);
    }
    
}