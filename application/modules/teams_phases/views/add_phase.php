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
<h1>Set New Team Phase</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('teams_phases/add/');
?>

<?php
echo "<br>";
echo "<br>";

echo "Sport Type";
echo "<br>";
foreach ($sports_list->result() as $row) {
    $sport_id = $row->id;
    $sport_name = $row->sport_name;

    echo $sport_name;

    $data = array('sports_id' => $sport_id
    );
    echo form_hidden($data);
}

echo "<br>";
echo "<br>";

echo "League Name";
echo "<br>";
foreach ($leagues_list->result() as $row) {
    $league_id = $row->id;
    $league_name = $row->league_name;

    echo $league_name;

    $data = array('leagues_id' => $league_id
    );
    echo form_hidden($data);
}

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
        <option value="<?php echo $team_id; ?>"><?php echo $team_name; ?></option>
    <?php } ?>
</select>
<?php
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "End Date";
echo "<br>";
?> <input type="date" name="end_date"> <?php
echo "<br>";
echo "<br>";

echo "Stadium Name";
echo "<br>";
$data = array(  'name'          =>      'stadium_name',
    'value'         =>      set_value('stadium_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Stadium City";
echo "<br>";
$data = array(  'name'          =>      'stadium_city',
    'value'         =>      set_value('stadium_city'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Stadium Country";
echo "<br>";
$data = array(  'name'          =>      'stadium_country',
    'value'         =>      set_value('stadium_country'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Set Team Phase',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
