<html>
    <head>
        <title>DailyFantasy - CMS</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/cmslayout.css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<!--         DataTables Codes-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11,r-2.0.2,rr-1.1.1/datatables.min.js"></script>


    </head>
    <body class="body">
        <div class="navbar">
            <div class="brand">
                <a href="<?php echo base_url() ?>cmshome/">DailyFantasy</a>
            </div>
            <div class="home-btn">
                <a href="<?php echo base_url() ?>cmshome/">Dashboard</a>
            </div>
            <?php if($this->session->userdata('logged_in')) : ?>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>sports/">Sports</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>leagues/">Leagues</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>teams/">Teams</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>teams_phases/">T.Phases</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>players/">Players</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>players_phases/">P.Phases</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>sports_events/">S.Events</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>contests/">Contests</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>contests_entry/">C.Entry</a>
                </div>
                <div class="list-btn">
                    <a href="<?php echo base_url() ?>games/">Games</a>
                </div>
            <?php endif; ?>
            <div class="register-btn">
                <?php
                    if($this->session->userdata('logged_in')) : ?>
                       <?php $this->load->module('cmshome'); $this->load->view('users/loginform'); ?>
                    <?php else : ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="container">
            <div class="sidebar">
                <?php
               if($this->session->userdata('logged_in')) {

                } else {
                    $this->load->module('users');
                    $this->load->view('users/loginform');
                }
                ?>

            </div>
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
                    $this->load->view('games/manage');
                } else {

                }
                ?>
                <?php
                $first_bit = $this->uri->segment(1);
                $second_bit = $this->uri->segment(2);

                if($first_bit==('games') && $second_bit==('league')) {
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

            </div>
        </div>
    </body>
</html>
