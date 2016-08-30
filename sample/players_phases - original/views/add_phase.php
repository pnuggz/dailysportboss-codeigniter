<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 22/04/2016
 * Time: 12:31 AM
 */
?>

<h1>Set New Player Phase</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('players_phases/add/');
?>

<?php
echo "<br>";
echo "<br>";

echo "Player";
echo "<br>";
?>
    <select name="players_id">
        <option value="" disabled selected>Select Player</option>
        <?php
        foreach($players_list->result() as $row) {
            $player_id = $row->id;
            $last_name = $row->last_name;
            $first_name = $row->first_name;
            ?>
            ?><option value="<?php echo $player_id; ?>"><?php echo $last_name; ?>, <?php echo $first_name; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "League Name";
echo "<br>";
foreach ($leagues_list->result() as $row) {
    $league_id = $row->id;
    $league_name = $row->league_name;

    echo $league_name;

    $data = array('leagues_id' => $league_id
    );
    echo form_hidden($data);
}

echo "<br>";
echo "<br>";

echo "Team";
echo "<br>";
?>
    <select name="teams_id">
        <option value="" disabled selected>Select Team</option>
        <?php
        foreach($teams_list->result() as $row) {
            $team_id = $row->id;
            $team_name = $row->team_name;
            ?>
            <option value="<?php echo $team_id; ?>"><?php echo $team_name; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Height";
echo "<br>";
$data = array(  'name'          =>      'height',
    'value'         =>      set_value('height'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Weight";
echo "<br>";
$data = array(  'name'          =>      'weight',
    'value'         =>      set_value('weight'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Position";
echo "<br>";
$data = array(  'name'          =>      'position',
    'value'         =>      set_value('position'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Number";
echo "<br>";
$data = array(  'name'          =>      'number',
    'value'         =>      set_value('number'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Depth Chart";
echo "<br>";
$data = array(  'name'          =>      'depth_chart',
    'value'         =>      set_value('depth_chart'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "End Date";
echo "<br>";
?> <input type="date" name="end_date"> <?php
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Set Player Phase',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>