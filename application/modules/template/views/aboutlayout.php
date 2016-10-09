<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 7/10/2016
 * Time: 10:53 AM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daily Sport Boss</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/aboutlayout.css">
<!--    <link rel="stylesheet" href="stylesheets/main.css">-->
<!--    <link rel="stylesheet" href="stylesheets/header.css">-->
<!--    <link rel="stylesheet" href="stylesheets/footer.css">-->
<!--    <link rel="stylesheet" href="stylesheets/home.css">-->
<!--    <link rel="stylesheet" href="stylesheets/help.css">-->
<!--    <link rel="stylesheet" href="stylesheets/rules.css">-->
<!--    <link rel="stylesheet" href="stylesheets/dbs.css">-->
<!--    <link rel="stylesheet" href="stylesheets/sponsor.css">-->
<!--    <link rel="stylesheet" href="stylesheets/support.css">-->
<!--    <link rel="stylesheet" href="stylesheets/career.css">-->
<!--    <link rel="stylesheet" href="stylesheets/partner.css">-->
<!--    <link rel="stylesheet" href="stylesheets/privacy.css">-->
<!--    <link rel="stylesheet" href="stylesheets/termsofuse.css">-->
<!--    <link rel="stylesheet" href="stylesheets/login.css">-->
<!--    <link rel="stylesheet" href="stylesheets/signup.css">-->
<!--    <link rel="stylesheet" href="stylesheets/faq.css">-->
<!--    <link rel="stylesheet" href="stylesheets/howtoplay.css">-->
    <script src="/node_modules/angular/angular.js"></script>

</head>

<?php
$first_bit = $this->uri->segment(1);
$second_bit = $this->uri->segment(2);

if($first_bit==('about') && $second_bit==('dsb')) {
    $this->load->module('about');
    $this->load->view('about/dsb');
} else {

}
?>

<?php
$first_bit = $this->uri->segment(1);
$second_bit = $this->uri->segment(2);

if($first_bit==('about') && $second_bit==('partnership')) {
    $this->load->module('about');
    $this->load->view('about/partnership');
} else {

}
?>

</html>
