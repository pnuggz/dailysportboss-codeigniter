<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 4:45 PM
 */
?>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><select name="field_name[]">' +
            '<option value="" disabled selected>Select Game</option>' +
            '<?php foreach($events_lists->result() as $row) { $sports_events_id = $row->sports_events_id; $sports_events_start_date = $row->sports_events_start_date; $sports_events_start_time = $row->sports_events_start_time; $home_team_shorthand = $row->home_team_shorthand; $away_team_shorthand = $row->away_team_shorthand; ?>' +
            '<option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>' +
            '<?php } ?>' +
            '</select>' +
            '<a href="javascript:void(0);" class="remove_button" title="Remove field">  Remove</a></div>'
        '</div<'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    $(document).ready(function() {

        $('#btn-add').click(function(){
            $('#select-from option:selected').each( function() {
                $('#select-to').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
        $('#btn-remove').click(function(){
            $('#select-to option:selected').each( function() {
                $('#select-from').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });

    });
</script>

<table id="datatable">
    <thead>
    <tr>
        <th></th>
    </tr>
    </thead>
</table>


<h1>Add New Contest</h1>

<?php
echo validation_errors("<p style='color: red;'>", "</p>");
?>

<?php
echo form_open('contests/add/');
?>

<?php
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

echo "Contest Name";
echo "<br>";
$data = array(  'name'          =>      'contest_name',
    'value'         =>      set_value('contest_name'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Start Date";
echo "<br>";
?> <input type="date" name="start_date"> <?php
echo "<br>";
echo "<br>";

echo "Start Time";
echo "<br>";
?> <input type="time" name="start_time"> <?php
echo "<br>";
echo "<br>";

echo "Entry Size";
echo "<br>";
$data = array(  'name'          =>      'entry_max',
    'value'         =>      set_value('entry_max'),
);
echo form_input($data);
echo "<br>";
echo "<br>";

echo "Game";
echo "<br>";
?>
<div class="field_wrapper">
    <div>
        <select name="field_name[]">
            <option value="" disabled selected>Select Game</option>
            <?php
            foreach($events_lists->result() as $row) {
                $sports_events_id = $row->sports_events_id;
                $sports_events_start_date = $row->sports_events_start_date;
                $sports_events_start_time = $row->sports_events_start_time;
                $home_team_shorthand = $row->home_team_shorthand;
                $away_team_shorthand = $row->away_team_shorthand;
                ?>
                <option value="<?php echo $sports_events_id; ?>"><?php echo $home_team_shorthand; ?> v <?php echo $away_team_shorthand; ?> - <?php echo $sports_events_start_date; ?>  <?php echo $sports_events_start_time; ?></option>
            <?php } ?>
        </select>
        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
    </div>
</div>
<?php
echo "<br>";
echo "<br>";

$data = array(  'value'         =>      'Add Contest',
    'name'          =>      'submit',
    'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
