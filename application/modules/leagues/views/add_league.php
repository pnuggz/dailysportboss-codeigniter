<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:04 PM
 */
?>
<h1>Add League</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('leagues/add/');

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

echo "League Name";
echo "<br>";
$data = array(  'name'          =>      'league_name',
    'value'         =>      set_value('league_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "League Shorthand";
echo "<br>";
$data = array(  'name'          =>      'league_shorthand',
    'value'         =>      set_value('league_shorthand'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "League Country";
echo "<br>";
$data = array(  'name'          =>      'league_country',
    'value'         =>      set_value('league_country'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add League',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
