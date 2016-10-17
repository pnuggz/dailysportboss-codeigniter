<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['view_file'] = 'home';
        $this->load->module('template');
        $this->template->homelayout($data);
    }

    function subscribe()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('country', 'Country', 'required|xss_clean');
      if($this->form_validation->run() == FALSE)
      {
          redirect('/');
      }else{
        $this->load->model('mdl_home');
        $check = $this->mdl_home->checksubscribe($this->input->post('email'));
        if($check == 0)
        {
          $data = array(
            'email'      => $this->input->post('email'),
            'country'    => $this->input->post('country'),
            'submitdate' => date('Y-m-d H:i:s'),
            'statusid'   => 1,
          );
          $this->mdl_home->subscribe($data);
          echo json_encode(0);
        }else{
          echo json_encode(1);
        }
      }
    }

    function get($order_by) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_home');
        $this->mdl_home->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_home');
        $this->mdl_home->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_home');
        $this->mdl_home->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_home');
        $count = $this->mdl_home->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_home');
        $max_id = $this->mdl_home->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_home');
        $query = $this->mdl_home->_custom_query($mysql_query);
        return $query;
    }

}
