<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 7/10/2016
 * Time: 10:49 AM
 */
?>


<body class="partnership">
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo  base_url(); ?>"><img src="<?php echo  base_url(); ?>/img/partnership/logo.png" class="img-responsive logo" alt=""></a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo  base_url(); ?>about/dsb/">About Us</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo  base_url(); ?>about/partnership/">Partnership</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div id="partnership">
    <div class="container-fluid section-1">
        <div class="container container-1">
            <div class="row row-1">
                <h1>Partnership</h1>
            </div>
        </div>
        <div class="container container-2">
            <img src="<?php echo  base_url(); ?>/img/partnership/adheading.png">
        </div>
        <div class="container container-3">
            With millions of sport fans around Indonesia watching each and every week, why shouldn't they be watching
            your product as well? Daily Sport Boss is now providing companies the opportunity to directly market and
            advertise their brand and product.
        </div>

        <div class="container container-4">
            <img src="<?php echo  base_url(); ?>/img/partnership/adlist.png">
        </div>

        <div class="container container-5">
            <h3>Be a part of our journey, and together we will achieve success that benefits everyone.</h3>
            <br/>
            <br/>
            <div class="col-md-8 text-center box-center box-contact">
                <?php
                $attributes = array('id'  =>   'contactform');

                echo form_open('about/contactform', $attributes);
                ?>
                <div class="input-group">
                    <div class="col-md-6 col-xs-12 col-sm-12 padding-5">
                        <input type="text" class="form-control" name="name" placeholder="ENTER YOUR NAME" value="<?php echo set_value('name'); ?>" required>
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12 padding-5">
                        <input type="text" class="form-control" name="email" placeholder="ENTER YOUR EMAIL" value="<?php echo set_value('email'); ?>" required>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12 padding-5">
                        <input type="text" class="form-control" name="subject" placeholder="YOUR SUBJECT" value="<?php echo set_value('subject'); ?>" required>
                        <?php echo form_error('subject'); ?>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12 padding-5">
                        <input type="text" class="form-control" name="message" placeholder="YOUR MESSAGE" value="<?php echo set_value('message'); ?>" required>
                        <?php echo form_error('message'); ?>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-12 padding-5">
                        <input name="submit" type="submit" class="btn btn-secondary subscribe" value="send" ></input>
                    </div>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <br/>
            <br/>
            OR
            <a href="mailto:partnership@dailysportboss.com?Subject=Partnership%20Opportunity" target="_top">Contact Us!</a>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="partnership-footer-about-title">About</div>
                <ul class="partnership-footer-about-ul">
                    <li><a href="<?php echo  base_url(); ?>about/dsb/">Daily Sport Boss</a></li>
                    <li><a href="<?php echo  base_url(); ?>about/partnership/">Partnership Opportunities</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="partnership-footer-support-title">More</div>
                <ul class="partnership-footer-about-ul">
                    <li><a href="<?php echo  base_url(); ?>info/termsofuse/">Terms of Use</a></li>
                    <li><a href="<?php echo  base_url(); ?>info/privacy/">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="partnership-footer-getintouch-title">PT Daily Sport Boss</div>
                <div class="partnership-footer-getintouch-description">
                    <span class="orange-text">Jakarta, Indonesia</span><br>
                    <a href="http://www.facebook.com/dailysportboss" class="text-gray">Facebook</a><br>
                    <a href="http://www.twitter.com/dailysportboss" class="text-gray">Twitter</a><br>
                    <a href="http://www.instagram.com/dailysportboss" class="text-gray">Instagram</a><br><br>
                </div>
            </div>
        </div>
        <br/>
    </div>
    <div class="col-md-12 col-lg-12 box-copyright">
        <h5 class="text-center">Copyright Daily Sport Boss 2016</h5>
    </div>
</footer>

</body>
