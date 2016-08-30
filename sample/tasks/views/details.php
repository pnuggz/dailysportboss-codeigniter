<?php
    foreach($task->result() as $row) {
        $id = $row->id;
        $task_name = $row->task_name;
        $task_body = $row->task_body;
        $list_id = $row->list_id;
        $due_date = $row->due_date;
        $create_date = $row->create_date;
        $is_complete = $row->is_complete;
    }
?>

<ul class="task-actions">
    <h4>my Tasks</h4>
    <li><a href="<?php echo base_url(); ?>tasks/add/<?php echo $list_id; ?>/">Add Task</a></li>
    <li><a href="<?php echo base_url(); ?>tasks/edit/<?php echo $id; ?>/">Edit Task</a></li>
    <?php if($is_complete) : ?>
    <li><a href="<?php echo base_url(); ?>tasks/mark_new/<?php echo $id; ?>/">Mark New</a></li>
    <?php else : ?>
    <li><a href="<?php echo base_url(); ?>tasks/mark_complete/<?php echo $id; ?>/">Mark Complete</a></li>
    <?php endif; ?>
    <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>tasks/delete/<?php echo $id; ?>/">Delete Task</a></li>
</ul>

<h1><?php echo $task_name; ?></h1>
<ul class="task-info">
    <li>Created On: <strong><?php echo $create_date; ?></strong></li>
    
    <?php if($is_complete == 0) :?>
    <li>Status: <strong>Incomplete</strong></li>
    <?php else : ?>
    <li>Status: <strong>Complete</strong></li>
    <?php endif; ?>
    
    <li>Due Date: <?php echo $due_date; ?></li>
</ul>
<br>
<div class="task-body">
    <?php echo $task_body; ?>
</div>
<br>
<- Go Back to <a href="<?php echo base_url(); ?>lists/details/<?php echo $list_id; ?>/"><?php echo $list_name; ?></a>