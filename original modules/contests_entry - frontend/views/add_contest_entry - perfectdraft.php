<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 27/04/2016
 * Time: 1:57 AM
 */
?>

<script src="<?php echo base_url(); ?>js/paginate.js"></script>
<script src="<?php echo base_url(); ?>js/underscore.js"></script>

<style>
    #playerList {
        padding: 10px;
        width: 300px;
        border: 1px solid #333;
        background: #eee;
    }

    #lineupSelected {
        padding: 10px;
        width: 300px;
        border: 1px solid #333;
        background: #eee;
        float: right;
    }

    li {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
    }

    .selected {
        background-color: green;
    }
</style>


<h1>Trial</h1>
    <p class="loading">Loading...</p>
<div class="posts">

</div>



<div class="pageLinks">
    <a class='previousLink' href="#">Previous</a>
    <ul>
    </ul>
    <a class='nextLink' href="#">Next</a>
</div>

<script type="text/template" id="postTemplate">
    <% _.each(posts, function(post) { %>
        <div>
            <h2><%= post.postTitle %></h2>
            <p><%= post.postContent %></p>
        </div>
    <% }); %>
</script>


<hr/>
<ul>
    <li id="selectableList" class="parent" gid="2">2</li>
    <li id="selectableList" class="parent" gid="3">3</li>
    <li id="selectableList" class="parent" gid="4">4</li>
</ul>

<ul>
    <li class="childList" gid="2">2.1</li>
    <li class="childList" gid="2">2.2</li>
    <li class="childList" gid="2">2.3</li>
    <li class="childList" gid="3">3.1</li>
    <li class="childList" gid="3">3.2</li>
    <li class="childList" gid="3">3.3</li>
    <li class="childList" gid="4">4.1</li>
</ul>

    <script type="text/javascript">
        $(function () {
            $('.parent').on('click', function () {
                $(this).siblings().removeClass('selected')
                $(this).select().toggleClass('selected')

                var gid = $(this).select().attr('gid')
                if ($(this).select().attr('class') == 'parent selected') {
                    $('.childList').show()
                    $('.childList').not('[gid="' + gid + '"]').hide()
                } else {
                    $('.childList').show()
                }
            })
        })
    </script>

<hr/>

<input type="text" id="search" placeholder="Player Search">
<div id="playerList">
</div>

<div id="lineupSelected">
</div>



<script type="text/javascript">
    $(function() {

        $("#search").keyup(function() {
            var val = $.trim(this.value).toUpperCase();
            if (val === "")
                $(".players").show();
            else {
                $(".players").hide();
                var result = $("#playerList .players").filter(function(){
                    return -1 != $(this).text().toUpperCase().indexOf(val);
                }).show();
                console.log(result)
                $(".players").eq(result).show();
            }
        });
    });

    $(function () {
        const url = $(location).attr('href')
        const segments = url.split( '/' );
        const contest = segments[6];
        const $playerList = $('#playerList');
        const baseurl = "<?php echo base_url(); ?>";
        const lists = {
            playerList: document.getElementById('playerList'),
            lineupSelected: document.getElementById('lineupSelected')
        }

        // Get Player List
        $.ajax({
            type: "GET",
            url: baseurl+"index.php/contests_entry/get_players_defender/"+contest,
            dataType: "json",
            success: function(defenders) {
                $.each(defenders, function(i, defender){
                    const el = document.createElement('div')
                    el.classList = 'players'
                    el.setAttribute('pid', defender.players_phases_id)
                    const a = document.createElement('a')
                    a.classList = 'swap'
                    const first_name = document.createTextNode(defender.first_name)
                    const last_name = document.createTextNode(defender.last_name)
                    const space = document.createTextNode(' ');

                    a.href = 'JavaScript:void(0);'
                    a.appendChild(first_name)
                    a.appendChild(space)
                    a.appendChild(last_name)

                    el.appendChild(a)

                    $playerList.append(el)
                });
            $('a.swap').on('click', onClick)
            }
        });

        // What happens when you click the item

        const onClick = function(event) {
            const $lineupSelected = $('#lineupSelected');
            const count = $lineupSelected[0].childElementCount
            const task = event.target.parentElement
            const list = task.parentElement.id
            if(count > 3  &&  list === 'playerList') {
                alert('You can only choose 4 midfielders!');
            } else {
                lists[list === 'lineupSelected' ? 'playerList' : 'lineupSelected'].appendChild(task)
            }
            document.getElementById("search").value = '';
            $(".players").show()
        }
    } () )

    const $players = $(".players")

//        window.onbeforeunload = function ()
//        {
//            return "Your team have not been submitted. Any changes will be lost.";
//        };
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