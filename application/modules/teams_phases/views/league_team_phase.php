<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 20/04/2016
 * Time: 3:43 AM
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

<h1>Teams Phases</h1>
<br>

<h3>Active Teams</h3>
<?php if($active_teams) : ?>
<?php foreach($active_teams->result() as $row) {
$league_id = $row->leagues_id;
?>
<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>teams_phases/add/<?php echo $league_id; } ?>/">Set New Team Phase</a></div>
<br>
<table id="datatables" class="display">
    <thead>
        <tr>
            <th width="250px" align="left">Team Name</th>
            <th width="150px" align="left">Sport Type</th>
            <th width="100px" align="left">League</th>
            <th width="250px" align="left">Home Stadium</th>
            <th width="120px">Start Date</th>
            <th width="120px">End Date</th>
            <th>Edit</th>
            <th>Mark Inactive</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($active_teams->result() as $row) {
        $teams_phases_id = $row->teams_phases_id;
        $team_name = $row->team_name;
        $sport_name = $row->sport_name;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $end_date = $row->end_date;
        $stadium_name = $row->stadium_name;
        $stadium_city = $row->stadium_city;
        $stadium_country = $row->stadium_country;
        ?>
        <tr>
            <td><?php echo $team_name; ?></td>
            <td><?php echo $sport_name; ?></td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $stadium_name; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $end_date; ?></td>
            <td><a href="<?php echo base_url(); ?>teams_phases/edit/<?php echo $teams_phases_id; ?>/">Edit</a></td>
            <td><a href="<?php echo base_url(); ?>teams_phases/make_inactive/<?php echo $teams_phases_id; ?>/">Make Inactive</a></td>
        </tr>
    <?php } else : ?>
    </tbody>
    <p>There are no active teams</p>
<?php endif; ?>
</table>
<br>
<br>
<br>
<br>
<br>

<h3>Inactive Teams</h3>
<?php if($inactive_teams) : ?>
<br>
<table id="datatables2" class="display">
    <thead>
        <tr>
            <th width="250px" align="left">Team Name</th>
            <th width="150px" align="left">Sport Type</th>
            <th width="100px" align="left">League</th>
            <th width="250px" align="left">Home Stadium</th>
            <th width="120px">Start Date</th>
            <th width="120px">End Date</th>
            <th>Edit</th>
            <th>Mark Inactive</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($inactive_teams->result() as $row) {
        $teams_phases_id = $row->teams_phases_id;
        $team_name = $row->team_name;
        $sport_name = $row->sport_name;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $end_date = $row->end_date;
        $stadium_name = $row->stadium_name;
        $stadium_city = $row->stadium_city;
        $stadium_country = $row->stadium_country;
    ?>
    <tr>
        <td><?php echo $team_name; ?></td>
        <td><?php echo $sport_name; ?></td>
        <td><?php echo $league_shorthand; ?></td>
        <td><?php echo $stadium_name; ?></td>
        <td><?php echo $start_date; ?></td>
        <td><?php echo $end_date; ?></td>
        <td><a href="<?php echo base_url(); ?>teams_phases/edit/<?php echo $teams_phases_id; ?>/">Edit</a></td>
        <td><a href="<?php echo base_url(); ?>teams_phases/make_active/<?php echo $teams_phases_id; ?>/">Make Active</a></td>
    </tr>
    <?php } else : ?>
    </tbody>
    
    <p>There are no inactive teams</p>
<?php endif; ?>
<br>
</table>




