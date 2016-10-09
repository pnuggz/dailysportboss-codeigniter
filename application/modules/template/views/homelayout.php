<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daily Sport Boss</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dom.js"></script>
    <script type="text/javascript" src="js/countries.js"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/homelayout.css"/>
</head>

<body class="body">
  <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top affix-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" href="/"><img src="img/home/logo.png" class="img-responsive logo" alt=""></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li class="hidden">
                      <a href="#page-top"></a>
                  </li>
                  <li>
                      <a class="page-scroll" href="/about/dsb/">ABOUT US</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="/about/partnership/">PARTNERSHIP</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <?php
    $first_bit = $this->uri->segment(1);
    $second_bit = $this->uri->segment(2);

    if($first_bit==('home') && $second_bit==('')) {
        $this->load->module('home');
        $this->load->view('home/home');
    } else {

    }
    ?>
    <?php
    $first_bit = $this->uri->segment(1);
    $second_bit = $this->uri->segment(2);

    if($first_bit==('login') && $second_bit==('')) {
        $this->load->module('login');
        $this->load->view('login/login');
    } else {

    }
  ?>
	<?php
  	$first_bit = $this->uri->segment(1);
  	$second_bit = $this->uri->segment(2);

  	if($first_bit==('') && $second_bit==('')) {
  	    $this->load->module('home');
  	    $this->load->view('home/home');
  	} else {

  	}
	?>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="dsb-footer-about-title">About</div>
          <ul class="dsb-footer-about-ul">
            <li><a href="/about/dsb/">Daily Sport Boss</a></li>
            <li><a href="/about/partnership/">Partnership Opportunities</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="dsb-footer-support-title">More</div>
          <ul class="dsb-footer-about-ul">
            <li><a href="/info/termsofuse/">Terms of Use</a></li>
            <li><a href="/info/privacy/">Privacy Policy</a></li>
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
      <br>
    </div>
    <div class="col-md-12 col-lg-12 box-copyright">
      <h5 class="text-center">Copyright Daily Sport Boss 2016</h5>
    </div>
  </footer>
</body>
</html>
