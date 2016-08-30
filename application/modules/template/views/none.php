<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 29/07/2016
 * Time: 10:56 AM
 */
?>

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

    <script src="//vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
</head>

<?php
$first_bit = $this->uri->segment(1);
$second_bit = $this->uri->segment(2);

if($first_bit==('help') && $second_bit==('videotest')) {
    $this->load->module('help');
    $this->load->view('help/videotest');
} else {

}
?>
