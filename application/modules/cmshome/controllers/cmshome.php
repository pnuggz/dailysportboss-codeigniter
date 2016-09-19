<?php

define('__ROOT__', dirname(dirname(__FILE__)));
defined('BASEPATH') OR exit('No direct script access allowed');
define('DS', DIRECTORY_SEPARATOR);
require_once("secure_area.php");
class Cmshome extends Secure_area {

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

    function tes(){
      $this->load->library('jwt');
      $tokenId    = base64_encode(mcrypt_create_iv(32));
      $issuedAt   = time();
      $notBefore  = $issuedAt + 10;             //Adding 10 seconds
      $expire     = $notBefore + 60;            // Adding 60 seconds
      $serverName = 'tes'; // Retrieve the server name from config file

      /*
       * Create the token as an array
       */
      $data = [
          'iat'  => $issuedAt,         // Issued at: time when the token was generated
          'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
          'iss'  => $serverName,       // Issuer
          'nbf'  => $notBefore,        // Not before
          'exp'  => $expire,           // Expire
          'data' => [                  // Data related to the signer user
              'userId'   => 1, // userid from the users table
              'userName' => 'aw', // User name
          ]
      ];
      $key = base64_encode(openssl_random_pseudo_bytes(64));
      $jwt = $this->jwt->encode($data, $key,'HS256');
      $jwtdec = $this->jwt->decode($jwt, $key);
      $this->session->set_userdata('token',$jwt);
      echo json_encode($this->session->userdata('token'));
    }

}
