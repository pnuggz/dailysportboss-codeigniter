<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 9:32 PM
 */
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>

<h1>Teams</h1>
<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>teams/add/">Add New Team</a></div>
<br>
<table id="datatables" class="display">
    <thead>
        <tr>
            <th align="left">Team Name</th>
            <th width="150px" align="left">Team Nickname</th>
            <th width="150px" align="left">Team Shorthand</th>
            <th>Edit</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($teams->result() as $row) {
        $id = $row->id;
        $team_name = $row->team_name;
        $team_nickname = $row->team_nickname;
        $team_shorthand = $row->team_shorthand;
    ?>
    <tr>
        <td><?php echo $team_name; ?></td>
        <td><?php echo $team_nickname; ?></td>
        <td><?php echo $team_shorthand; ?></td>
        <td><a href="<?php echo base_url(); ?>teams/edit/<?php echo $id; ?>/">Edit</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<br>

