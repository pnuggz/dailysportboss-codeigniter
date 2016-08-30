<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:04 PM
 */
?>
    <h1>Add Team</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('teams/add/');

echo "Team Name:";
echo "<br>";
$data = array(  'name'          =>      'team_name',
                'value'         =>      set_value('team_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Team Nickname:";
echo "<br>";
$data = array(  'name'          =>      'team_nickname',
                'value'         =>      set_value('team_nickname'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Team Shorthand:";
echo "<br>";
$data = array(  'name'          =>      'team_shorthand',
                'value'         =>      set_value('team_shorthand'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add Team',
                'name'          =>      'submit',
                'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>