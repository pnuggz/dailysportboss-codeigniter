<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends MX_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $config = array(
            'protocol'  =>   'smtp',
            'smtp_host'     =>      'mail.dailysportboss.com',
            'smtp_port'     =>      587,
            'smtp_user'     =>      'info@dailysportboss.com',
            'smtp_pass'     =>      'Jatipadang13',
            'mailtype'      =>      'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('info@dailysportboss.com', 'Daily Sport Boss');
        $this->email->to('ryan.n@dailysportboss.com');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');

//        if($this->email->send()) {
//            echo "Your email was sent, fool.";
//        } else {
//            show_error($this->email->print_debugger());
//        }

        $data['view_file'] = 'subscribe';
        $this->load->module('template');
        $this->template->subscribelayout($data);
    }
    
    function get($order_by) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->get($order_by);
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->get_with_limit($limit, $offset, $order_by);
        return $query;
    }
    
    function get_where($id) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->get_where($id);
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->get_where_custom($col, $value);
        return $query;
    }
    
    function get_where_custom_ordered($col, $value, $order_by) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->get_where_custom_ordered($col, $value, $order_by);
        return $query;
    }
    
    function _insert($data) {
        $this->load->model('mdl_subscribe');
        $this->mdl_subscribe->_insert($data);
    }
    
    function _update($id, $data) {
        $this->load->model('mdl_subscribe');
        $this->mdl_subscribe->_update($id, $data);
    }
    
    function _delete($id) {
        $this->load->model('mdl_subscribe');
        $this->mdl_subscribe->_delete($id);
    }
    
    function count_where($column, $value) {
        $this->load->model('mdl_subscribe');
        $count = $this->mdl_subscribe->count_where($column, $value);
        return $count;
    }
    
    function get_max() {
        $this->load->model('mdl_subscribe');
        $max_id = $this->mdl_subscribe->get_max();
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $this->load->model('mdl_subscribe');
        $query = $this->mdl_subscribe->_custom_query($mysql_query);
        return $query;
    }
    
}