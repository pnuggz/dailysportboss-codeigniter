<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 4:45 PM
 */
?>

<script type="text/javascript">
    $(function () {

        var $sports_events = $('#sports_events');
        var baseurl = "<?php echo base_url(); ?>";
        $.ajax({
            type: "POST",
            url: baseurl+"index.php/testing/get_games"+contest,
            dataType: "json",
            success: function(sports_events) {
                $.each(sports_events, function(i, sports_event){
                    $sports_events.append('' +
                        '<option value="'+ sports_event.sports_events_id +'">'+ sports_event.home_team_shorthand +'  ' +
                        'v '+ sports_event.away_team_shorthand +' - '+ sports_event.sports_events_start_date +'' +
                        '  '+ sports_event.sports_events_start_time +'</option>')
                });
            }
        });

        $.each(forwards, function(i, forward){
            $players_forwards.append('' +
                '<option value="'+ forward.players_phases_id +'">' +
                ''+ forward.first_name +''+ forward.last_name +'' +
                '</option>')
        });
        
        $('#btn-add').click(function(){
            if($('#sports_events_forward option').size() > 1) {
                alert('You can only choose 2 forward!');
            } else {
                $('#sports_events option:selected').each(function () {
                    $('#sports_events_forward').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
                    $(this).remove();
                });
            };
        });

        $('#btn-remove').click(function(){
            $('#sports_events_forward option:selected').each( function() {
                $('#sports_events').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
    });
</script>

<fieldset>

    <select name="" id="sports_events" multiple size="25">
    </select>

    <a href="JavaScript:void(0);" id="btn-add">Add &raquo;</a>
    <a href="JavaScript:void(0);" id="btn-remove">&laquo; Remove</a>

    <select name="forward" id="sports_events_forward" multiple size="5">
    </select>

</fieldset>

<br /><br /><br /><br /><br /><br /><br />

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

<table>
    <thead>
        <tr>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>

    <tbody>

    </tbody>
        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
</table>
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
