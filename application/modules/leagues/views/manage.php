<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 9:32 PM
 */
?>
<h1>Leagues</h1>
<br>
<div class="teams-new"><a href="<?php echo base_url(); ?>leagues/add/">Add New League</a></div>
<br>
<table>
    <tr>
        <th width="250px" align="left">League Name</th>
        <th width="150px" align="left">Sport Type</th>
        <th width="100px" align="left">Shorthand</th>
        <th width="200px" align="left">League Country</th>
        <th></th>
    </tr>
    <?php
    foreach($leagues->result() as $row) {
        $leagues_id = $row->leagues_id;
        $sports_name = $row->sport_name;
        $league_name = $row->league_name;
        $league_shorthand = $row->league_shorthand;
        $league_country = $row->league_country;
        ?>
    <tr>
        <td><?php echo $league_name; ?></td>
        <td><?php echo $sports_name; ?></td>
        <td><?php echo $league_shorthand; ?></td>
        <td><?php echo $league_country; ?></td>
        <td><a href="<?php echo base_url(); ?>leagues/edit/<?php echo $leagues_id; ?>/">Edit</a></td>
    </tr>
    <?php } ?>
</table>



