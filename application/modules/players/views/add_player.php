<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 21/04/2016
 * Time: 6:07 PM
 */
?>

<h1>Add Player</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('players/add/');
?>

<?php
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
        <option value="<?php echo $sport_id; ?>"><?php echo $sport_name; ?></option>
    <?php } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "First Name";
echo "<br>";
$data = array(  'name'          =>      'first_name',
    'value'         =>      set_value('first_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Last Name";
echo "<br>";
$data = array(  'name'          =>      'last_name',
    'value'         =>      set_value('last_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Nickname";
echo "<br>";
$data = array(  'name'          =>      'nickname',
    'value'         =>      set_value('nickname'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Date of Birth";
echo "<br>";
?> <input type="date" name="dob"> <?php
echo "<br>";
echo "<br>";

echo "Nationality";
echo "<br>";
$data = array(  'name'          =>      'nationality',
    'value'         =>      set_value('nationality'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add Player',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>

