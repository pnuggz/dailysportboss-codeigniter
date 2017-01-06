<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_captcha extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insertrandomword($randomword,$userid)
    {
      $data = array(
        'randomword' => $randomword,
        'userid'     => $userid
      );
      $this->db->insert('randomword', $data);
      $userid = $this->db->insert_id();
      return $userid;
    }

    function verificationRandomWord($word,$userid)
    {
      $query_start = $this->db->query("
          SELECT *
          FROM randomword
          WHERE randomword = '".$word."' and userid=$userid
      ");
      return $query_start->num_rows();
    }

    function verificationAds($data)
    {
      $this->db->insert('verificationads', $data);
      $userid = $this->db->insert_id();
      return $userid;
    }
}
