<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:22 PM
 */
?>

<?php
foreach($sports->result() as $row) {
    $id = $row->id;
    $sport_name = $row->sport_name;
    ?>

<h1>Edit Sport - <?php echo $sport_name; } ?></h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('sports/edit/'.$id.'/');

echo "Sport Name:";
echo "<br>";
$data = array(  'name'          =>      'sport_name',
                'value'         =>      $sport_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Edit Sport',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
