<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MX_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function dsb() {
        $data['view_file'] = 'dsb';
        $this->load->module('template');
        $this->template->aboutlayout($data);
    }

    function partnership() {
        $data['view_file'] = 'partnership';
        $this->load->module('template');
        $this->template->aboutlayout($data);
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
            $this->load->model('mdl_about');
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
            }
            $this->session->set_flashdata('subscribe_success', 'Thanks for Subscribing');
            redirect('/');
        }
    }


    function contactform() {
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));

        //set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {

        }
        else
        {
            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

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
            $this->email->message($name.'<br/>'.$from_email.'<br/><br/>'.$message);
            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                redirect('/about/partnership/');
            }
            else
            {
                //error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('/about/partnership/');
            }
        }

    }

}