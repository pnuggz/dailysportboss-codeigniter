<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:04 PM
 */
?>
    <h1>Add Sport</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('sports/add/');

echo "Sport Name:";
echo "<br>";
$data = array(  'name'          =>      'sport_name',
    'value'         =>      set_value('sport_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add Sport',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>