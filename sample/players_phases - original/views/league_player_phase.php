<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 21/04/2016
 * Time: 11:12 PM
 */
?>


<h1>Players Phases</h1>



<br>

<h3>Active Players</h3>
<?php if($active_players) : ?>
<?php foreach($active_players->result() as $row) {
$league_id = $row->leagues_id;
$league_name = $row->league_name;
?>
<h3><?php echo $league_name; ?></h3>
<br>
    <div class="teams-new"><a href="<?php echo base_url(); ?>players_phases/add/<?php echo $league_id; } ?>/">Set New Player Phase</a></div>
<br>
<table>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Team Name</th>
        <th>League Shorthand</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Position</th>
        <th>Number</th>
        <th>Depth Chart</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Edit</th>
        <th>Mark Inactive</th>
    </tr>
    <?php
    foreach($active_players->result() as $row) {
        $players_phases_id = $row->players_phases_id;
        $first_name = $row->first_name;
        $last_name = $row->last_name;
        $team_name = $row->team_name;
        $league_shorthand = $row->league_shorthand;
        $height = $row->height;
        $weight = $row->weight;
        $position = $row->position;
        $number = $row->number;
        $depth_chart = $row->depth_chart;
        $start_date = $row->start_date;
        $end_date = $row->end_date;
        ?>
        <tr>
            <td><?php echo $last_name; ?></td>
            <td><?php echo $first_name; ?></td>
            <td><?php echo $team_name; ?></td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $height; ?></td>
            <td><?php echo $weight; ?></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $number; ?></td>
            <td><?php echo $depth_chart; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $end_date; ?></td>
            <td><a href="<?php echo base_url(); ?>players_phases/edit/<?php echo $players_phases_id; ?>/">Edit</a></td>
            <td><a href="<?php echo base_url(); ?>players_phases/make_inactive/<?php echo $players_phases_id; ?>/">Make Inactive</a></td>
        </tr>
    <?php } else : ?>
        <p>There are no active players</p>
    <?php endif; ?>

</table>
<br>
<br>
<br>
<br>
<br>

<h3>Inactive Players</h3>
<?php if($inactive_players) : ?>
<br>
<table>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Team Name</th>
        <th>League Shorthand</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Position</th>
        <th>Number</th>
        <th>Depth Chart</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Edit</th>
        <th>Mark Inactive</th>
    </tr>
    <?php
    foreach($inactive_players->result() as $row) {
        $players_phases_id = $row->players_phases_id;
        $first_name = $row->first_name;
        $last_name = $row->last_name;
        $team_name = $row->team_name;
        $league_shorthand = $row->league_shorthand;
        $height = $row->height;
        $weight = $row->weight;
        $position = $row->position;
        $number = $row->number;
        $depth_chart = $row->depth_chart;
        $start_date = $row->start_date;
        $end_date = $row->end_date;
        ?>
        <tr>
            <td><?php echo $last_name; ?></td>
            <td><?php echo $first_name; ?></td>
            <td><?php echo $team_name; ?></td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $height; ?></td>
            <td><?php echo $weight; ?></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $number; ?></td>
            <td><?php echo $depth_chart; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $end_date; ?></td>
            <td><a href="<?php echo base_url(); ?>players_phases/edit/<?php echo $players_phases_id; ?>/">Edit</a></td>
            <td><a href="<?php echo base_url(); ?>players_phases/make_active/<?php echo $players_phases_id; ?>/">Make Active</a></td>
        </tr>
    <?php } else : ?>
        <p>There are no inactive players</p>
    <?php endif; ?>
    <br>
</table>
