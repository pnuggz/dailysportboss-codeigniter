<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 21/04/2016
 * Time: 6:24 PM
 */
?>

<?php
foreach($player->result() as $row) {
$players_id = $row->id;
$players_sports_id = $row->sports_id;
$first_name = $row->first_name;
$last_name = $row->last_name;
$nickname = $row->nickname;
$dob = $row->dob;
$nationality = $row->nationality;
?>

<h1>Edit Team Phase</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('players/edit/'.$players_id.'/');

echo "<br>";
echo "<br>";

echo "Sport Type";
echo "<br>";
?>
<select name="sports_id">
    <option value="" disabled selected>Select Sport</option>
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

echo "First Name";
echo "<br>";
$data = array(  'name'          =>      'first_name',
    'value'         =>      $first_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Last Name";
echo "<br>";
$data = array(  'name'          =>      'last_name',
    'value'         =>      $last_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Nickname";
echo "<br>";
$data = array(  'name'          =>      'nickname',
    'value'         =>      $nickname,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Date of Birth";
echo "<br>";
?> <input value="<?php echo $dob; ?>" type="date" name="dob"> <?php

echo "<br>";
echo "<br>";

echo "Nationality";
echo "<br>";
$data = array(  'name'          =>      'nationality',
    'value'         =>      $nationality,
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Edit Player',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>

<?php } ?>