<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:22 PM
 */
?>

<?php
foreach($league->result() as $row) {
    $id = $row->id;
    $sports_id = $row->sports_id;
    $league_name = $row->league_name;
    $league_shorthand = $row->league_shorthand;
    $league_country = $row->league_country;
    ?>

<h1>Edit Sport - <?php echo $league_name; } ?></h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('teams_phases/edit/'.$id.'/');

echo "Sport Type";
echo "<br>";
?>
<select name="sports_id">
    <option label="" value="sports_id" disabled>Select Sport</option>
    <?php
    foreach($sports_list->result() as $row) {
        $sport_id = $row->id;
        $sport_name = $row->sport_name;
        ?>
        <?php foreach($sport_selected->result() as $row) {
        $sports_selected_id = $row->sports_id; ?>
        <option <?php if($sports_selected_id == $sport_id) { echo 'selected'; } ?> value="<?php echo $sport_id; ?>"><?php echo $sport_name; ?></option>
    <?php } } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "League Name:";
echo "<br>";
$data = array(
    'name'          =>      'league_name',
    'value'         =>      $league_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "League Shorthand:";
echo "<br>";
$data = array(
    'name'          =>      'league_shorthand',
    'value'         =>      $league_shorthand,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "League Country:";
echo "<br>";
$data = array(
    'name'          =>      'league_country',
    'value'         =>      $league_country,
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Edit League',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
