<html>
    <head>
        <title>myToDo Task Manager</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/home.css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body class="body">
        <div class="navbar">
            <div class="brand">
                <a href="<?php echo base_url() ?>">myToDo</a>
            </div>
            <div class="home-btn">
                <a href="<?php echo base_url() ?>">Home</a>
            </div>
            <?php if($this->session->userdata('logged_in')) : ?>
            <div class="list-btn">
                <a href="<?php echo base_url() ?>lists">myList</a>
            </div>
            <?php endif; ?>
            <div class="register-btn">
                <?php
                    if($this->session->userdata('logged_in')) : ?>
                       Welcome, <?php echo $this->session->userdata('username'); ?>
                    <?php else : ?>
                <a href="<?php echo base_url() ?>users/register">Register</a><?php endif; ?>
            </div>
        </div>
        <div class="top-gap"></div>
        <div class="container">
            <div class="sidebar">
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='users' && $second_bit==('register' or 'registrationsubmit')) {
                        ?><a href="http://localhost/mytodo/">Click here to login</a><?php
                    } else {
                    $this->load->module('users');
                    $this->load->view('users/loginform');
                    }
                ?>
            </div>
            <div class="main-content">
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='' && $second_bit==('')) {
                        $this->load->module('home');
                        $this->load->view('home/home');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='users' && $second_bit==('register' or 'registrationsubmit')) {
                        $this->load->module('users');
                        $this->load->view('users/registrationform');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='lists' && $second_bit==('')) {
                        $this->load->module('lists');
                        $this->load->view('lists/lists');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='lists' && $second_bit==('details')) {
                        $this->load->module('lists');
                        $this->load->view('lists/details');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='lists' && $second_bit==('add')) {
                        $this->load->module('lists');
                        $this->load->view('lists/add_list');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='lists' && $second_bit==('edit')) {
                        $this->load->module('lists');
                        $this->load->view('lists/edit_list');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='tasks' && $second_bit==('details')) {
                        $this->load->module('tasks');
                        $this->load->view('tasks/details');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='tasks' && $second_bit==('add')) {
                        $this->load->module('tasks');
                        $this->load->view('tasks/add_task');
                    } else {
                        
                    }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit=='tasks' && $second_bit==('edit')) {
                        $this->load->module('tasks');
                        $this->load->view('tasks/edit_task');
                    } else {
                        
                    }
                ?>

            </div>
        </div>
    </body>
</html>