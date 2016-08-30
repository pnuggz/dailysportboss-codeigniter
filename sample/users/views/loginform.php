<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php if($this->session->userdata('logged_in')) : ?>
<h3>Welcome, <?php echo $this->session->userdata('username'); ?></h3>
<br><br><br><br><br>
<?php echo form_open('users/logout');

$data = array('value'   =>      'Logout',
              'name'    =>      'submit',
              'class'   =>      'submit-btn',
             );

echo form_submit($data);
echo form_close();
?>

<?php else : ?>

<h2>Login</h2>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<p>Please fill in your details and hit Submit</p>

<?php
echo form_open('users/loginsubmit');

echo "Username ";
echo "<br>";
$data = array('name'    =>      'username',
              'placeholder'     =>      'Enter Username',
              'style'       =>      'width:90%',
              'value'       =>      set_value('username'),
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Password ";
echo "<br>";
$data = array('name'    =>      'password',
              'placeholder'     =>      'Enter Password',
              'style'       =>      'width:90%',
              'value'       =>      set_value('password'),
              );
echo form_password($data);
echo "<br>";
echo "<br>";

$data = array('value'   =>      'Login',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>

<?php endif; ?>