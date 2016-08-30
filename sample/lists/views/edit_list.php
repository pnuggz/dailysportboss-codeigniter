<?php
    foreach($list->result() as $row) {
        $id = $row->id;
        $list_name = $row->list_name;
        $list_body = $row->list_body;
?>

<h1>Edit List - <?php echo $list_name; } ?></h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('lists/edit/'.$id.'/');

echo "List Name:";
echo "<br>";

$data = array('name'    =>      'list_name',
              'value'       =>      $list_name,
              'style'   =>      'width:500px'
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "List Body:";
echo "<br>";

$data = array('name'    =>      'list_body',
              'value'       =>      $list_body,
              'style'   =>      'width:100%'
              );
echo form_textarea($data);
echo "<br>";
echo "<br>";

$data = array('value'       =>      'Update',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>