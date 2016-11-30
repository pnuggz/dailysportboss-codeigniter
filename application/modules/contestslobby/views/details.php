<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 2:43 PM
 */
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>


<?php foreach ($contest_details->result() as $row) {
    $contest_id = $row->contests_id;
    $league_id = $row->leagues_id;
    $league_name = $row->league_name;
    $contest_name = $row->contest_name;
    $start_date = $row->start_date;
    $start_time = $row->start_time;
    $entry_max = $row->entry_max;
    $contest_status = $row->contest_status;
    $guarantee_type = $row->guarantee_type_id;
    $multi_type = $row->multi_type_id;
    $sponsors_info = $row->sponsors_id;
?>

<ul class="list-actions">
    <h4>my To Do List</h4>
    <li><a href="<?php echo base_url(); ?>contests/add/<?php echo $league_id; ?>/">Add Task</a></li>
    <li><a href="<?php echo base_url(); ?>contests/edit/<?php echo $contest_id; ?>/">Edit List</a></li>
    <li><a href="<?php echo base_url(); ?>contests/make_inactive/<?php echo $contest_id; ?>/">Make Inactive</a></li>
</ul>


    <h1><?php echo $contest_name; ?> - <?php echo $league_name; ?></h1>
<p><strong>Contest Status: </strong><?php if($contest_status == '0') { echo 'Running'; } else { echo 'Finished'; }; ?></p>

<p><strong>Contest Starting Date & Time: </strong><?php echo $start_date; ?>  -  <?php echo $start_time; ?></p>

<p><strong>Entry Max: </strong><?php echo $entry_max; ?></p>

<p><strong>Current Prize Pool</strong></p>

<p><strong>Guarantee Type: </strong><?php echo $guarantee_type; ?></p>

<p><strong>Multi Type: </strong><?php echo $multi_type; ?></p>

<p><strong>Sponsors Info: </strong><?php echo $sponsors_info; ?></p>
<br>
<br>
<h2>List of Games in This Contest</h2>
    <table id="datatables" class="display">
        <thead>
            <tr>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Venue</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        <?php
        foreach($games_list_home->result() as $row) {
            $sports_events_id = $row->sports_events_id;
            $home_contests_has_sports_events_sports_events_id = $row->contests_has_sports_events_sports_events_id_home;
            $home_team = $row->home_team_name;
            $stadium_name = $row->stadium_name;
            $start_date = $row->start_date;
            $start_time = $row->start_time;
            $event_status = $row->event_status;
            ?>
            <tr>    <?php if($home_contests_has_sports_events_sports_events_id == $sports_events_id) { ?>
                <td><?php echo $home_team; ?></td>
                    <?php } ?>
                    <?php foreach($games_list_away->result() as $row) {
                    $away_contests_has_sports_events_sports_events_id = $row->contests_has_sports_events_sports_events_id_away;
                    $away_team = $row->away_team_name;
                        if($away_contests_has_sports_events_sports_events_id == $sports_events_id) { ?>
                <td><?php echo $away_team; ?></td>
                    <?php } } ?>
                <td><?php echo $stadium_name; ?></td>
                <td><?php echo $start_date; ?></td>
                <td><?php echo $start_time; ?></td>
                <td><?php if($event_status == '0') { echo 'Running'; } else { echo 'Finished'; }; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <br>
    </table>

<?php } ?>
