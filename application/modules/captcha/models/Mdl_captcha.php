<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_captcha extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function verificationAds($data)
    {
      $this->db->insert('verificationads', $data);
      $userid = $this->db->insert_id();
      return $userid;
    }
}
