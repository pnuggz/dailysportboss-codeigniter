<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:35 AM
 */
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables2').DataTable();
    } );
</script>


<h1>Sports Events</h1>

<br>

<h3>Active Events</h3>
<?php if($active_events) : ?>
<?php foreach($active_events->result() as $row) {
$league_id = $row->leagues_id;
$league_name = $row->league_name;
?>
    <h3><?php echo $league_name; ?></h3>

<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>sports_events/add/<?php echo $league_id; } ?>/">Create New Sport Event</a></div>
<br>
<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>League</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Weather ID</th>
            <th>Soccer Live ID</th>
            <th>Edit</th>
            <th>Make Inactive</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($active_events->result() as $row) {
        $sports_events_id = $row->sports_events_id;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $start_time = $row->start_time;
        $weather_id = $row->weather_id;
        $soccer_live_id = $row->soccer_live_id
        ?>
        <tr><?php foreach ($home_team->result() as $row) {
                $team_name_home = $row->team_name_home;
                $sports_events_id_home_loop = $row->sports_events_id_home_loop;
            if($sports_events_id_home_loop == $sports_events_id) {
            ?>
            <td><?php echo $team_name_home; } } ?></td>
            <?php foreach ($away_team->result() as $row) {
            $team_name_away = $row->team_name_away;
            $sports_events_id_away_loop = $row->sports_events_id_away_loop;
            if($sports_events_id_away_loop == $sports_events_id) {
            ?>
            <td><?php echo $team_name_away; } } ?></td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $weather_id; ?></td>
            <td><?php echo $soccer_live_id; ?></td>
            <td><a href="<?php echo base_url(); ?>sports_events/edit/<?php echo $sports_events_id; ?>/">Edit</a></td>
            <td><a href="<?php echo base_url(); ?>sports_events/make_inactive/<?php echo $sports_events_id; ?>/">Make Inactive</a></td>
        </tr>
    <?php } else : ?>
    </tbody>

        <p>There are no active events</p>
    <?php endif; ?>

</table>
<br>
<br>
<br>
<br>
<br>

<h3>Inactive Players</h3>
<?php if($inactive_events) : ?>
<br>
<table id="datatables2" class="display">
    <thead>
        <tr>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>League</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Weather ID</th>
            <th>Soccer Live ID</th>
            <th>Edit</th>
            <th>Make Active</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($inactive_events->result() as $row) {
        $sports_events_id = $row->sports_events_id;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $start_time = $row->start_time;
        $weather_id = $row->weather_id;
        $soccer_live_id = $row->soccer_live_id
        ?>
        <tr><?php foreach ($home_team->result() as $row) {
            $team_name_home = $row->team_name_home;
            $sports_events_id_home_loop = $row->sports_events_id_home_loop;
            if($sports_events_id_home_loop == $sports_events_id) {
            ?>
            <td><?php echo $team_name_home; } } ?></td>
            <?php foreach ($away_team->result() as $row) {
            $team_name_away = $row->team_name_away;
            $sports_events_id_away_loop = $row->sports_events_id_away_loop;
            if($sports_events_id_away_loop == $sports_events_id) {
            ?>
            <td><?php echo $team_name_away; } } ?></td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $weather_id; ?></td>
            <td><?php echo $soccer_live_id; ?></td>
            <td><a href="<?php echo base_url(); ?>sports_events/edit/<?php echo $sports_events_id; ?>/">Edit</a></td>
            <td><a href="<?php echo base_url(); ?>sports_events/make_active/<?php echo $sports_events_id; ?>/">Make Active</a></td>
        </tr>
    <?php } else : ?>
    </tbody>

        <p>There are no inactive events</p>
    <?php endif; ?>
    <br>
</table>

