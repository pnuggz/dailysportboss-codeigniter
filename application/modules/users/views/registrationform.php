<h1>Register</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<p>Please fill in your details and hit Submit to create an account</p>

<?php
echo form_open('users/registrationsubmit');

echo "First Name:";
echo "<br>";
$data = array('name'    =>      'first_name',
              'value'       =>      set_value('first_name'),
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Last Name:";
echo "<br>";
$data = array('name'    =>      'last_name',
              'value'       =>      set_value('last_name'),
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Email Address:";
echo "<br>";
$data = array('name'    =>      'email',
              'value'       =>      set_value('email'),
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Username:";
echo "<br>";
$data = array('name'    =>      'username',
              'value'       =>      set_value('username'),
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Password ";
echo "<br>";
$data = array('name'    =>      'password',
              'value'       =>      set_value('password'),
              );
echo form_password($data);
echo "<br>";
echo "<br>";

echo "Confirm Password ";
echo "<br>";
$data = array('name'    =>      'password2',
              'value'       =>      set_value('password2'),
              );
echo form_password($data);
echo "<br>";
echo "<br>";

$data = array('value'       =>      'Register',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>