<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 9:32 PM
 */
?>
<h1>Sports</h1>
<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>sports/add/">Add New Sport</a></div>
<br>
<table>
    <tr>
        <th width="200px" align="left">Sport Name</th>
        <th></th>
    </tr>
    <?php
    foreach($sports->result() as $row) {
        $id = $row->id;
        $sport_name = $row->sport_name;
        ?>
    <tr>
        <td><?php echo $sport_name; ?></td>
        <td><a href="<?php echo base_url(); ?>sports/edit/<?php echo $id; ?>/">Edit</a></td>
    </tr>
    <?php } ?>
</table>



