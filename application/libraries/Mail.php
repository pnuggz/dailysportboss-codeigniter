<?php

class Mail
{
    function sendMail($name,$from_email,$subject,$message) {
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'email'));

        //set to_email id to which you want to receive mails
        $to_email = 'partnership@dailysportboss.com';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.zoho.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'partnership@dailysportboss.com'; // email id
        $config['smtp_pass'] = 'Jatipadang13'; // email password
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $config['charset'] = 'iso-8859-1';
        $config['newline'] = "\r\n"; //use double quotes here
        $this->email->initialize($config);

        //send mail
        $this->email->from('partnership@dailysportboss.com');
        $this->email->reply_to($from_email, $name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send())
        {
            // mail sent
            return 1;
        }
        else
        {
            //error
            return 0;
        }

    }
}
