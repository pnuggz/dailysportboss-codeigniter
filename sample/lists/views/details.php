<?php
    foreach($list->result() as $row) {
        $id = $row->id;
        $list_name = $row->list_name;
        $list_body = $row->list_body;
        $list_user_id = $row->list_user_id;
        $create_date = $row->create_date;
    }
?>

<ul class="list-actions">
    <h4>my To Do List</h4>
    <li><a href="<?php echo base_url(); ?>tasks/add/<?php echo $id; ?>/">Add Task</a></li>
    <li><a href="<?php echo base_url(); ?>lists/edit/<?php echo $id; ?>/">Edit List</a></li>
    <li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>lists/delete/<?php echo $id; ?>">Delete List</a></li>
</ul>

<?php
if($this->session->flashdata('task_deleted')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('task_deleted'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('task_created')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('task_created'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('task_updated')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('task_updated'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('marked_compelte')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('marked_complete'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('marked_new')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('marked_new'); ?>
    </div>
<?php endif; ?>

<h1><?php echo $list_name; ?></h1>
<br>
Created On: <strong><?php echo $create_date; ?></strong>
<br>
<br>
<div stlye="max-width: 500px;"><?php echo $list_body; ?></div>
<br>
<h4>Active Tasks</h4>
<?php if($active_tasks) : ?>
    <?php foreach($active_tasks as $row) {
        $task_id = $row->task_id;
        $task_name = $row->task_name;
    ?>
    <ul>
        <li><a href="<?php echo base_url(); ?>tasks/details/<?php echo $task_id; ?>/"><?php echo $task_name; ?></a></li>
    </ul>
        <?php } else : ?>
        <p>There are no active tasks</p>
    <?php endif; ?>
<br>
<h4>Completed Tasks</h4>
<?php if($inactive_tasks) : ?>
    <?php foreach($inactive_tasks as $row) {
        $task_id = $row->task_id;
        $task_name = $row->task_name;
    ?>
    <ul>
        <li><a href="<?php echo base_url(); ?>tasks/details/<?php echo $task_id; ?>/"><?php echo $task_name; ?></a></li>
    </ul>
        <?php } else : ?>
        <p>There are no completed tasks</p>
    <?php endif; ?>
<br>