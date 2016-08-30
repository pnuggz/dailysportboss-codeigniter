<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:22 PM
 */
?>

<?php
foreach($team->result() as $row) {
    $id = $row->id;
    $team_name = $row->team_name;
    $team_nickname = $row->team_nickname;
    $team_shorthand = $row->team_shorthand;
    ?>

<h1>Edit Team - <?php echo $team_name; } ?></h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('teams/edit/'.$id.'/');

echo "Team Name:";
echo "<br>";
$data = array(  'name'          =>      'team_name',
                'value'         =>      $team_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Team Nickname:";
echo "<br>";
$data = array(  'name'          =>      'team_nickname',
                'value'         =>      $team_nickname,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Team Shorthand:";
echo "<br>";
$data = array(  'name'          =>      'team_shorthand',
                'value'         =>      $team_shorthand,
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Edit Team',
                'name'          =>      'submit',
                'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
