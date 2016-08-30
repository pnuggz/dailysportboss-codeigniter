<html>
    <head>
        <title>DailyFantasy - CMS</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/gameslayout.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/javascript.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<!--         DataTables Codes-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.js"></script>

        
    </head>

    <header class="clearfix">

        <!-- Header Divider -->
        <div class="header">

            <div id="sse1">
                <div class="logo"><h1><a href="<?php echo base_url() ?>draft/lobby/"><img src="<?php echo base_url(); ?>img/dsblogo.png" alt=""></a></h1></div>
                <div id="sses1">
                    <ul>
                        <li><a href="<?php echo base_url() ?>draft/lobby/">LOBBY</a></li>
                        <li><a href="<?php echo base_url() ?>games/">GAMES</a></li>
                        <li><a href="<?php echo base_url() ?>help/">HELP</a></li>
                    </ul>
                </div>

                <!-- Login Divider -->
                <div class="emptyrightnav"></div>
                <div class="login-nav"> <!-- Picture -->
                    <a class="activator" id="activator">
                        <?php
                        if($this->session->userdata('logged_in')) : ?>
                            <?php $this->load->module('users'); $this->load->view('users/loginform'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <body class="body">

        <div class="container">
            <div class="main-content">
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('cmshome') && $second_bit==('')) {
                    $this->load->module('cmshome');
                    $this->load->view('cmshome/cmshome');
                } else {

                }
                ?>
                <?php
                    $first_bit = $this->uri->segment(1);
                    $second_bit = $this->uri->segment(2);
                    
                    if($first_bit==('teams') && $second_bit==('')) {
                        $this->load->module('teams');
                        $this->load->view('teams/manage');
                    } else {
                        
                    }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams') && $second_bit==('add')) {
                    $this->load->module('teams');
                    $this->load->view('teams/add_team');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams') && $second_bit==('edit')) {
                    $this->load->module('teams');
                    $this->load->view('teams/edit_team');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports') && $second_bit==('')) {
                    $this->load->module('sports');
                    $this->load->view('sports/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports') && $second_bit==('add')) {
                    $this->load->module('sports');
                    $this->load->view('sports/add_sport');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports') && $second_bit==('edit')) {
                    $this->load->module('sports');
                    $this->load->view('sports/edit_sport');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('leagues') && $second_bit==('')) {
                    $this->load->module('leagues');
                    $this->load->view('leagues/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('leagues') && $second_bit==('add')) {
                    $this->load->module('leagues');
                    $this->load->view('leagues/add_league');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('leagues') && $second_bit==('edit')) {
                    $this->load->module('leagues');
                    $this->load->view('leagues/edit_league');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams_phases') && $second_bit==('')) {
                    $this->load->module('teams_phases');
                    $this->load->view('teams_phases/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams_phases') && $second_bit==('add')) {
                    $this->load->module('teams_phases');
                    $this->load->view('teams_phases/add_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams_phases') && $second_bit==('edit')) {
                    $this->load->module('teams_phases');
                    $this->load->view('teams_phases/edit_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('teams_phases') && $second_bit==('league')) {
                    $this->load->module('teams_phases');
                    $this->load->view('teams_phases/league_team_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players') && $second_bit==('')) {
                    $this->load->module('players');
                    $this->load->view('players/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players') && $second_bit==('add')) {
                    $this->load->module('players');
                    $this->load->view('players/add_player');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players') && $second_bit==('edit')) {
                    $this->load->module('players');
                    $this->load->view('players/edit_player');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players_phases') && $second_bit==('')) {
                    $this->load->module('players_phases');
                    $this->load->view('players_phases/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players_phases') && $second_bit==('league')) {
                    $this->load->module('players_phases');
                    $this->load->view('players_phases/league_player_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players_phases') && $second_bit==('add')) {
                    $this->load->module('players_phases');
                    $this->load->view('players_phases/add_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('players_phases') && $second_bit==('edit')) {
                    $this->load->module('players_phases');
                    $this->load->view('players_phases/edit_phase');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports_events') && $second_bit==('')) {
                    $this->load->module('sports_events');
                    $this->load->view('sports_events/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports_events') && $second_bit==('league')) {
                    $this->load->module('sports_events');
                    $this->load->view('sports_events/league_sport_event');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports_events') && $second_bit==('add')) {
                    $this->load->module('sports_events');
                    $this->load->view('sports_events/add_event');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('sports_events') && $second_bit==('edit')) {
                    $this->load->module('sports_events');
                    $this->load->view('sports_events/edit_event');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests') && $second_bit==('')) {
                    $this->load->module('contests');
                    $this->load->view('contests/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests') && $second_bit==('league')) {
                    $this->load->module('contests');
                    $this->load->view('contests/league_contest');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests') && $second_bit==('details')) {
                    $this->load->module('contests');
                    $this->load->view('contests/details');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests') && $second_bit==('add')) {
                    $this->load->module('contests');
                    $this->load->view('contests/add_contest');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests') && $second_bit==('edit')) {
                    $this->load->module('contests');
                    $this->load->view('contests/edit_contest');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('testing') && $second_bit==('add')) {
                    $this->load->module('testing');
                    $this->load->view('testing/add_contest');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests_entry') && $second_bit==('')) {
                    $this->load->module('contests_entry');
                    $this->load->view('contests_entry/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests_entry') && $second_bit==('league')) {
                    $this->load->module('contests_entry');
                    $this->load->view('contests_entry/league_contests_entry');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests_entry') && $second_bit==('details')) {
                    $this->load->module('contests_entry');
                    $this->load->view('contests_entry/details');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests_entry') && $second_bit==('add')) {
                    $this->load->module('contests_entry');
                    $this->load->view('contests_entry/add_contest_entry');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('contests_entry') && $second_bit==('roster')) {
                    $this->load->module('contests_entry');
                    $this->load->view('contests_entry/roster');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('games') && $second_bit==('')) {
                    $this->load->module('games');
                    $this->load->view('games/league_games');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('games') && $second_bit==('details')) {
                    $this->load->module('games');
                    $this->load->view('games/details');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('draft') && $second_bit==('add')) {
                    $this->load->module('draft');
                    $this->load->view('draft/add_contest_entry');
                } else {

                }
                ?>

            </div>
        </div>

        <div id="global-footer-wrapper">&nbsp;
        </div>

        <div id="global-footer">
            <div class="footer-links-block-1">
                <ul class="footer-links-about">
                    <li class="footer-title"><b>About</b></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>dsb/about/" title="About DSB">Daily Sport Boss</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>dsb/sponsor/" title="DSB Sponsoring Opportunities">Sponsor a Contest</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>dsb/careers/" title="DSB Career Opportunities">Careers</a></li>
                </ul>

                <ul class="footer-links-help">
                    <li class="footer-title"><b>Help</b></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>help/FAQ/" title="Frequently Asked Questions">FAQ</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>help/howtoplay/" title="Learn how DSB works">How To Play</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>help/rules/" title="DSB Rules &amp; Scoring">Rules &amp; Scoring</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>help/support/" title="Find support at DSB">Support</a></li>
                </ul>

                <ul class="footer-links-more">
                    <li class="footer-title"><b>More</b></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>info/partners/" title="Partners &amp; Affiliates">Partners &amp; Affiliates</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>info/termsofuse/" title="Terms of Use">Terms of Use</a></li>
                    <li class="footer-link"><a href="<?php echo base_url()?>info/privacy/" title="Privacy Policy">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-links-block-2">
                <ul class="footer-company-location">
                    <li class="footer-company-title"><b>PT Daily Sport Boss</b></li>
                    <li class="footer-company-subtitle">Jakarta, Indonesia</li>
                    <li class="footer-social-links"><a href="#" target="_blank">FACEBOOK</a></li>
                    <li class="footer-social-links"><a href="#" target="_blank">TWITTER</a></li>
                    <li class="footer-social-links"><a href="#" target="_blank">INSTAGRAM</a></li>
                </ul>
            </div>
        </div>

        </div>
    </body>
</html>