<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 27/04/2016
 * Time: 1:57 AM
 */
?>
<!---->
<!--<script src="--><?php //echo base_url(); ?><!--js/paginate.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--js/underscore.js"></script>-->

<style>
    #loading {
        width: 100%;
        height: 800px;
        text-align: center;
        line-height: 800px;
        font-size: xx-large;
    }
    
    ul {
        padding: 0px;
    }

    .gameFilterList {

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
        font-size: 10.5px;
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
        width: 700px;
        height: 500px;
        overflow: scroll;
        float: left;
        color: white;
        font-size: 14px;
    }

    #draftPanel a:link {
        color: white;
    }

    #draftPanel a:visited {
        color: white;
    }

    #draftTeam {
        width: 600px;
        float: right;
    }


    #draftTeamHeader {
        width: 600px;
    }

    .salaryRemaining {
        float: right;
    }

    .salaryRemainingValue {
        float:right;
    }

    .salaryPerPlayer {
        float: right;
    }

    .salaryPerPlayerValue {
        float: right;
    }

    #draftTeamDef {
        background-color: #000000;
        width: 600px;
        min-height: 120px;
        float: right;
        color: white;
        font-size: 15px;
    }

    #draftTeamMid {
        background-color: #000000;
        width: 600px;
        min-height: 120px;
        float: right;
        color: white;
        font-size: 15px;
    }

    #draftTeamFor {
        background-color: #000000;
        width: 600px;
        min-height: 60px;
        float: right;
        color: white;
        font-size: 15px;
    }

    #draftContainer {
        width: 100%;
        height: 500px;
    }

    .posFilterContainer {
        width: 800px;
        margin: 0px;
        padding: 0px;
    }

    .c0 {
        float: left;
        width: 60px;
    }

    .c1 {
        float: left;
        width: 180px;
    }

    .c2 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .c3 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .c4 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .c5 {
        float: left;
        width: 100px;
        text-align: center;
    }

    .headerc0 {
        float: left;
        width: 60px;
    }

    .headerc1 {
        float: left;
        width: 180px;
    }

    .headerc2 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .headerc3 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .headerc4 {
        float: left;
        width: 80px;
        text-align: center;
    }

    .headerc5 {
        float: left;
        width: 100px;
        text-align: center;
    }

    .scoring {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
        margin-left: 275px;
        background-color: grey;
    }

    .playerDraft {
        padding: 5px 0px 5px 0px;
        overflow: auto;
    }

    .closeScoringDiv {
        float: right;
        margin-right: 10px;
        cursor: pointer;
    }

    #draftPanelHeader {
        background-color: #000000;
        width: 700px;
        float: left;
        color: white;
        cursor: pointer;
    }

    #selectForms {
        display: none;
    }

    .draft {
        width: 100px;
        text-align: center;
        text-align: center;
        float: right;
    }

    #search {
        height: 30px;
        width: 300px;
        font-size: medium;
    }

    .playerInfoBg {
        background-color: black;
        opacity: 0.8;
        position:fixed;
        top:0px;
        bottom:0px;
        left:0px;
        right:0px;
        z-index:120;
        display: none;
    }

    .playerInfoBox {
        position:fixed;
        top:-200%;
        width: 900px;
        left: calc(50% - 450px);
        background-color: black;
        color: white;
        border:2px solid #f66606;
        z-index:121;
        height: 550px;
        display: none;
    }

    .topLineContainer {
        width: 100%;
        float: left;
        height: 100px;
        display: inline-block;
    }

    .playerInfoContainer {
        width: 400px;
        margin-left: 25px;
        display: inline-block;
    }

    .playerInfoName {
        width: 100%;
        float: left;
        text-align: left;
        color: #f66606;
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        margin-bottom: 15px;
        font-weight: bold;
        margin-top: 25px;
        margin-left: 25px;
    }

    .playerInfoBoxPhoto {
        width: 100px;
        height: 100px;
        float: left;
        background-image: url("http://www.primefaces.org/images/enterprise.png");
        background-repeat: no-repeat;
        padding-right: 50px;
    }

    .playerInfoBoxMetaData {
        height: 25px;
        width: 200px;
        line-height: 25px;
        color: #fff9e0;
        font-family: 'Open Sans', sans-serif;
        font-size:  13px;
        float: left;
    }

    .playerInfoBoxMetaDataLast {
        clear: both;
    }

    .playerInfoFpContainer {
        float: right;
        height: 100px;
        width: 400px;
        display: inline-block;
        margin-right: 25px;
    }

    .playerInfoFpContainerData {
        float: right;
        width: 90px;
        margin-right: 8px;
        border-radius: 3px;
        background: #fff9e0;
        box-sizing: border-box;
        height: 50px;
        line-height: 50px;
        text-align: center;
        font-family: sans-serif;
        font-weight: 200;
        font-size: 18px;
        color: #f66606;
    }

    .playerInfoFpContainerDataHeading {
        float: right;
        width: 90px;
        margin-right: 8px;
        margin-top: -20px;
        box-sizing: border-box;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-family: sans-serif;
        font-weight: bold;
        font-size: 12px;
        color: #fff9e0;
    }

    .playerInfoFpContainerDataOpp {
        float: right;
        width: 385px;
        margin-right: 8px;
        border-radius: 3px;
        background: #fff9e0;
        text-align: center;
        height: 30px;
        line-height: 30px;
        font-family: sans-serif;
        font-size: 16px;
        color: #f66606;
        margin-top:-12px;
    }

    .playerInfoFpContainerDataLast {
        clear: both;
    }

    .playerInfoLogContainerHeading {
        width: 100%;
        float: left;
        text-align: left;
        color: #f66606;
        font-family: 'Open Sans', sans-serif;
        font-size:  18px;
        margin-bottom: 5px;
    }

    .playerInfoLogContainer {
        float: left;
        margin-left: 15px;
        height: 200px;
        width: 850px;
        box-sizing: border-box;
        margin-top: 20px;
    }

    .playerInfoLogContainerData {
        width: 100%;
        float: left;
        text-align: left;
        color: #f66606;
        font-family: 'Open Sans', sans-serif;
        font-size: 14px;
        margin-bottom: 5px;
        height: 200px;
        text-align: center;
    }

    .playerInfoLogContainerData1 {
        width: 100px;
        text-align: center;
    }

    .playerInfoLogContainerData2 {
        width: 100px;
        text-align: center;
    }

    .playerInfoLogContainerData3 {
        width: 65px;
    }

    .playerInfoLogContainerData table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        height: 200px;
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        overflow-y:scroll;
        display:block;
    }

    .playerInfoLogContainerData tr:nth-child(even) {
        background-color: #fff9e0;
    }

    .playerInfoLogContainerData tr:nth-child(odd) {
        background-color: #f4eed6;
    }

    .playerInfoLogContainerData tr {
        height: 40px;
    }

    .playerInfoLogContainerData th {
        vertical-align: middle;
        border: 1px solid black;
        border-width: 1px 1px 1px 0px;
        font-weight: normal;
        color: #fff9e0;
        background: black;
        font-weight: 600;
    }

    .playerInfoLogContainerData td {
        vertical-align: middle;
        border: 1px solid #d9d4bd;
        border-width: 0px 1px 1px 0px;
        text-align: center;
        padding: 7px;
        font-family: 'Open Sans', sans-serif;
        font-size: 12px;
        font-weight: 600;
        color: #f66606;
    }

    .playerInfoBoxContainerLoading {
        width: 100%;
        height: 550px;
        text-align: center;
        line-height: 5500px;
        font-size: xx-large;
        color: white;
    }

    /*table tbody { height:300px; overflow-y:scroll; display:block; }*/
    /*table thead { display:block; }*/


</style>
<h1>Draft Page</h1>
<div id="loading"><h2>Loading...</h2></div>

<div id="draftPage">

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

<div id="hiddenTempEvent"></div>


<div class="gameFilter">
<ul class="gameFilterList">
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
    <div class="headerc2">Opponent</div>
    <div class="headerc3">Avg FP</div>
    <div class="headerc4">Form</div>
    <div class="headerc5">Salary</div>
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
        <li class="scoringList">Assist (A): 4pts</li>
        <li class="scoringList">Key Pass (KP): 1pt</li>
        <li class="scoringList">Tackle (T): 0.4pts</li>
        <li class="scoringList">Interception (I): 0.4pts</li>
        <li class="scoringList">Clearance (CL): 0.5pts</li>
        <li class="scoringList">Passes (P): 0.02pts</li>
        <li class="scoringList">Crosses (C): 0.4pts</li>
        <li class="scoringList">Accurate Crosses (AC): 1pts</li>
    </ul>
</div>


<div id="draftTeam">
    <div id="draftTeamHeader">
        Team
        <div class="salaryRemainingValue">100,000</div>
        <div class="salaryRemaining">Salary Remaining:  </div>
        <br>
        <div class="salaryPerPlayerValue">10,000</div>
        <div class="salaryPerPlayer">Salary Per Player:  </div>
    </div>
        <div id="draftTeamDef">
        </div>
        <div id="draftTeamMid">
        </div>
        <div id="draftTeamFor">
        </div>
</div>

<!--    pop up box info-->
<div class="playerInfoBg" id="playerInfoBg"></div>
<div class="playerInfoBox" id="playerInfoBox" style="top: 200px;">
    <div class="playerInfoBoxContainer">

    </div>
    </div>

</div>

    <div id="sumDef">0</div>
    <div id="sumMid">0</div>
    <div id="sumFor">0</div>

</div>

<script type="text/javascript">
    //wait for ajax to load before showing page
    $(document).ajaxStop(function () {
        $('#loading').hide()
        $('#draftPage').show()
        $('.scoringDiv').hide()
        $('.submit-btn').show()
        $('#sumDef').hide()
        $('#sumMid').hide()
        $('#sumFor').hide()
    });

    //wait for ajax to load before showing page
    $(document).ajaxStart(function () {
        $('#loading').show()
        $('#draftPage').hide()
        $('.submit-btn').hide()
    });

    function currencyFormat(n) {
        return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }

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
            tryCount: 0,
            retryLimit: 3,
            success: function (events) {
                $.each(events, function (i, event) {
                    $gameFilter.find('ul').append('<li class="eventFilter" tidh="' + event.team_id_home + '" tida="'
                        + event.team_id_away + '">' +
                        '<div class="homeTeam">' + event.team_name_home + '</div>' +
                        '<div class="awayTeam">@ ' + event.team_name_away + '</div>' +
                        '<br/><br/>' + event.start_date + '  ' + event.start_time)

                    
                });

                //assigns an onclick function on the list of events
                $('.eventFilter').on('click', onClickEvent)
            },
            error: function (xhr, textStatus, errorThrown) {
                if (textStatus == 'timeout') {
                this.tryCount++
                    if (this.tryCount <= this.retryLimit) {
                        $.ajax(this);
                        return;
                    }
                return
            }
                if (xhr.status == 500) {
                    //handle error
                } else {
                    //handle error
                }
            }
        })

        // Get Player List
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/contests_entry/get_players/" + contest,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (players) {

                $.each(players, function (i, player) {


                    $('#draftPanel').append('' +
                        '<div class="playerDraft" tid="' + player.team_phase_id + '" ' +
                        'pid ="' +player.player_phase_id+ '">' +
                        '<div class="c0" pos="' + player.pos + '">' +
                        (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
                        '</div>' +
                        '<div class="c1">' +
                            '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' + ' (' + player.team_shorthand + ')' +
                        '</div> ' +
                        '<div class="c2">' +
                        '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
                        '' + '</div>' +
                        '<div class="c3">' + Math.round(parseFloat(player.fp_avg) * 100) / 100 + '</div>' +
                        '<div class="c4">' + Math.round(parseFloat(player.fp_form) * 100) / 100 + '</div>' +
                        '<div class="c5">' + currencyFormat(parseFloat(player.salary)) + '</div>' +
                        '<a class="draft" href="JavaScript:void(0);">DRAFT</a>' +
                        '</div>')
                });

                //assigns an onclick function on the list of players
                $('a.draft').on('click', onClickDraft)

                $(document).on('click', 'a.playerInfoBtn', onClickPopUp);

                //triggers the initial sorting of players -- in future will initially be by salary instead
                $('.headerc5').triggerHandler('click')
            },
            error: function (xhr, textStatus, errorThrown) {
                if (textStatus == 'timeout') {
                    this.tryCount++
                    if (this.tryCount <= this.retryLimit) {
                        $.ajax(this);
                        return;
                    }
                    return
                }
                if (xhr.status == 500) {
                    //handle error
                } else {
                    //handle error
                }
            }
        });


        const onClickPopUp = function() {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[6];
            const baseurl = "<?php echo base_url(); ?>";
            const pid = $(this).parent(this).parent(this).attr('pid')
            
            $('.playerInfoBoxContainer').empty()
//            $('.playerInfoBoxContainer').append('<div class="playerInfoBoxContainerLoading">Loading...</div>')
//            $('.playerInfoBoxContainerLoading').show()

            $('#playerInfoBg').fadeIn()
            $('#playerInfoBox').fadeIn()
//            $('.playerInfoBoxContainer').hide()

//            $(document).ajaxStop(function () {
//                //when ajax have stopped loading, show the box
//            });
//
//            $(document).ajaxStart(function () {
//                //when ajax is loading the data, hide the box
//            });

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/contests_entry/calc_form_data/" + contest + "/" + pid,
                dataType: "json",
                global: false,
                tryCount: 0,
                retryLimit: 3,
                success: function (players) {
                    $.each(players, function (i, player) {
                        if(i === 0) {
                            $('.playerInfoBoxContainer').append('' +
                                '<div class="playerInfoBoxContainer">' +
                                '<a class="playerInfoBoxClose" id="playerInfoBoxClose"></a>' +
                                '<div class="topLineContainer">' +
                                '<div class="playerInfoName">' + player.first_name + ' ' + player.last_name + '</div>' +
                                '<div class="playerInfoContainer">' +
                                '<div class="playerInfoBoxPhoto">' +
                                '&nbsp;' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                '<b>Team: </b>' + player.team_name +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                '<b>Age: </b>' + player.age +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                '<b>Height: </b>' + player.height + 'm' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                '<b>Weight: </b>' + player.weight + 'kg' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaDataLast">' +
                                '&nbsp;' +
                                '</div>' +
                                '</div>' +
                                '<div class="playerInfoFpContainer">' +
                                '<div class="playerInfoFpContainerData">' +
                                '' + player.depth_chart +
                                '</div>' +
                                '<div class="playerInfoFpContainerData">' +
                                '' + Math.round(parseFloat(player.fp_form) * 100) / 100 +
                                '</div>' +
                                '<div class="playerInfoFpContainerData">' +
                                '' + Math.round(parseFloat(player.fp_avg) * 100) / 100 +
                                '</div>' +
                                '<div class="playerInfoFpContainerData">' +
                                '' + player.salary +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataLast">' +
                                '&nbsp;' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataHeading">' +
                                'Proj. Status' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataHeading">' +
                                'Form' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataHeading">' +
                                'Avg FP' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataHeading">' +
                                'Salary' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataHeading">' +
                                '&nbsp;' +
                                '</div>' +
                                '<div class="playerInfoFpContainerDataOpp">' +
                                '<b>Next Game:</b> ARS   21/2' +
                                '</div>' +
                                '</div>' +
                                '<div class="playerInfoLogContainer">' +
                                '<div class="playerInfoLogContainerHeading">' +
                                'Game Log' +
                                '</div>' +
                                '<div class="playerInfoLogContainer">' +
                                '<div class="playerInfoLogContainerData">' +
                                '<table id="logTable">' +
                                '<tbody><tr>' +
                                '<th class="playerInfoLogContainerData1">' +
                                'Date' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData2">' +
                                'Opponent' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'FP' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'G' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'A' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'P' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'KP' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'CR' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'AC' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'T' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'I' +
                                '</th>' +
                                '<th class="playerInfoLogContainerData3">' +
                                'CL' +
                                '</th>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>' +
                                '' + player.date +
                                '</td>' +
                                '<td>' +
                                'TBD' +
                                '</td>' +
                                '<td>' +
                                '' + player.fp_total +
                                '</td>' +
                                '<td>' +
                                '' + player.goals +
                                '</td>' +
                                '<td>' +
                                '' + player.assists +
                                '</td>' +
                                '<td>' +
                                '' + player.passes +
                                '</td>' +
                                '<td>' +
                                '' + player.key_passes +
                                '</td>' +
                                '<td>' +
                                '' + player.crosses +
                                '</td>' +
                                '<td>' +
                                '' + player.accurate_crosses +
                                '</td>' +
                                '<td>' +
                                '' + player.tackles +
                                '</td>' +
                                '<td>' +
                                '' + player.interceptions +
                                '</td>' +
                                '<td>' +
                                '' + player.clearances +
                                '</td>' +
                                '</tr>' +
                                '</tbody></table>' +
                                '</div>' +
                                '</div>' +
                                '<div class="draftButton">' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '')
                        }

                            if(i > 0) {
                                $('#logTable tr:last').after('' +
                                '<tr>' +
                                '<td>' +
                                '' + player.date +
                                '</td>' +
                                '<td>' +
                                'TBD' +
                                '</td>' +
                                '<td>' +
                                '' + player.fp_total +
                                '</td>' +
                                '<td>' +
                                '' + player.goals +
                                '</td>' +
                                '<td>' +
                                '' + player.assists +
                                '</td>' +
                                '<td>' +
                                '' + player.passes +
                                '</td>' +
                                '<td>' +
                                '' + player.key_passes +
                                '</td>' +
                                '<td>' +
                                '' + player.crosses +
                                '</td>' +
                                '<td>' +
                                '' + player.accurate_crosses +
                                '</td>' +
                                '<td>' +
                                '' + player.tackles +
                                '</td>' +
                                '<td>' +
                                '' + player.interceptions +
                                '</td>' +
                                '<td>' +
                                '' + player.clearances +
                                '</td>' +
                                '</tr>' +
                                '')
                        }
                    })
                },
                error: function (xhr, textStatus, errorThrown) {
                    if (textStatus == 'timeout') {
                        this.tryCount++
                        if (this.tryCount <= this.retryLimit) {
                            $.ajax(this);
                            return;
                        }
                        return
                    }
                    if (xhr.status == 500) {
                        //handle error
                    } else {
                        //handle error
                    }
                }

            })
        }

        $('#playerInfoBg').on('click', function(){
            $('#playerInfoBg').fadeOut()
            $('#playerInfoBox').fadeOut()
            return false
        })



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

            var sumDef = 0.00;
            var sumMid = 0.00;
            var sumFor = 0.00;
            var countDef = $('#draftTeamDef').children('.playerDraft').children('.c5').length
            var countMid = $('#draftTeamMid').children('.playerDraft').children('.c5').length
            var countFor = $('#draftTeamFor').children('.playerDraft').children('.c5').length
            const task = event.target.parentElement
            const list = task.parentElement.id
            const pid = $(this).attr('pid')
            const playerPos = $(this).siblings(".c0").html()
            const playerSalary = $(this).siblings(".c5").html()
            const posFilterSelected = $('.posFilter.selected').html()
            const lists = {
                draftPanel: document.getElementById('draftPanel'),
                draftTeamDef: document.getElementById('draftTeamDef'),
                draftTeamMid: document.getElementById('draftTeamMid'),
                draftTeamFor: document.getElementById('draftTeamFor')
            }

            var cost = parseFloat(event.target.previousSibling.innerHTML.split(',').join(''))
            var sumDefCalc = parseFloat($('#sumDef').html().split(',').join(''))
            var sumMidCalc = parseFloat($('#sumMid').html().split(',').join(''))
            var sumForCalc = parseFloat($('#sumFor').html().split(',').join(''))
            var sumOfCost = cost + sumDefCalc + sumMidCalc + sumForCalc

            //if selected player is defender
            if (playerPos == 'DEF' && playerSalary != '0.00') {
                //initial limit for number of defenders: 4
                if (countDef > 3 && list === 'draftPanel' && playerPos == 'DEF') {
                    alert('You can only choose 4 DEFENDERS!');
                } else if (sumOfCost > 100000) {
                    alert('You will be over the SALARY CAP!')
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
            } else if (playerPos == 'MID' && playerSalary != '0.00') {
                //initial limit for number of midfielders: 4
                if (countMid > 3 && list === 'draftPanel' && playerPos == 'MID') {
                    alert('You can only choose 4 MIDFIELDERS!');
                } else if (sumOfCost > 100000) {
                    alert('You will be over the SALARY CAP!')
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
            } else if (playerPos == 'FOR' && playerSalary != '0.00') {
                //initial limit for number of forwards: 2
                if (countFor > 1 && list === 'draftPanel' && playerPos == 'FOR') {
                    alert('You can only choose 2 FORWARDS!');
                } else if (sumOfCost > 100000) {
                    alert('You will be over the SALARY CAP!')
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

            var countDef = $('#draftTeamDef').children('.playerDraft').children('.c5').length
            var countMid = $('#draftTeamMid').children('.playerDraft').children('.c5').length
            var countFor = $('#draftTeamFor').children('.playerDraft').children('.c5').length

            $('#draftTeamDef').children('.playerDraft').children('.c5').each(function()
            {
                sumDef += parseFloat($(this).html().split(',').join(''))
                $('#sumDef').empty()
                $('#sumDef').html(sumDef)
            });

            $('#draftTeamMid').children('.playerDraft').children('.c5').each(function()
            {
                sumMid += parseFloat($(this).html().split(',').join(''))
                $('#sumMid').empty()
                $('#sumMid').html(sumMid)
            });

            $('#draftTeamFor').children('.playerDraft').children('.c5').each(function()
            {
                sumFor += parseFloat($(this).html().split(',').join(''))
                $('#sumFor').empty()
                $('#sumFor').html(sumFor)
            })

            var sumTotal = 100000 - sumDef - sumMid - sumFor
            var countTotal = 10 - countDef - countMid - countFor;

            $('.salaryRemainingValue').html(currencyFormat(sumTotal))
            $('.salaryPerPlayerValue').html(currencyFormat(sumTotal / countTotal))


            //re-sort the draftPanel after player is added back - depending on how the panel is sorted
            if ($('.headerc1').hasClass('selected') == true) {
                sortByName()
            } else if ($('.headerc2').hasClass('selected') == true) {
                sortByTeam()
            } else if ($('.headerc3').hasClass('selected') == true) {
                sortByAvgFp()
            } else if ($('.headerc4').hasClass('selected') == true) {
                sortForm()
            } else if ($('.headerc5').hasClass('selected') == true) {
                sortSalary()
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
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc4').removeClass('selected')
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

//        //sort header by team - callback function
//        var sortByTeam = function () {
//            $('.headerc2').addClass('selected')
//            $('.headerc1').removeClass('selected')
//            $('.headerc3').removeClass('selected')
//            $('.headerc4').removeClass('selected')
//            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
//                if ($.trim($(a).find(".c2").text()) < $.trim($(b).find(".c2").text())) {
//                    return -1;
//                } else {
//                    return 1;
//                }
//            });
//            $("#draftPanel").html(sortbyteam);
//
//            //because callback, the click event has to be turned off before assigning to the link
//            $('a.draft').off('click').on('click', onClickDraft)
//        }

        //sort header by avg fp - callback function
        var sortByAvgFp = function () {
            $('.headerc3').addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc4').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c3").text())) > parseFloat($.trim($(b).find(".c3").text())) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);

            //because callback, the click event has to be turned off before assigning to the link
            $('a.draft').off('click').on('click', onClickDraft)
        }

        //sort header by form - callback function
        var sortForm = function () {
            $('.headerc4').addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc5').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c4").text())) > parseFloat($.trim($(b).find(".c4").text())) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);

            //because callback, the click event has to be turned off before assigning to the link
            $('a.draft').off('click').on('click', onClickDraft)
        }

        var sortSalary = function () {
            $('.headerc5').addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc4').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c5").text().split(',').join(''))) > parseFloat($.trim($(b).find(".c5").text().split(',').join(''))) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);

            //because callback, the click event has to be turned off before assigning to the link
            $('a.draft').off('click').on('click', onClickDraft)
        }


        //sort header by name - on click
        $('.headerc1').on('click', function () {
            $(this).addClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc4').removeClass('selected')
            $('.headerc5').removeClass('selected')
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

//        //sort header by team - on click
//        $('.headerc2').on('click', function () {
//            $(this).addClass('selected')
//            $('.headerc1').removeClass('selected')
//            $('.headerc3').removeClass('selected')
//            $('.headerc4').removeClass('selected')
//            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
//                if ($.trim($(a).find(".c2").text()) < $.trim($(b).find(".c2").text())) {
//                    return -1;
//                } else {
//                    return 1;
//                }
//            });
//            $("#draftPanel").html(sortbyteam);
//            $('a.draft').on('click', onClickDraft)
//        });

        //sort header by avg fp - on click
        $('.headerc3').on('click', function () {
            $(this).addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc4').removeClass('selected')
            $('.headerc5').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c3").text())) > parseFloat($.trim($(b).find(".c3").text())) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
            $('a.draft').on('click', onClickDraft)
        });

        //sort header by form - on click
        $('.headerc4').on('click', function () {
            $(this).addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc5').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c4").text())) > parseFloat($.trim($(b).find(".c4").text())) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
            $('a.draft').on('click', onClickDraft)
        });

        //sort header by salary - on click
        $('.headerc5').on('click', function () {
            $(this).addClass('selected')
            $('.headerc1').removeClass('selected')
            $('.headerc2').removeClass('selected')
            $('.headerc3').removeClass('selected')
            $('.headerc4').removeClass('selected')
            var sortbyteam = $('#draftPanel').find($(".playerDraft")).sort(function (a, b) {
                if ( parseFloat($.trim($(a).find(".c5").text().split(',').join(''))) > parseFloat($.trim($(b).find(".c5").text().split(',').join(''))) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
            $('a.draft').on('click', onClickDraft)
        });


        //pass selected players to form for submission
        $('#myform').submit(function() {
            var player1 = $('#draftTeamFor').children().eq(0).attr('pid')
            var player2 = $('#draftTeamFor').children().eq(1).attr('pid')
            var player3 = $('#draftTeamMid').children().eq(0).attr('pid')
            var player4 = $('#draftTeamMid').children().eq(1).attr('pid')
            var player5 = $('#draftTeamMid').children().eq(2).attr('pid')
            var player6 = $('#draftTeamMid').children().eq(3).attr('pid')
            var player7 = $('#draftTeamDef').children().eq(0).attr('pid')
            var player8 = $('#draftTeamDef').children().eq(1).attr('pid')
            var player9 = $('#draftTeamDef').children().eq(2).attr('pid')
            var player10 = $('#draftTeamDef').children().eq(3).attr('pid')

            $('#players_forwards_selected').append('<option value="'+player2+'" selected></option>')
            $('#players_forwards_selected').append('<option value="'+player1+'" selected></option>')

            $('#players_midfielders_selected').append('<option value="'+player3+'" selected></option>')
            $('#players_midfielders_selected').append('<option value="'+player4+'" selected></option>')
            $('#players_midfielders_selected').append('<option value="'+player5+'" selected></option>')
            $('#players_midfielders_selected').append('<option value="'+player6+'" selected></option>')



            $('#players_defenders_selected').append('<option value="'+player7+'" selected></option>')
            $('#players_defenders_selected').append('<option value="'+player8+'" selected></option>')
            $('#players_defenders_selected').append('<option value="'+player9+'" selected></option>')
            $('#players_defenders_selected').append('<option value="'+player10+'" selected></option>')

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

<div id="selectForms">
<fieldset>

    <select name="forwards[]" id="players_forwards_selected" multiple size="2" style="width:500px">
    </select>

</fieldset>

<fieldset>

    <select name="midfielders[]" id="players_midfielders_selected" multiple size="3" style="width:500px">
    </select>

</fieldset>

<fieldset>

    <select name="defenders[]" id="players_defenders_selected" multiple size="3" style="width:500px">
    </select>

</fieldset>
</div>

<br/><br/>
<br/><br/>
<br/><br/>
<br/><br/>
<?php
$data = array(  'value'         =>      'Add Contest Entry',
'name'          =>      'submit',
'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>
<br/><br/>
<br/><br/>
