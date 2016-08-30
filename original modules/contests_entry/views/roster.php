<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 29/04/2016
 * Time: 12:30 AM
 */
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
</script>

<?php if($this->session->userdata('logged_in')) : ?>
<h2>Contest Roster - <?php echo $this->session->userdata('username'); ?></h2>
<?php endif; ?>

<p>Roster List</p>

<table id="datatables">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Depth Chart</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($db_selected_players->result() as $row) {
        $first_name_p1 = $row->first_name_p1;
        $last_name_p1 = $row->last_name_p1;
        $position_p1 = $row->position_p1;
        $depth_chart_p1 = $row->depth_chart_p1;
        $first_name_p2 = $row->first_name_p2;
        $last_name_p2 = $row->last_name_p2;
        $position_p2 = $row->position_p2;
        $depth_chart_p2 = $row->depth_chart_p2;
        $first_name_p3 = $row->first_name_p3;
        $last_name_p3 = $row->last_name_p3;
        $position_p3 = $row->position_p3;
        $depth_chart_p3 = $row->depth_chart_p3;
        $first_name_p4 = $row->first_name_p4;
        $last_name_p4 = $row->last_name_p4;
        $position_p4 = $row->position_p4;
        $depth_chart_p4 = $row->depth_chart_p4;
        $first_name_p5 = $row->first_name_p5;
        $last_name_p5 = $row->last_name_p5;
        $position_p5 = $row->position_p5;
        $depth_chart_p5 = $row->depth_chart_p5;
        $first_name_p6 = $row->first_name_p6;
        $last_name_p6 = $row->last_name_p6;
        $position_p6 = $row->position_p6;
        $depth_chart_p6 = $row->depth_chart_p6;
        $first_name_p7 = $row->first_name_p7;
        $last_name_p7 = $row->last_name_p7;
        $position_p7 = $row->position_p7;
        $depth_chart_p7 = $row->depth_chart_p7;
        $first_name_p8 = $row->first_name_p8;
        $last_name_p8 = $row->last_name_p8;
        $position_p8 = $row->position_p8;
        $depth_chart_p8 = $row->depth_chart_p8;
        $first_name_p9 = $row->first_name_p9;
        $last_name_p9 = $row->last_name_p9;
        $position_p9 = $row->position_p9;
        $depth_chart_p9 = $row->depth_chart_p9;
        $first_name_p10 = $row->first_name_p10;
        $last_name_p10 = $row->last_name_p10;
        $position_p10 = $row->position_p10;
        $depth_chart_p10 = $row->depth_chart_p10;
    ?>
        <tr>
            <td><?php echo "$first_name_p1  $last_name_p1"; ?></td>
            <td><?php echo $position_p1; ?></td>
            <td><?php echo $depth_chart_p1; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p2  $last_name_p2"; ?></td>
            <td><?php echo $position_p2; ?></td>
            <td><?php echo $depth_chart_p2; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p3  $last_name_p3"; ?></td>
            <td><?php echo $position_p3; ?></td>
            <td><?php echo $depth_chart_p3; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p4  $last_name_p4"; ?></td>
            <td><?php echo $position_p4; ?></td>
            <td><?php echo $depth_chart_p4; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p5  $last_name_p5"; ?></td>
            <td><?php echo $position_p5; ?></td>
            <td><?php echo $depth_chart_p5; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p6  $last_name_p6"; ?></td>
            <td><?php echo $position_p6; ?></td>
            <td><?php echo $depth_chart_p6; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p7  $last_name_p7"; ?></td>
            <td><?php echo $position_p7; ?></td>
            <td><?php echo $depth_chart_p7; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p8  $last_name_p8"; ?></td>
            <td><?php echo $position_p8; ?></td>
            <td><?php echo $depth_chart_p8; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p9  $last_name_p9"; ?></td>
            <td><?php echo $position_p9; ?></td>
            <td><?php echo $depth_chart_p9; ?></td>
        </tr>
        <tr>
            <td><?php echo "$first_name_p10  $last_name_p10"; ?></td>
            <td><?php echo $position_p10; ?></td>
            <td><?php echo $depth_chart_p10; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
