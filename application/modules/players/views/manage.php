<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 21/04/2016
 * Time: 5:14 PM
 */
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>

<h1>Players</h1>
<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>players/add/">Add New Player</a></div>
<br>
<br>
<h3>Soccer</h3>
<br>
<table id="datatables" class="display">
    <thead>
        <tr>
            <th align="left">Last Name</th>
            <th align="left">First Name</th>
            <th width="150px" align="left">Nickname</th>
            <th width="180px" align="left">Date of Birth</th>
            <th width="150px" align="left">Nationality</th>
            <th>Edit</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach ($players->result() as $row) {
        $players_id = $row->players_id;
        $players_sports_id = $row->players_sports_id;
        $first_name = $row->first_name;
        $last_name = $row->last_name;
        $nickname = $row->nickname;
        $dob = $row->dob;
        $nationality = $row->nationality;
        $from = new DateTime($dob);
        $to = new DateTime('today');
        $age = $from->diff($to)->y;
        if($players_sports_id == 1) : ?>
        <tr>
            <td><?php echo $last_name; ?></td>
            <td><?php echo $first_name; ?></td>
            <td><?php echo $nickname; ?></td>
            <td><?php echo $dob; ?>    (<?php echo $age; ?>)</td>
            <td><?php echo $nationality; ?></td>
            <td><a href="<?php echo base_url(); ?>players/edit/<?php echo $players_id; ?>/">Edit</a></td>
        </tr>
    <?php endif; } ?>
    </tbody>
</table>
<br>
<br>
<h3>Basketball</h3>
<br>
<table>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Nickname</th>
        <th>Date of Birth</th>
        <th>Nationality</th>
        <th>Edit</th>
    </tr>
    <?php
    foreach ($players->result() as $row) {
        $players_id = $row->players_id;
        $players_sports_id = $row->players_sports_id;
        $first_name = $row->first_name;
        $last_name = $row->last_name;
        $nickname = $row->nickname;
        $dob = $row->dob;
        $nationality = $row->nationality;
        $from = new DateTime($dob);
        $to = new DateTime('today');
        $age = $from->diff($to)->y;
        if($players_sports_id == 2) : ?>
            <tr>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $first_name; ?></td>
                <td><?php echo $nickname; ?></td>
                <td><?php echo $dob; ?>    (<?php echo $age; ?>)</td>
                <td><?php echo $nationality; ?></td>
                <td><a href="<?php echo base_url(); ?>players/edit/<?php echo $players_id; ?>/">Edit</a></td>
            </tr>
        <?php endif; } ?>
</table>

