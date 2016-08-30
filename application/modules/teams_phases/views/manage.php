<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 21/04/2016
 * Time: 2:31 PM
 */
?>

<h1>Teams Phases</h1>
<br>
<ul>
<?php
foreach ($sports->result() as $row) {
    $sports_name = $row->sport_name;
    ?>

    <li><?php echo $sports_name; ?></li>
        <ul>
            <?php
            foreach($sports_leagues->result() as $row) {
            $sport_name = $row->sport_name;
            $league_name = $row->league_name;
            $league_id = $row->leagues_id;
            if ($sports_name == $sport_name) {
            ?>
                <li>
                    <a href="<?php echo base_url(); ?>teams_phases/league/<?php echo $league_id; ?>/"><?php echo $league_name; ?></a>
                </li>
            <?php } } ?>
        </ul>
<?php } ?>
</ul>
