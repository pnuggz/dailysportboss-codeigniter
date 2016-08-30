<h1>Add a List</h1>
<p>Please fill out the form below to create a new task list</p>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('lists/add/');

echo "List Name:";
echo "<br>";

$data = array('name'    =>      'list_name',
              'value'       =>      set_value('list_name'),
              'style'   =>      'width:500px'
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "List Body:";
echo "<br>";

$data = array('name'    =>      'list_body',
              'value'       =>      set_value('list_body'),
              'style'   =>      'width:100%'
              );
echo form_textarea($data);
echo "<br>";
echo "<br>";

$data = array('value'       =>      'Add List',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>