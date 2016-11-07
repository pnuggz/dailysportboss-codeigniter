<?php

class Mail
{
    function __construct(){

    $this->ci =& get_instance();
    $this->ci->load->library('email');

    }

    function sendMail($from_email,$subject,$message) {
      $this->ci->email->from('admin@dailysportboss.com', 'Daily Sport Boss');
      $this->ci->email->to($from_email);

      $this->ci->email->subject($subject);
      $this->ci->email->message($message);

      $this->ci->email->send();

      
    }
}
