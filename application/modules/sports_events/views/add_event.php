<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:32 AM
 */
?>

    <h1>Add New Sport Event</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('sports_events/add/');
?>

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

echo "Home Team";
echo "<br>";
?>
    <select name="home_team_phase_id">
        <option value="" disabled selected>Select Team</option>
        <?php
        foreach($teams_list_home->result() as $row) {
            $team_phase_id = $row->teams_phases_id;
            $team_name = $row->team_name;
            ?>
            <option value="<?php echo $team_phase_id; ?>"><?php echo $team_name; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Away Team";
echo "<br>";
?>
    <select name="away_team_phase_id">
        <option value="" disabled selected>Select Team</option>
        <?php
        foreach($teams_list_home->result() as $row) {
            $team_phase_id = $row->teams_phases_id;
            $team_name = $row->team_name;
            ?>
            <option value="<?php echo $team_phase_id; ?>"><?php echo $team_name; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "Start Time";
echo "<br>";
?> <input type="time" name="start_time"> <?php
echo "<br>";
echo "<br>";

$data = array('weather_id' => '1'
);
echo form_hidden($data);

$data = array('soccer_live_id' => '1'
);
echo form_hidden($data);

$data = array(  'value'         =>      'Add Sport Event',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>