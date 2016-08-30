<?php
if($this->session->flashdata('registered')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('registered'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('login_success')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('login_success'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('login_failed')) :?>
    <div class="fail">
        <?php echo $this->session->flashdata('login_failed'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('noaccess')) :?>
    <div class="fail">
        <?php echo $this->session->flashdata('noaccess'); ?>
    </div>
<?php endif; ?>

<h1>Welcome to myToDo</h1>
<p>myToDo is a simple and helpful application to help you manage your day to day tasks.</p>
<br>

<?php if($this->session->userdata('logged_in')) : ?>
<h3>My Latest Lists</h3>
<table class="latest-table" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th style="text-align: left;">List Name</th>
        <th style="text-align: left;">Created On</th>
        <th style="text-align: left;">View</th>
    </tr>
    <?php if($lists->result() > 1) : ?>
    <?php foreach($lists->result() as $row) {
        $id = $row->id;
        $list_name = $row->list_name;
        $list_body = $row->list_body;
        $list_user_id = $row->list_user_id;
        $create_date = $row->create_date;
    ?>
    <tr>
        <td><?php echo $list_name; ?></td>
        <td><?php echo $create_date; ?></td>
        <td><a href="<?php echo base_url(); ?>lists/details/<?php echo $id; ?>">View List Detail</a></td>  
    </tr>
    <?php } else : ?>
    <tr>
        <td colspan="3">You Currently Have No List</td>
    </tr>
</table>
<?php endif; ?>
<?php endif; ?>