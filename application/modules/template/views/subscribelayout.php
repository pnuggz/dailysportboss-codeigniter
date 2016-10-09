<html>
    <head>
        <title>DailyFantasy - CMS</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/subscribelayout.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/javascript.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<!--         DataTables Codes-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.js"></script>


    </head>


    <body class="body">

        <div class="container">
            <div class="main-content">
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('subscribe') && $second_bit==('')) {
                    $this->load->module('subscribe');
                    $this->load->view('subscribe/subscribe');
                } else {

                }
                ?>

                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('subscribe') && $second_bit==('thankyou')) {
                    $this->load->module('subscribe');
                    $this->load->view('subscribe/thankyou');
                } else {

                }
                ?>


            </div>
        </div>

    </body>
</html>