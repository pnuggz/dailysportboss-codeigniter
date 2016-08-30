<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 26/07/2016
 * Time: 6:01 PM
 */

?>

<div id="section-one">
    <div class="section-one-content">
        <div class="one-heading-one">
            <img class="img-logo" src="<?php echo base_url(); ?>img/largelogo.png">
        </div>
        <div class="one-heading-three">
            <div class="loginBox">
                <div class="loginHeading">LOGIN</div>
                <div class="loginError">
                <?php echo $this->session->flashdata('login_failed'); ?>
                <?php echo $this->session->flashdata('noaccess'); ?>
                </div>
                <?php
                echo validation_errors("<p style='color: red;'>", "</p>");
                ?>
                <?php
                echo form_open('users/loginsubmit');
                ?>
                <?php
                $data = array('name'    =>      'username',
                    'class'   =>      'usernameBox',
                    'placeholder'     =>      'Enter Username',
                    'value'       =>      set_value('username'),
                );
                echo form_input($data);
                ?>
                <?php
                $data = array('name'    =>      'password',
                    'class'   =>      'passwordBox',
                    'placeholder'     =>      'Enter Password',
                    'value'       =>      set_value('password'),
                );
                echo form_password($data);
                ?>
                <br>
                <br>
                <br>
                <br>

                <?php
                $data = array('value'   =>      'SUBMIT',
                    'name'    =>      'submit',
                    'class'       =>      'login-btn',
                );
                echo form_submit($data);

                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>








