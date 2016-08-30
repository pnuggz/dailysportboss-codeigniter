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

<h1>Contests Entry - Contests List</h1>

<br>

<h3>Active Contests</h3>
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
        <th>Contest Name</th>
        <th>League</th>
        <th>Start Date</th>
        <th>Start Time</th>
        <th>Entry Size</th>
        <th>Sponsor</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($active_contests->result() as $row) {
        $contest_id = $row->contests_id;
        $contest_name = $row->contest_name;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $start_time = $row->start_time;
        $entry_max = $row->entry_max;
        $sponsor_id = $row->sponsors_id
        ?>
        <tr>
            <td>
                <a href="<?php echo base_url(); ?>contests_entry/details/<?php echo $contest_id; ?>/"><?php echo $contest_name; ?></a>
            </td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $entry_max; ?></td>
            <td><?php echo $sponsor_id; ?></td>
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

<h3>Inactive Contests</h3>
<?php if($inactive_contests) : ?>
<br>
<table id="datatables2" class="display">
    <thead>
        <tr>
            <th>Contest Name</th>
            <th>League</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Entry Size</th>
            <th>Sponsor</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach($inactive_contests->result() as $row) {
        $contest_id = $row->contests_id;
        $contest_name = $row->contest_name;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $start_time = $row->start_time;
        $sponsor_id = $row->sponsors_id
        ?>
        <tr>
            <td>
                <a href="<?php echo base_url(); ?>contests_entry/details/<?php echo $contest_id; ?>/"><?php echo $contest_name; ?></a>
            </td>
            <td><?php echo $league_shorthand; ?></td>
            <td><?php echo $start_date; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $entry_max; ?></td>
            <td><?php echo $sponsor_id; ?></td>
        </tr>
    <?php } else : ?>
    </tbody>

        <p>There are no inactive contests</p>
    <?php endif; ?>
    <br>
</table>


