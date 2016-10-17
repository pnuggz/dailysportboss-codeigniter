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
    <script src="<?php echo base_url(); ?>js/about.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/subscribe.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/aboutlayout.css">
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
