<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:34 PM
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

<h1>Contest Games - *<?php echo $this->session->userdata('username') ?>*</h1>

<br>

<h3>Active Games</h3>
<?php if($active_contests) : ?>
<?php foreach($active_contests->result() as $row) {
$league_id = $row->leagues_id;
$league_name = $row->league_name;
?>
    <h3><?php echo $league_name;  break; } ?></h3>

<br>
<br>
<table id="datatables" class="display">
    <thead>
    <tr>
        <th>Roster Name</th>
        <th>Contest Name</th>
        <th>User Entry Count</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($active_contests->result() as $row) {
        $contest_id = $row->id;
        $contest_name = $row->contest_name;
        $user_id = $row->user_id;
        $user_entry_count = $row->user_entry_count;
        $roster_name = $row->roster_name;
        ?>
        <tr>
            <td>
                <a href="<?php echo base_url(); ?>games/details/<?php echo $contest_id; ?>/<?php echo $user_id; ?>/<?php echo $user_entry_count; ?>/"><?php echo $roster_name; ?></a>
            </td>
            <td><?php echo $contest_name; ?></td>
            <td><?php echo $user_entry_count; ?></td>
        </tr>
    <?php } else : ?>
    </tbody>

    <p>There are no active contests</p>
    <?php endif; ?>

</table>
<br>
<br>
<br>
<br>
<br>

<h3>History</h3>
<br>
<br>
<table id="datatables" class="display">
    <thead>
    <tr>
        <th>Roster Name</th>
        <th>Contest Name</th>
        <th>User Entry Count</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($inactive_contests->result() as $row) {
        $contest_id = $row->id;
        $contest_name = $row->contest_name;
        $user_id = $row->user_id;
        $user_entry_count = $row->user_entry_count;
        $roster_name = $row->roster_name;
        ?>
        <tr>
            <td>
                <a href="<?php echo base_url(); ?>games/details/<?php echo $contest_id; ?>/<?php echo $user_id; ?>/<?php echo $user_entry_count; ?>/"><?php echo $roster_name; ?></a>
            </td>
            <td><?php echo $contest_name; ?></td>
            <td><?php echo $user_entry_count; ?></td>
        </tr>
    </tbody>

    <p>There are no past games</p>

</table>

<?php } ?>

