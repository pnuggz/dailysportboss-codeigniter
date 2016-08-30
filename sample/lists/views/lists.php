<?php
if($this->session->flashdata('list_created')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('list_created'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('list_deleted')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('list_deleted'); ?>
    </div>
<?php endif; ?>

<?php
if($this->session->flashdata('list_updated')) : ?>
    <div class="success">
        <?php echo $this->session->flashdata('list_updated'); ?>
    </div>
<?php endif; ?>

<h1>Lists</h1>
<p>These are your current list of tasks</p>
<ul class="lists-item">
<?php
    foreach($lists->result() as $row) {
        $id = $row->id;
        $list_name = $row->list_name;
        $list_body = $row->list_body;
        $list_user_id = $row->list_user_id;
?>
    <li>
        <div class="lists-name">
            <a href="<?php echo base_url(); ?>lists/details/<?php echo $id; ?>/"><?php echo $list_name; ?></a>
        </div>
        <div class="lists-body">
        <?php echo $list_body; ?><br>
        </div>
    </li>
<?php } ?>
</ul>
<br>
<div class="lists-new"><a href="<?php echo base_url(); ?>lists/add/">Create a New List</a></div>