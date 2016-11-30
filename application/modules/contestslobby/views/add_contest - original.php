<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 4:45 PM
 */
?>

<h1>Add New Contest</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('contests/add/');
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

echo "Contest Name";
echo "<br>";
$data = array(  'name'          =>      'contest_name',
    'value'         =>      set_value('contest_name'),
);
echo form_input($data);
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

echo "Entry Size";
echo "<br>";
$data = array(  'name'          =>      'entry_max',
    'value'         =>      set_value('entry_max'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Game";
echo "<br>";
?>
    <select name="game">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Game 2";
echo "<br>";
?>
    <select name="game2">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Game 3";
echo "<br>";
?>
    <select name="game3">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Game 4";
echo "<br>";
?>
    <select name="game4">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Game 5";
echo "<br>";
?>
    <select name="game5">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

echo "Game 6";
echo "<br>";
?>
    <select name="game6">
        <option value="" disabled selected>Select Game</option>
        <?php
        foreach($events_lists->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $sports_events_start_date = $row->sports_events_start_date;
            $sports_events_start_time = $row->sports_events_start_time;
            $home_team_shorthand = $row->home_team_shorthand;
            $away_team_shorthand = $row->away_team_shorthand;
            ?>
            <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
        <?php } ?>
    </select>
<?php
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add Contest',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
