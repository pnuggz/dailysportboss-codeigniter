<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 2/05/2016
 * Time: 9:58 PM
 */
?>
<html>
    <head>
        <title>DailyFantasy - Lobby</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/lobbylayout.css"/>
    </head>

    <body id="body">
        <header id="header">
            <div class="navbar">
                <div class="logo">
                    Logo
                </div>
                <div class="links">Lobby</div>
                <div class="links">Game</div>
                <div class="links">Help</div>
                <div class="login">
                    Login
                </div>
            </div>
        </header>
        <div id="top-background">
            <div id="top-section">
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('lobby') && $second_bit==('')) {
                    $this->load->module('lobby');
                    $this->load->view('lobby/lobby');
                } else {

                }
                ?>
            </div>
        </div>
        <div id="contest-background">
            <div id="contest-table">
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('lobby') && $second_bit==('')) {
                    $this->load->module('lobby');
                    $this->load->view('lobby/contest');
                } else {

                }
                ?>
            </div>
        </div>
    </body>

    <footer>
        <div id="footer-wrapper">
            <div id="footer-box">
                Test
            </div>
        </div>
    </footer>

</html>
