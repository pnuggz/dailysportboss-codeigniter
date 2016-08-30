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

<h1>Welcome to DailyFantasy CMS</h1>
<br>

