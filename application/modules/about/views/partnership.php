<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 7/10/2016
 * Time: 10:49 AM
 */
?>


<body class="dsb">
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo  base_url(); ?>">
              <img src="<?php echo  base_url(); ?>/img/dsb/logo.png" class="img-responsive logo visible-md visible-lg" alt="">
              <img src="<?php echo  base_url(); ?>/img/dsb/logo.png" class="img-responsive logo visible-sm visible-xs" alt="">
            </a>
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
      <div class="container container-1 partnership">
          <div class="row row-1">
            <table class="table-header visible-md visible-lg">
              <tbody>
                <tr>
                  <td>
                    <br>
                    <hr>
                  </td>
                  <td>
                    <h1 class="orange-text text-center">PARTNERSHIP</h1>
                  </td>
                  <td>
                    <br>
                    <hr>
                  </td>
                </tr>
              </tbody>
            </table>
            <table style="width: 100%;" class="table-header mobile visible-xs visible-sm">
              <tbody>
                <tr>
                  <td>
                    <h1 class="orange-text text-center">Partnership</h1>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
      </div>
        <div class="container container-2">
          <img class="img-responsive" src="<?php echo  base_url(); ?>img/partnership/adheading.png">

        </div>
        <div class="container container-3">
            With millions of sport fans around Indonesia watching each and every week, why shouldn't they be watching
            your product as well? Daily Sport Boss is now providing companies the opportunity to directly market and
            advertise their brand and product.
        </div>


      <div class="container container-4">
        <div class="col-md-10 col-xs-12 box-center">
          <div class="col-md-12 text-center box-advs">
            <div class="col-md-3 col-xs-12 col-sm-6">
              <img src="<?php echo  base_url(); ?>img/partnership/adlist1.png" class="img-responsive img-ads">
              <span>Pay only when a user choses to watch your advertisement. Don't let your money fall on deaf ears again.</span>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
              <img src="<?php echo  base_url(); ?>img/partnership/adlist2.png" class="img-responsive img-ads">
              <span>A happy and excited user is a more engaged one. associate positive feelings to your brand.</span>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
              <img src="<?php echo  base_url(); ?>img/partnership/adlist3.png" class="img-responsive img-ads">
              <span>Sport has been around for thousands of years, and will be around for thousands more. brand association with sport will always be successful.</span>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
              <img src="<?php echo  base_url(); ?>img/partnership/adlist4.png" class="img-responsive img-ads">
              <span>As your ads will be shown before the matches, our users will be focused on your product.</span>
            </div>
          </div>
        </div>
      </div>

        <div class="container container-5">
            <h3 class="visible-md visible-lg">Be a part of our journey, and together we will achieve success that benefits everyone.</h3>
            <h3 class="visible-xs visible-sm text-center">Be a part of our journey, and together we will achieve success that benefits everyone.</h3>
            <br/>
            <br/>
            <div class="col-md-12 col-xs-12">
              <div class="col-md-6 col-xs-12 text-center box-contact">
                <div class="col-md-12">
                  <h3>Reach out to us!</h3>
                </div>
                <?php
                $attributes = array('id'  =>   'contactform');

                echo form_open('about/contactform', $attributes);
                ?>
                <div class="input-group">
                  <div class="form-group col-md-12 col-xs-12 col-sm-12 padding-5">
                    <input type="text" class="form-control" name="name" placeholder="ENTER YOUR NAME" value="<?php echo set_value('name'); ?>" required>
                    <?php echo form_error('name'); ?>
                  </div>
                  <div class="form-group col-md-12 col-xs-12 col-sm-12 padding-5">
                    <input type="text" class="form-control" name="email" placeholder="ENTER YOUR EMAIL" value="<?php echo set_value('email'); ?>" required>
                    <?php echo form_error('email'); ?>
                  </div>
                  <div class="form-group col-md-12 col-xs-12 col-sm-12 padding-5">
                    <input type="text" class="form-control" name="subject" placeholder="YOUR SUBJECT" value="<?php echo set_value('subject'); ?>" required>
                    <?php echo form_error('subject'); ?>
                  </div>
                  <div class="form-group col-md-12 col-xs-12 col-sm-12 padding-5 text-left">
                    <textarea class="width-100" name="message" rows="8"  value="<?php echo set_value('message'); ?>" required></textarea>
                    <?php echo form_error('message'); ?>
                  </div>
                  <div class="col-md-6 col-xs-12 col-sm-12 padding-5 text-left">
                    <input name="submit" type="submit" class="btn btn-success btn-lg" value=" Send "></input>
                  </div>
                  <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php
                echo form_close();
                ?>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12 text-center">
                <br>
                <br>
                <br>
                <div class="bs-example" data-example-id="block-btns">
                  <div class="well center-block">
                    <h4>OR</h4>
                    <a href="mailto:partnership@dailysportboss.com?Subject=Partnership%20Opportunity" target="_top" class="btn btn-success btn-lg btn-block btn-lg">Contact Us!</a>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <br/>
        </div>
    </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="row visible-md visible-lg">
      <div class="col-md-3">
        <div class="dsb-footer-about-title">About</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo  base_url(); ?>about/dsb/">Daily Sport Boss</a></li>
          <li><a href="<?php echo  base_url(); ?>about/partnership/">Partnership Opportunities</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <div class="dsb-footer-support-title">More</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo  base_url(); ?>/info/termsofuse/">Terms of Use</a></li>
          <li><a href="<?php echo  base_url(); ?>/info/privacy/">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <div class="dsb-footer-getintouch-title">PT Daily Sport Boss</div>
        <div class="dsb-footer-getintouch-description">
          <span class="orange-text">Jakarta, Indonesia</span><br>
          <a href="http://www.facebook.com/dailysportboss" class="text-gray">Facebook</a><br>
          <a href="http://www.twitter.com/dailysportboss" class="text-gray">Twitter</a><br>
          <a href="http://www.instagram.com/dailysportboss" class="text-gray">Instagram</a><br><br>
        </div>
      </div>
    </div>
    <div class="row visible-xs visible-sm">
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-about-title">About</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo base_url(); ?>about/dsb/">Daily Sport Boss</a></li>
          <li><a href="<?php echo base_url(); ?>about/partnership/">Partnership Opportunities</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-support-title">More</div>
        <ul class="dsb-footer-about-ul">
          <li><a href="<?php echo base_url(); ?>/info/termsofuse/">Terms of Use</a></li>
          <li><a href="<?php echo base_url(); ?>/info/privacy/">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-12 text-center">
        <div class="dsb-footer-getintouch-title">PT Daily Sport Boss</div>
        <div class="dsb-footer-getintouch-description">
          <span class="orange-text">Jakarta, Indonesia</span><br>
          <a href="http://www.facebook.com/dailysportboss" class="text-gray">Facebook</a><br>
          <a href="http://www.twitter.com/dailysportboss" class="text-gray">Twitter</a><br>
          <a href="http://www.instagram.com/dailysportboss" class="text-gray">Instagram</a><br><br>
        </div>
      </div>
    </div>

    <br>
  </div>
  <div class="col-md-12 col-lg-12 box-copyright">
    <h5 class="text-center">Copyright Daily Sport Boss 2016</h5>
  </div>
</footer>


</body>
