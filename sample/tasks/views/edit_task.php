<?php
    foreach($this_task->result() as $row) {
        $id = $row->id;
        $task_name = $row->task_name;
        $task_body = $row->task_body;
        $list_id = $row->list_id;
        $due_date = $row->due_date;
        $create_date = $row->create_date;
        $is_complete = $row->is_complete;
    }
?>

<h1>Edit Task</h1>
<p>List: <strong><?php echo $list_name; ?></strong></p>
<p>Please fill out the form below to create a new task</p>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('tasks/edit/'.$this->uri->segment(3).'/');

echo "Task Name:";
echo "<br>";

$data = array('name'    =>      'task_name',
              'value'       =>      $task_name,
              'style'   =>      'width:500px'
              );
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Task Body:";
echo "<br>";

$data = array('name'    =>      'task_body',
              'value'       =>      $task_body,
              'style'   =>      'width:100%'
              );
echo form_textarea($data);
echo "<br>";
echo "<br>";

echo "Due Date:";
echo "<br>";
?> <input type="date" name="due_date" value="<?php echo $due_date; ?>"> <?php
echo "<br>";
echo "<br>";

$data = array('value'       =>      'Add Task',
              'name'    =>      'submit',
              'class'       =>      'submit-btn',
              );
echo form_submit($data);

echo form_close();
?>