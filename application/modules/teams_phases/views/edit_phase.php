<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 20/04/2016
 * Time: 6:02 PM
 */
?>
<!--
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url();?>";
    </script>
</head>


<script>
$('#leagues_id).hide();
$('#sports_id').change(function(){
    var sports_id = $('#sports_id').val();
    if (sports_id != ""){
        var post_url = BASE_URL + sports_id;
        $.ajax({
            type: "POST",
            url: post_url,
            success: function(sports) //we're calling the response json array 'cities'
            {
            $('#leagues_id').empty();
            $('#leagues_id').show();
                $.each(sports,function(id,sport_name)
                {
                    var opt = $('<option />'); // here we're creating a new select option for each group
                        opt.val(id);
                        opt.text(sport_name);
                        $('#leagues_id').append(opt);
                });
            } //end success
        }); //end AJAX
    } else {
        $('#leagues_id').empty();
        $('#leagues_id').hide();
    }//end if
}); //end change
</script>

<select id="sports_id" name="sports_id">
    <option value="" disabled selected>Select Sport</option>
    <?php foreach($sports_list->result() as $row) {
    $sport_id = $row->id;
    $sport_name = $row->sport_name;
    ?>
    <option value="<?php echo $sport_id; ?>"><?php echo $sport_name; ?></option>;
    <?php } ?>
</select>

<select id="leagues_id" name="leagues_id">
    <option value=""></option>
</select>
 -->



<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 19/04/2016
 * Time: 10:04 PM
 */
?>

<?php
foreach($team_phase->result() as $row) {
$id = $row->id;
$start_date = $row->start_date;
$end_date = $row->end_date;
$stadium_name = $row->stadium_name;
$stadium_city = $row->stadium_city;
$stadium_country = $row->stadium_country;
?>

<h1>Edit Team Phase</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('teams_phases/edit/'.$id.'/');

echo "<br>";
echo "<br>";

echo "Sport Type";
echo "<br>";
?>
<select name="sports_id">
    <option value="" disabled selected>Select Sport</option>
    <?php
    foreach($sports_list->result() as $row) {
        $sport_id = $row->id;
        $sport_name = $row->sport_name;
        ?>
    <?php foreach($sport_selected->result() as $row) {
        $sports_selected_id = $row->sports_id; ?>
        <option <?php if($sports_selected_id == $sport_id) { echo 'selected'; } ?> value="<?php echo $sport_id; ?>"><?php echo $sport_name; ?></option>
    <?php } } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "League Name";
echo "<br>";
?>
<select name="leagues_id">
    <option value="" disabled selected>Select League</option>
    <?php
    foreach($leagues_list->result() as $row) {
        $league_id = $row->id;
        $league_name = $row->league_name;
        ?>
    <?php foreach($league_selected->result() as $row) {
        $leagues_selected_id = $row->leagues_id; ?>
        <option <?php if($leagues_selected_id == $league_id) { echo 'selected'; } ?> value="<?php echo $league_id; ?>"><?php echo $league_name; ?></option>
    <?php } } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "Team Name";
echo "<br>";
?>
<select name="teams_id">
    <option value="" disabled selected>Select Team</option>
    <?php
    foreach($teams_list->result() as $row) {
        $team_id = $row->id;
        $team_name = $row->team_name;
        ?>
    <?php foreach($team_selected->result() as $row) {
        $teams_selected_id = $row->teams_id; ?>
        <option <?php if($teams_selected_id == $team_id) { echo 'selected'; } ?> value="<?php echo $team_id; ?>"><?php echo $team_name; ?></option>
    <?php } } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input value="<?php echo $start_date; ?>" type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "End Date";
echo "<br>";
?> <input value="<?php echo $end_date; ?>" type="date" name="end_date"> <?php
echo "<br>";
echo "<br>";

echo "Stadium Name";
echo "<br>";
$data = array(  'name'          =>      'stadium_name',
    'value'         =>      $stadium_name,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Stadium City";
echo "<br>";
$data = array(  'name'          =>      'stadium_city',
    'value'         =>      $stadium_city,
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Stadium Country";
echo "<br>";
$data = array(  'name'          =>      'stadium_country',
    'value'         =>      $stadium_country,
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Edit Team Phase',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
<?php } ?>
