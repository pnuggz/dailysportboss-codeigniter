<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:32 AM
 */
?>
<?php
foreach($sport_event->result() as $row) {
    $id = $row->id;
    $start_date = $row->start_date;
    $start_time = $row->start_time;
    $weather_id = $row->weather_id;
    $soccer_live_id = $row->soccer_live_id;
    ?>

    <h1>Edit Sport Event</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('sports_events/edit/' . $id . '/');

echo "<br>";
echo "<br>";

echo "League Name";
echo "<br>";
foreach ($league_selected->result() as $row) {
    $league_id = $row->league_id;
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
foreach ($home_team_phase_selected->result() as $row) {
    $home_team_phase_id = $row->home_team_phase_id;
    $home_team_name = $row->home_team_name;

    echo $home_team_name;

    $data = array('home_team_phase_id' => $home_team_phase_id
    );
    echo form_hidden($data);
}
echo "<br>";
echo "<br>";

echo "Away Team";
echo "<br>";
foreach ($away_team_phase_selected->result() as $row) {
    $away_team_phase_id = $row->away_team_phase_id;
    $away_team_name = $row->away_team_name;

    echo $away_team_name;

    $data = array('away_team_phase_id' => $away_team_phase_id
    );
    echo form_hidden($data);
}
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input value="<?php echo $start_date; ?>" type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "Start Time";
echo "<br>";
?> <input value="<?php echo $start_time; ?>" type="time" name="start_time"> <?php
echo "<br>";
echo "<br>";

$data = array('weather_id' => $weather_id
);
echo form_hidden($data);

$data = array('soccer_live_id' => $soccer_live_id
);
echo form_hidden($data);

$data = array(  'value'         =>      'Add Sport Event',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>

<?php } ?>