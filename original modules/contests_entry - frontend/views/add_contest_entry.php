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
    #loading {
        width: 100%;
        height: 500px;
        text-align: center;
        line-height: 500px;
    }

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

    .eventFilter {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
    }

    .posFilter {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
    }

    .selected {
        background-color: green;
    }

    #draftPanel {
        background-color: #000000;
        width: 600px;
        height: 500px;
        overflow: scroll;
        float: left;
        color: white;
    }

    #draftPanel a:link {
        color: white;
    }

    #draftPanel a:visited {
        color: white;
    }

    #draftTeam {
        background-color: #000000;
        width: 600px;
        float: right;
        color: white;
    }

    #draftTeamDef {
        background-color: #000000;
        width: 600px;
        min-height: 120px;
        float: right;
        color: white;
    }

    #draftTeamMid {
        background-color: #000000;
        width: 600px;
        min-height: 120px;
        float: right;
        color: white;
    }

    #draftTeamFor {
        background-color: #000000;
        width: 600px;
        min-height: 60px;
        float: right;
        color: white;
    }

    #draftContainer {
        width: 100%;
        height: 500px;
    }

    .c0 {
        float: left;
        width: 60px;
    }

    .c1 {
        float: left;
        width: 200px;
    }

    .c2 {
        float: left;
        width: 100px;
    }

    .headerc0 {
        float: left;
        width: 60px;
    }

    .headerc1 {
        float: left;
        width: 200px;
    }

    .headerc2 {
        float: left;
        width: 100px;
    }

    .scoring {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
        margin-left: 200px;
        background-color: grey;
    }

    .playerDraft {
        padding: 5px 0px 5px 0px;
    }

    .playerDraft.odd {
        background-color: black;
        padding: 5px 0px 5px 0px;
    }

    .playerDraft.even {
        background-color: dimgrey;
        padding: 5px 0px 5px 0px;
    }

    .closeScoringDiv {
        float: right;
        margin-right: 10px;
        cursor: pointer;
    }

    #draftPanelHeader {
        background-color: #000000;
        width: 600px;
        float: left;
        color: white;
        cursor: pointer;
    }

</style>

<div id="loading"><h2>Loading...</h2></div>

<div id="draftPage">

    <div id="hiddenTempEvent"></div>
<h1>Draft Page</h1>
<h3>Games</h3>

<div class="gameFilter">
<ul>
</ul>
</div>

<br>
<div id="draftContainer">
<input type="text" id="search" placeholder="Player Search">
<br/><br/>
<div class="posFilterContainer">
    <ul>
        <li class="posFilter" pos="Defender">DEF</li>
        <li class="posFilter" pos="Midfielder">MID</li>
        <li class="posFilter" pos="Forward">FOR</li>
        <li class="scoring">Scoring</li>
    </ul>
</div>

<div id="draftPanelHeader">
    <div class="headerc0">Pos</div>
    <div class="headerc1">Name</div>
    <div class="headerc2">Team</div>
</div>
    <br/>
<div id="draftPanel">
</div>

<div class="scoringDiv">
    <div class="closeScoringDiv">Close</div>
    <br>
    <p>Players will accumulate fantasy points as follows:</p>
    <ul>
        <li class="scoringList">Goal (G): 5pts</li>
        <li class="scoringList">Assist (A): 6pts</li>
        <li class="scoringList">Key Pass (KP): 1pt</li>
        <li class="scoringList">Tackle (T): 0.4pts</li>
        <li class="scoringList">Interception (I): 0.4pts</li>
        <li class="scoringList">Clearance (CL): 0.5pts</li>
        <li class="scoringList">Passes (P): 0.02pts</li>
        <li class="scoringList">Crosses (C): 0.4pts</li>
        <li class="scoringList">Accurate Crosses (AC): 1pts</li>
    </ul>
</div>

<div id="draftTeamDef">
</div>
<div id="draftTeamMid">
</div>
<div id="draftTeamFor">
</div>
</div>
</div>
<br>

<script type="text/javascript">
    //wait for ajax to load before showing page
    $(document).ajaxStop(function () {
        $('#loading').hide()
        $('#draftPage').show()
        $('.scoringDiv').hide()
    });

    //wait for ajax to load before showing page
    $(document).ajaxStart(function () {
        $('#loading').show()
        $('#draftPage').hide()
    });

    //page function -- document.ready
    $(function () {
        $('#draftPanel').find('.scoringDiv').appendTo('body')
        $('.scoringDiv').hide()
        $('#draftPanelHeader').show()
        const url = $(location).attr('href')
        const segments = url.split('/');
        const contest = segments[6];
        const $gameFilter = $('.gameFilter');
        const baseurl = "<?php echo base_url(); ?>";

        var events = null;

//        function ajaxEventCallBack(retString) {
//            events = retString;
//            $.each(events, function (i, event) {
//                $('#hiddenTempEvent').append('<div tidh="' + event.team_id_home + 'ti')
//            })
//        }

        // Get Events and appends to the list of events
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/contests_entry/get_events/" + contest,
            dataType: "json",
            success: function (events) {
                $.each(events, function (i, event) {
                    $gameFilter.find('ul').append('<li class="eventFilter" tidh="' + event.team_id_home + '" tida="'
                        + event.team_id_away + '">' + event.team_name_away + '@ <br>' + event.team_name_home +
                        '<br/><br/>' + event.start_date + '  ' + event.start_time)
                });

                //assigns an onclick function on the list of events
                $('.eventFilter').on('click', onClickEvent)
            }
        })

        // Get Player List
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/contests_entry/get_players/" + contest,
            dataType: "json",
            success: function (players) {
                $.each(players, function (i, player) {
                    $('#draftPanel').append('' +
                        '<div class="playerDraft" tid="' + player.team_phase_id + '" ' +
                        'pid ="' +player.player_phase_id+ '">' +
                        '<div class="c0" pos="' + player.pos + '">' +
                        (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
                        '</div>' +
                        '<div class="c1">' + player.first_name + ' ' + player.last_name + '</div>' +
                        '<div class="c2">' + player.team_shorthand +
                        '</div>' +
                        '<a class="draft" href="JavaScript:void(0);">DRAFT</a>' +
                        '</div>')
//                    if($('#draftPanel').index($('.playerDraft')) === 1) {
//                        $('.playerDraft').attr('class', 'odd')
//
                });

                //assigns an onclick function on the list of events
                $('a.draft').on('click', onClickDraft)

                //triggers the initial sorting of players -- in future will initially be by salary instead
                $('.headerc1').triggerHandler('click')
            }
        });

        //onclick function to filter the players based by events
        const onClickEvent = function () {
            $('#draftPanel').find('.scoringDiv').appendTo('body')
            $('.scoringDiv').hide()
            $('#draftPanelHeader').show()
            document.getElementById("search").value = ''
            $('.posFilter').removeClass('selected')
            $(this).siblings().removeClass('selected')
            $(this).select().toggleClass('selected')

            const tidh = $(this).select().attr('tidh')
            const tida = $(this).select().attr('tida')
            if ($(this).select().attr('class') == 'eventFilter selected') {
//                        var $parentElmClass = $('.playerDraft').parent().attr('class')
                $('#draftPanel').find('.playerDraft').show()
                $('#draftPanel').find('.playerDraft').not('[tid="' + tida + '"],[tid="' + tidh + '"]').hide()
            } else {
                $('#draftPanel').find('.playerDraft').show()
            }
        }

        //onclick function to draft player from #draftPanel to #draftTeam
        const onClickDraft = function (event) {
            const $draftTeamDef = $('#draftTeamDef');
            const $draftTeamMid = $('#draftTeamMid');
            const $draftTeamFor = $('#draftTeamFor');
            const countDef = $draftTeamDef[0].childElementCount
            const countMid = $draftTeamMid[0].childElementCount
            const countFor = $draftTeamFor[0].childElementCount
            const task = event.target.parentElement
            const list = task.parentElement.id
            const pid = $(this).attr('pid')
            const playerPos = $(this).siblings(".c0").html()
            const posFilterSelected = $('.posFilter.selected').html()
            const lists = {
                draftPanel: document.getElementById('draftPanel'),
                draftTeamDef: document.getElementById('draftTeamDef'),
                draftTeamMid: document.getElementById('draftTeamMid'),
                draftTeamFor: document.getElementById('draftTeamFor')
            }

            //if selected player is defender
            if (playerPos == 'DEF') {
                //initial limit for number of defenders: 4
                if (countDef > 3 && list === 'draftPanel' && playerPos == 'DEF') {
                    alert('You can only choose 4 DEFENDERS!');
                } else {
                    lists[list === 'draftTeamDef' ? 'draftPanel' : 'draftTeamDef'].appendChild(task)

                    //to ensure player is not added if a different position filter is selected
                    if (typeof posFilterSelected == 'undefined' && list === 'draftTeamDef') {

                    } else if (playerPos != posFilterSelected && list === 'draftTeamDef') {
                        $(this).parent().hide()
                    }

                    //changes the onclick link text
                    if ($(this).closest('[id]').attr('id') == 'draftTeamDef') {
                        $(this).html('REMOVE')
                    } else {
                        $(this).html('DRAFT')
                    }
                }
                //if selected player is midfielder
            } else if (playerPos == 'MID') {
                //initial limit for number of midfielders: 4
                if (countMid > 3 && list === 'draftPanel' && playerPos == 'MID') {
                    alert('You can only choose 10 MIDFIELDERS!');
                } else {
                    lists[list === 'draftTeamMid' ? 'draftPanel' : 'draftTeamMid'].appendChild(task)

                    //to ensure player is not added if a different position filter is selected
                    if (typeof posFilterSelected == 'undefined' && list === 'draftTeamMid') {

                    } else if (playerPos != posFilterSelected && list === 'draftTeamMid') {
                        $(this).parent().hide()
                    }

                    //changes the onclick link text
                    if ($(this).closest('[id]').attr('id') == 'draftTeamMid') {
                        $(this).html('REMOVE')
                    } else {
                        $(this).html('DRAFT')
                    }
                }
                //if selected player is forward
            } else if (playerPos == 'FOR') {
                //initial limit for number of forwards: 2
                if (countFor > 1 && list === 'draftPanel' && playerPos == 'FOR') {
                    alert('You can only choose 2 FORWARDS!');
                } else {
                    lists[list === 'draftTeamFor' ? 'draftPanel' : 'draftTeamFor'].appendChild(task)

                    //to ensure player is not added if a different position filter is selected
                    if (typeof posFilterSelected == 'undefined' && list === 'draftTeamFor') {

                    } else if (playerPos != posFilterSelected && list === 'draftTeamFor') {
                        $(this).parent().hide()
                    }

                    //changes the onclick link text
                    if ($(this).closest('[id]').attr('id') == 'draftTeamFor') {
                        $(this).html('REMOVE')
                    } else {
                        $(this).html('DRAFT')
                    }
                }
            }

            //re-sort the draftPanel after player is added back - depending on how the panel is sorted
            if ($('.headerc1').hasClass('selected') == true) {
                sortByName()
            } else if ($('.headerc2').hasClass('selected') == true) {
                sortByTeam()
            }

            //clears the search placeholder if used to draft a player
            if (document.getElementById("search").value == '') {

            } else {
                document.getElementById("search").value = '';
                $(".playerDraft").show()
            }
        }

        //onclick function to filter the players based on position
        $('.posFilter').on('click', function () {

            //initial preparation for the filter
            $('#draftPanel').find('.scoringDiv').appendTo('body') //hides the scoring info to the body
            $('.scoringDiv').hide() //hides the scoring info in the body
            $('#draftPanelHeader').show() //shows the headers if the scoring info is shown instead
            document.getElementById("search").value = '' //sets the search placeholder value as empty
            $(this).siblings().removeClass('selected') //removes sibling class if another position is selected
            $(this).select().toggleClass('selected')
            var pos = $(this).select().attr('pos')
            var tidh = $("[class='eventFilter selected']").attr('tidh')
            var tida = $("[class='eventFilter selected']").attr('tida')

            //checks to see if the event filter is selected before assigning the the position filter
            if ($('.eventFilter').hasClass('selected') === true) {
                if ($(this).select().attr('class') == 'posFilter selected') {
                    $('#draftPanel').find('.playerDraft').show()
                    $('#draftPanel').find('.playerDraft').not('[tid="' + tida + '"],[tid="' + tidh + '"]').hide()
                    $('#draftPanel').find('.c0').not('[pos="' + pos + '"]').closest('.playerDraft').hide()
                } else {
                    $('#draftPanel').find('.playerDraft').show()
                    $('#draftPanel').find('.playerDraft').not('[tid="' + tida + '"],[tid="' + tidh + '"]').hide()
                }
            } else {
                if ($(this).select().attr('class') == 'posFilter selected') {
                    $('#draftPanel').find('.playerDraft').show()
                    $('#draftPanel').find('.c0').not('[pos="' + pos + '"]').closest('.playerDraft').hide()
                } else {
                    $('#draftPanel').find('.playerDraft').show()
                }
            }
        })

        //function to open the scoring info panel - on click
        $('.scoring').on('click', function () {
            //preparation to display the scoring info panel
            document.getElementById("search").value = ''
            $('.posFilter').removeClass('selected')
            $('.eventFilter').removeClass('selected')
            $(this).select().addClass('selected')

            if ($(this).hasClass('selected') === true) {
                $('#draftPanel').find('.playerDraft').hide()
                $('#draftPanelHeader').hide()
                $('.scoringDiv').appendTo('#draftPanel')
                $('.scoringDiv').show()
            }
        })

        //function to close the scoring info panel - on click
        $('.closeScoringDiv').on('click', function () {
            $('#draftPanel').find('.playerDraft').show()
            $('#draftPanelHeader').show()
            $('.scoringDiv').appendTo('body')
            $('.scoringDiv').hide()
            $('.scoring').removeClass('selected')
        })

        //player search function
        $(function () {
            $("#search").keyup(function () {
                var val = $.trim(this.value).toUpperCase();
                if (val === "")
                    $(".playerDraft").show();
                else {
                    //prepares the draftPanel
                    $('#draftPanel').find('.scoringDiv').appendTo('body')
                    $('.scoringDiv').hide()
                    $('#draftPanelHeader').show()
                    $('.eventFilter').removeClass('selected')
                    $('.posFilter').removeClass('selected')
                    $('#draftPanel').find(".playerDraft").hide();

                    //matches the player to letter input
                    var result = $("#draftPanel .playerDraft").filter(function () {
                        return -1 != $(this).text().toUpperCase().indexOf(val);
                    }).show();
                    $(".playerDraft").eq(result).show();
                }
            });
        });

        //sort header by name - callback function
        var sortByName = function () {
            $('.headerc1').addClass('selected')
            var sortbyname = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ($.trim($(a).find(".c1").text()) < $.trim($(b).find(".c1").text())) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyname);

            //because callback, the click event has to be turned off before assigning to the link
            $('a.draft').off('click').on('click', onClickDraft)
        }

        //sort header by team - callback function
        var sortByTeam = function () {
            $('.headerc2').addClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ($.trim($(a).find(".c2").text()) < $.trim($(b).find(".c2").text())) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
//            $( ".playerDraft" ).removeClass('even')
//            $( ".playerDraft" ).removeClass('odd')
//            $( ".playerDraft" ).filter( ":even" ).addClass('even');
//            $( ".playerDraft" ).filter( ":odd" ).addClass('odd');

            //because callback, the click event has to be turned off before assigning to the link
            $('a.draft').off('click').on('click', onClickDraft)
        }


        //sort header by name - on click
        $('.headerc1').on('click', function () {
            $(this).addClass('selected')
            $('.headerc2').removeClass('selected')
            var sortbyname = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ($.trim($(a).find(".c1").text()) < $.trim($(b).find(".c1").text())) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyname);
            $('a.draft').on('click', onClickDraft)
        });

        //sort header by team - on click
        $('.headerc2').on('click', function () {
            $(this).addClass('selected')
            $('.headerc1').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ($.trim($(a).find(".c2").text()) < $.trim($(b).find(".c2").text())) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
//            $( ".playerDraft" ).removeClass('even')
//            $( ".playerDraft" ).removeClass('odd')
//            $( ".playerDraft" ).filter( ":even" ).addClass('even');
//            $( ".playerDraft" ).filter( ":odd" ).addClass('odd');
            $('a.draft').on('click', onClickDraft)
        });

        //pass selected players to form for submission
        $('#myform').submit(function() {
            var player1 = $('#draftTeamDef').children().eq(0).attr('pid')
            var player2 = $('#draftTeamDef').children().eq(1).attr('pid')
            var player3 = $('#draftTeamDef').children().eq(2).attr('pid')
            var player4 = $('#draftTeamDef').children().eq(3).attr('pid')
            var player5 = $('#draftTeamMid').children().eq(0).attr('pid')
            var player6 = $('#draftTeamMid').children().eq(1).attr('pid')
            var player7 = $('#draftTeamMid').children().eq(2).attr('pid')
            var player8 = $('#draftTeamMid').children().eq(3).attr('pid')
            var player9 = $('#draftTeamFor').children().eq(0).attr('pid')
            var player10 = $('#draftTeamFor').children().eq(1).attr('pid')

            $('#players_defenders_selected').append('<option value="'+player10+'"></option>')
            $('#players_defenders_selected').append('<option value="'+player9+'"></option>')
            $('#players_defenders_selected').append('<option value="'+player8+'"></option>')
            $('#players_defenders_selected').append('<option value="'+player7+'"></option>')

            $('#players_midfielders_selected').append('<option value="'+player6+'"></option>')
            $('#players_midfielders_selected').append('<option value="'+player5+'"></option>')
            $('#players_midfielders_selected').append('<option value="'+player4+'"></option>')
            $('#players_midfielders_selected').append('<option value="'+player3+'"></option>')

            $('#players_forwards_selected').append('<option value="'+player2+'"></option>')
            $('#players_forwards_selected').append('<option value="'+player1+'"></option>')
            })

        $('h3').on('click', function() {
            var player1 = $('#draftTeamDef').children().eq(0).attr('pid')
            var player2 = $('#draftTeamDef').children().eq(1).attr('pid')
            var player3 = $('#draftTeamDef').children().eq(2).attr('pid')
            var player4 = $('#draftTeamDef').children().eq(3).attr('pid')
            var player5 = $('#draftTeamMid').children().eq(0).attr('pid')
            var player6 = $('#draftTeamMid').children().eq(1).attr('pid')
            var player7 = $('#draftTeamMid').children().eq(2).attr('pid')
            var player8 = $('#draftTeamMid').children().eq(3).attr('pid')
            var player9 = $('#draftTeamFor').children().eq(0).attr('pid')
            var player10 = $('#draftTeamFor').children().eq(1).attr('pid')

            $('#players_defenders_selected').append('<option value="'+player10+'">d1</option>')
            $('#players_defenders_selected').append('<option value="'+player9+'">d2</option>')
            $('#players_defenders_selected').append('<option value="'+player8+'">d3</option>')
            $('#players_defenders_selected').append('<option value="'+player7+'">d4</option>')

            $('#players_midfielders_selected').append('<option value="'+player6+'">m5</option>')
            $('#players_midfielders_selected').append('<option value="'+player5+'">m6</option>')
            $('#players_midfielders_selected').append('<option value="'+player4+'">m7</option>')
            $('#players_midfielders_selected').append('<option value="'+player3+'">m8</option>')

            $('#players_forwards_selected').append('<option value="'+player2+'">f9</option>')
            $('#players_forwards_selected').append('<option value="'+player1+'">f10</option>')
        })

    })
</script>









<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


<h1>Trial</h1>
    <p class="loading">Loading...</p>
<div class="posts">

</div>

<div id="playerList">

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
<!--<div id="playerList">-->
<!--</div>-->

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
$attributes = array('id'  =>   'myform',  'name' => 'myform');

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