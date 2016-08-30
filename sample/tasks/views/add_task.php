<h1>Add a Task</h1>
<p>List: <strong><?php echo $list_name; ?></strong></p>
<p>Please fill out the form below to create a new task</p>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('tasks/add/'.$this->uri->segment(3).'/');

echo "Task Name:";
echo "<br>";

$data = array('name'    =>      'task_name',
              'value'       =>      set_value('task_name'),
              'style'   =>      'width:500px'
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Task Body:";
echo "<br>";

$data = array('name'    =>      'task_body',
              'value'       =>      set_value('task_body'),
              'style'   =>      'width:100%'
              );
echo form_textarea($data);
echo "<br>";
echo "<br>";

echo "Due Date:";
echo "<br>";
?> <input type="date" name="due_date"> <?php
echo "<br>";
echo "<br>";

$data = array('value'       =>      'Add Task',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>