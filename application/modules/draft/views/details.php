<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 27/04/2016
 * Time: 12:07 AM
 */
?>
<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>

<div id="mainHeading">ENTRY DETAILS</div>
<br /><br />

<div id="mainDraft"><a href="<?php echo base_url(); ?>draft/add/<?php echo $contest_id;  ?>/">Draft New Team</a></div>

<br /><br /><br />

<div id="lobby-table">&nbsp;
    <table class="game-table">
        <tr>
            <th class="game-container-data-1"></th>
            <th class="game-container-data-2"></th>
            <th class="game-container-data-3">Contest</th>
            <th class="game-container-data-4">Entry Size</th>
            <th class="game-container-data-5">Entry Fee</th>
            <th class="game-container-data-6">Sponsor</th>
            <th class="game-container-data-7">Prizes</th>
            <th class="game-container-data-8">Start Date</th>
            <th class="game-container-data-9"></th>
            <th class="game-container-data-10"></th>
        </tr>
        <?php
        foreach ($users_details->result() as $row) {
            $user_entry_id = $row->contests_users_entries_id;
            $user_id = $row->user_id;
            $entry_date_time = $row->entry_date_time;
            $user_entry_number = $row->user_entry_count;
            $username = $row->username;
            $user_first_name = $row->first_name;
            $user_last_name = $row->last_name;
            $user_email = $row->email;
            $contests_rosters_id = $row->contests_rosters_id;
            $roster_name = $row->roster_name;
            ?>
        <tr>
            <td><?php echo $username; ?></a></td>
            <td><a href="<?php echo base_url(); ?>draft/roster/<?php echo $contests_rosters_id; ?>/"><?php echo "$roster_name"; ?></td>
            <td><?php echo "$user_first_name  $user_last_name"; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_entry_number; ?></td>
            <td><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>draft/delete/<?php echo $user_entry_id ?>">Delete Entry</a></td>
        </tr>
        <?php } ?>
    </table>

<table id="datatables">
    <thead>
        <tr>
            <th>Username</th>
            <th>Roster Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Entry Number</th>
            <th>Delete Entry</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach ($users_details->result() as $row) {
        $user_entry_id = $row->contests_users_entries_id;
        $user_id = $row->user_id;
        $entry_date_time = $row->entry_date_time;
        $user_entry_number = $row->user_entry_count;
        $username = $row->username;
        $user_first_name = $row->first_name;
        $user_last_name = $row->last_name;
        $user_email = $row->email;
        $contests_rosters_id = $row->contests_rosters_id;
        $roster_name = $row->roster_name;
        ?>
        <tr>
            <td><?php echo $username; ?></a></td>
            <td><a href="<?php echo base_url(); ?>draft/roster/<?php echo $contests_rosters_id; ?>/"><?php echo "$roster_name"; ?></td>
            <td><?php echo "$user_first_name  $user_last_name"; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_entry_number; ?></td>
            <td><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>draft/delete/<?php echo $user_entry_id ?>">Delete Entry</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>



