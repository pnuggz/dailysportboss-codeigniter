<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 27/04/2016
 * Time: 1:57 AM
 */
?>
<!-- Search for Users -->
<script type="text/javascript">
    function Search()
    {
        var SearchKeyWord=document.getElementById("SearchText").value;
        var SelLength=document.myform.user_id.length;
        for(var i=0; i<SelLength;i++)
        {
            var searched_text = document.myform.user_id.options[i].text;
            var IsMatch = searched_text.search(SearchKeyWord);
            if(IsMatch != -1)
            {
                document.myform.user_id.options[i].selected = true;
                document.myform.user_id.options[i].style.color = 'red';
            }
            else
            {
                document.myform.user_id.options[i].style.color = 'black';
            }
        }
    }
</script>

<!-- Search for Forwards -->
<script type="text/javascript">
    function Search_Forward()
    {
        var SearchKeyWord=document.getElementById("SearchForward").value;
        var SelLength=document.myform.search_forward.length;
        for(var i=0; i<SelLength;i++)
        {
            var searched_text = document.myform.search_forward.options[i].text;
            var IsMatch = searched_text.search(SearchKeyWord);
            if(IsMatch != -1)
            {
                document.myform.search_forward.options[i].selected = true;
                document.myform.search_forward.options[i].style.color = 'red';
            }
            else
            {
                document.myform.search_forward.options[i].style.color = 'black';
            }
        }
    }
</script>

<!-- Search for Midfielders -->
<script type="text/javascript">
    function Search_Midfielder()
    {
        var SearchKeyWord=document.getElementById("SearchMidfielder").value;
        var SelLength=document.myform.search_midfielder.length;
        for(var i=0; i<SelLength;i++)
        {
            var searched_text = document.myform.search_midfielder.options[i].text;
            var IsMatch = searched_text.search(SearchKeyWord);
            if(IsMatch != -1)
            {
                document.myform.search_midfielder.options[i].selected = true;
                document.myform.search_midfielder.options[i].style.color = 'red';
            }
            else
            {
                document.myform.search_midfielder.options[i].style.color = 'black';
            }
        }
    }
</script>

<!-- Search for Defenders -->
<script type="text/javascript">
    function Search_Defender()
    {
        var SearchKeyWord=document.getElementById("SearchDefender").value;
        var SelLength=document.myform.search_defender.length;
        for(var i=0; i<SelLength;i++)
        {
            var searched_text = document.myform.search_defender.options[i].text;
            var IsMatch = searched_text.search(SearchKeyWord);
            if(IsMatch != -1)
            {
                document.myform.search_defender.options[i].selected = true;
                document.myform.search_defender.options[i].style.color = 'red';
            }
            else
            {
                document.myform.search_defender.options[i].style.color = 'black';
            }
        }
    }
</script>

<!-- Forward Get and Display -->
<script type="text/javascript">
    $(function () {
        var url = $(location).attr('href')
        var segments = url.split( '/' );
        var contest = segments[6];
        var $players_forwards = $('#players_forwards');
        var baseurl = "<?php echo base_url(); ?>";
        $.ajax({
            type: "GET",
            url: baseurl+"index.php/contests_entry/get_players_forward/"+contest,
            dataType: "json",
            success: function(forwards) {
                $.each(forwards, function(i, forward){
                    $players_forwards.append('' +
                        '<option value="'+ forward.players_phases_id +'">' +
                        ''+ forward.first_name +'  '+ forward.last_name +'' +
                        '</option>')
                });
            }
        });

        $('#btn-add_forward').click(function(){
            if($('#players_forwards_selected option').size() > 1) {
                alert('You can only choose 2 forward!');
            } else {
                $('#players_forwards option:selected').each(function () {
                    $('#players_forwards_selected').append("<option selected value='" + $(this).val() + "'>" + $(this).text() + "</option>");
                    $(this).remove();
                });
            };
        });

        $('#btn-remove_forward').click(function(){
            $('#players_forwards_selected option:selected').each( function() {
                $('#players_forwards').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
    });
</script>

<!-- Midfielder Get and Display -->
<script type="text/javascript">
    $(function () {
        var url = $(location).attr('href')
        var segments = url.split( '/' );
        var contest = segments[6];
        var $players_midfielders = $('#players_midfielders');
        var baseurl = "<?php echo base_url(); ?>";
        $.ajax({
            type: "GET",
            url: baseurl+"index.php/contests_entry/get_players_midfielder/"+contest,
            dataType: "json",
            success: function(midfielders) {
                $.each(midfielders, function(i, midfielder){
                    $players_midfielders.append('' +
                        '<option value="'+ midfielder.players_phases_id +'">' +
                        ''+ midfielder.first_name +'  '+ midfielder.last_name +'' +
                        '</option>')
                });
            }
        });

        $('#btn-add_midfielder').click(function(){
            if($('#players_midfielders_selected option').size() > 3) {
                alert('You can only choose 4 midfielders!');
            } else {
                $('#players_midfielders option:selected').each(function () {
                    $('#players_midfielders_selected').append("<option selected value='" + $(this).val() + "'>" + $(this).text() + "</option>");
                    $(this).remove();
                });
            };
        });

        $('#btn-remove_midfielder').click(function(){
            $('#players_midfielders_selected option:selected').each( function() {
                $('#players_midfielders').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
    });
</script>

<!-- Defender Get and Display -->
<script type="text/javascript">
    $(function () {
        var url = $(location).attr('href')
        var segments = url.split( '/' );
        var contest = segments[6];
        var $players_defenders = $('#players_defenders');
        var baseurl = "<?php echo base_url(); ?>";
        $.ajax({
            type: "GET",
            url: baseurl+"index.php/contests_entry/get_players_defender/"+contest,
            dataType: "json",
            success: function(defenders) {
                $.each(defenders, function(i, defender){
                    $players_defenders.append('' +
                        '<option value="'+ defender.players_phases_id +'">' +
                        ''+ defender.first_name +'  '+ defender.last_name +'' +
                        '</option>')
                });
            }
        });

        $('#btn-add_defender').click(function(){
            if($('#players_defenders_selected option').size() > 3) {
                alert('You can only choose 4 defenders!');
            } else {
                $('#players_defenders option:selected').each(function () {
                    $('#players_defenders_selected').append("<option selected value='" + $(this).val() + "'>" + $(this).text() + "</option>");
                    $(this).remove();
                });
            };
        });

        $('#btn-remove_defender').click(function(){
            $('#players_defenders_selected option:selected').each( function() {
                $('#players_defenders').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
                $(this).remove();
            });
        });
    });
</script>


<h2>Add Contest Entry</h2>
<br />
<br />
<?php
$attributes = array('name' => 'myform');

echo form_open('contests_entry/add', $attributes);
?>
Contest Name
<br />
<?php foreach($contest_details->result() as $row){
    $contest_name = $row->contest_name;
    $contest_id = $row->id;
}
echo $contest_name;
$data = array('contest_id' => $contest_id
);
echo form_hidden($data);
?>
<br />
<br />


User Entry
<br />
<input type="text" name="SearchText" id="SearchText">
<input type="button" name="SearchButton" id="SearchButton" value="Search" OnClick="Search();">
<br />
<select name="user_id">
    <option value="" disabled selected>Select Username</option>
    <?php
    foreach($users_id->result() as $row) {
        $users_id = $row->id;
        $username = $row->username;
        ?>
        <option value="<?php echo $users_id; ?>"><?php echo $username; ?></option>
    <?php } ?>
</select>
<br />
<br />
<?php
echo "Roster Name";
echo "<br />";
$data = array(  'name'          =>      'roster_name',
    'value'         =>      set_value('roster_name'),
);
echo form_input($data);
echo "<br /><br />";

echo "<h2>Contest Roster</h2>";
echo "<br />";
?>

Select Forward
<br />
<input type="text" name="SearchForward" id="SearchForward">
<input type="button" name="SearchButton" id="SearchButton" value="Search" OnClick="Search_Forward();">
<br/><br/>
<fieldset>
    <select name="search_forward" id="players_forwards" multiple size="25" style="width:500px">
    </select>

    <a href="JavaScript:void(0);" id="btn-add_forward">Add &raquo;</a>
    <a href="JavaScript:void(0);" id="btn-remove_forward">&laquo; Remove</a>


    <select name="forwards[]" id="players_forwards_selected" multiple size="2" style="width:500px">
    </select>

</fieldset>
<br /><br />

Select Midfielder
<br />
<input type="text" name="SearchMidfielder" id="SearchMidfielder">
<input type="button" name="SearchButton" id="SearchButton" value="Search" OnClick="Search_Midfielder();">
<br/><br/>
<fieldset>
    <select name="search_midfielder" id="players_midfielders" multiple size="25" style="width:500px">
    </select>

    <a href="JavaScript:void(0);" id="btn-add_midfielder">Add &raquo;</a>
    <a href="JavaScript:void(0);" id="btn-remove_midfielder">&laquo; Remove</a>


    <select name="midfielders[]" id="players_midfielders_selected" multiple size="3" style="width:500px">
    </select>

</fieldset>
<br /><br />


Select Defender
<br />
<input type="text" name="SearchDefender" id="SearchDefender">
<input type="button" name="SearchButton" id="SearchButton" value="Search" OnClick="Search_Defender();">
<br/><br/>
<fieldset>
    <select name="search_defender" id="players_defenders" multiple size="25" style="width:500px">
    </select>

    <a href="JavaScript:void(0);" id="btn-add_defender">Add &raquo;</a>
    <a href="JavaScript:void(0);" id="btn-remove_defender">&laquo; Remove</a>


    <select name="defenders[]" id="players_defenders_selected" multiple size="3" style="width:500px">
    </select>

</fieldset>
<br /><br />

<?php
$data = array(  'value'         =>      'Add Contest Entry',
'name'          =>      'submit',
'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>