<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 4/06/2016
 * Time: 3:55 PM
 */
?>

<style>
    #loading {
        width: 100%;
        height: 800px;
        text-align: center;
        line-height: 800px;
        font-size: xx-large;
        color: #E66117;
    }

    #draftPage {
        width: 1180px;
        margin-left: 10px;
        float: left;
    }

    ul {
        padding: 0px;
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
        border: 1px solid #E66117;
        cursor: pointer;
        font-size: 10.5px;
        background-color: #F7E1C8;
        color: #000019;
        font-weight: 400;
    }

    .homeTeam {
        font-size: 14px;
        font-weight: 800;
        color: #000019;
    }

    .awayTeam {
        font-size: 14px;
        font-weight: 800;
        color: #000019;
    }

    .posFilter {
        display: inline-block;
        padding: 20px;
        border: 1px solid #E66117;
        cursor: pointer;
        background-color: #F7E1C8;
        color: #000019;
        font-weight: 400;
    }

    .selected {
        background-color: #E66117;
        color: #000019;
        font-weight: 400;
    }

    #draftPanel {
        background-color: #000019;
        width: 680px;
        height: 500px;
        overflow-y: scroll;
        overflow-x: hidden;
        float: left;
        font-size: 14px;
        border: 1px solid #E66117;
    }

    #draftPanel a:link {
    }

    #draftPanel a:visited {
    }

    #draftTeam {
        width: 450px;
        float: right;
        margin-top: -40px;
    }


    #draftTeamHeader {
        width: 450px;
        float: right;
    }

    .salaryRemaining {
        font-family: 'Open Sans', sans-serif;
        font-size:  14px;
        font-weight: 400;
        color: #F7E1C8;
        float: right;
    }

    .salaryRemainingValue {
        font-family: 'Open Sans', sans-serif;
        font-size:  14px;
        font-weight: 400;
        color: #F7E1C8;
        float:right;
    }

    .salaryPerPlayer {
        font-family: 'Open Sans', sans-serif;
        font-size:  12px;
        font-weight: 400;
        color: #F7E1C8;
        float: right;
    }

    .salaryPerPlayerValue {
        font-family: 'Open Sans', sans-serif;
        font-size:  12px;
        font-weight: 400;
        color: #F7E1C8;
        float: right;
    }

    #draftTeamDef {
        background-color: #000019;
        width: 450px;
        min-height: 200px;
        float: right;
        color: white;
        font-size: 15px;
        border-left: 1px solid #E66117;
        border-top: 1px solid #E66117;
        border-right: 1px solid #E66117;
    }

    #draftTeamMid {
        background-color: #000019;
        width: 450px;
        min-height: 200px;
        float: right;
        color: white;
        font-size: 15px;
        border-left: 1px solid #E66117;
        border-right: 1px solid #E66117;
    }

    #draftTeamFor {
        background-color: #000019;
        width: 450px;
        min-height: 100px;
        float: right;
        color: white;
        font-size: 15px;
        border-left: 1px solid #E66117;
        border-bottom: 1px solid #E66117;
        border-right: 1px solid #E66117;
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
        padding-left: 1px;
        color: #F7E1C8;
    }

    .c1 {
        float: left;
        width: 240px;
        color: #F7E1C8;
    }

    .c1 a:link {
        color: #F7E1C8;
    }

    .c1 a:visited {
        color: #F7E1C8;
    }

    .c2 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .c3 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .c4 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .c5 {
        float: left;
        width: 100px;
        text-align: center;
        color: #F7E1C8;
    }

    .draftPosBox {
        float: left;
        width: 80px;
        margin-left: 5px;
    }

    .draftPlayerBox {
        float: left;
        width: 300px;
    }

    .draftInfoBox {
        float: left;
        width: 200px;
    }
    .draftSalaryBox {
        float: left;
        width: 80px;
    }

    .c0d {
        float: left;
        width: 50px;
        padding-left: 1px;
        color: #F7E1C8;
        height: 40px;
        font-size: 20px;
        font-weight: 800;
        line-height: 40px;
    }

    .c1d {
        float: left;
        width: 180px;
        color: #F7E1C8;
        font-weight: 500;
        display: block;
        font-size: 14px;
        line-height: 20px;
    }

    .c1d a:link {
        float: left;
        color: #F7E1C8;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }

    .c1d a:visited {
        float: left;
        color: #F7E1C8;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }

    .c1dTeam {
        font-size: 12px;
        line-height: 20px;
        float: left;
        padding-right: 5px;
    }

    .c1dImg {
        float: left;
        margin: 0px 0px 0px 0px;
        height: 19px;
        font-size: 12px;
    }

    .playerInfoBtn {
        float: left;
        padding-right: 5px;
    }

    .c2d {
        float: left;
        width: 150px;
        text-align: left;
        color: #F7E1C8;
        font-size: 14px;
        line-height: 20px;
    }

    .c3d {
        float: left;
        width: 80px;
        text-align: center;
        font-size: 12px;
        color: #F7E1C8;
        line-height: 20px;
    }

    .c4d {
        float: left;
        width: 80px;
        text-align: center;
        font-size: 12px;
        color: #F7E1C8;
        line-height: 20px;
    }

    .c5d {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
        height: 40px;
        line-height: 40px;
        font-size: 14px;
        font-weight: 800;
    }

    .headerc0 {
        float: left;
        width: 60px;
        padding-left: 1px
        color: #F7E1C8;
    }

    .headerc1 {
        float: left;
        width: 240px;
        color: #F7E1C8;
    }

    .headerc2 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .headerc3 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .headerc4 {
        float: left;
        width: 80px;
        text-align: center;
        color: #F7E1C8;
    }

    .headerc5 {
        float: left;
        width: 100px;
        text-align: center;
        color: #F7E1C8;
    }

    .scoring {
        display: inline-block;
        padding: 20px;
        border: 1px solid #E66117;
        cursor: pointer;
        /*margin-left: 465px;*/
        background-color: #000019;
        color: #F7E1C8;
    }

    .simulate {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
        background-color: #E66117;
        color: #F7E1C8
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
        background-color: #000019;
        width: 680px;
        float: left;
        color: #F7E1C8;
        cursor: pointer;
        border-top: 1px solid #E66117;
        border-left: 1px solid #E66117;
        border-right: 1px solid #E66117;
    }

    #selectForms {
        display: none;
    }

    .draft {
        width: 20px;
        text-align: center;
        float: right;
        color: #E66117;
        font-size: 14px;
        text-decoration: none;
    }

    .draft a:link {
        color: #E66117;
        font-size: 14px;
        text-decoration: none;
    }

    .draft a:visited {
        color: #E66117;
        font-size: 14px;
        text-decoration: none;
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
        background-color: #282B38;
        color: white;
        border:2px solid #E66117;
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
        color: #E66117;
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        margin-bottom: 15px;
        font-weight: 800;
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
        font-weight: 700;
        font-size: 15px;
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
        font-size: 14px;
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

    #mainContest {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
    }

    #headingRoster {
        font-family: 'Open Sans', sans-serif;
        font-size:  18px;
        color: #F7E1C8;
    }

    input[type=text] {
        background-color: #E66117;
        color: #F7E1C8;
    }

    body::-webkit-scrollbar {
        width: 1em;
    }

    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }

    body::-webkit-scrollbar-thumb {
        background-color: #E66117;
        outline: 1px solid #E66117;
    }

    #draftPanel::-webkit-scrollbar {
        width: 1em;
    }

    #draftPanel::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }

    #draftPanel::-webkit-scrollbar-thumb {
        background-color: #E66117;
        outline: 1px solid #E66117;
    }

    .scoringDiv {
        border-top: 1px solid #E66117;
        color: #F7E1C8;
        width: 100%;
        padding-left: 5px;
        overflow-x: hidden;
    }

    .teamHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  18px;
        font-weight: 600;
        color: #F7E1C8;
        margin: 0px;
        display: inline;
        float:left;
    }

    .submit-btn {
        background-color: #E66117;
        color: #F7E1C8;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border: none;
        margin-right: 10px;
        margin-top: 20px;
        margin-bottom: 20px;
        float: right;
    }

    #rankingContainer {
        width: 450px;
        float: right;
        margin-top: -25px;
        margin-bottom: 50px;
    }

    .rankingContainerHeading {
        font-size: 20px;
        font-weight: 800;
        color: #F7E1C8;
    }

    #ranking {
        width: 450px;
        background-color: #000019;
        color: #E66117;
        float: right;
        font-size: 14px;
        border-left: 1px solid #E66117;
        border-bottom: 1px solid #E66117;
        border-right: 1px solid #E66117;
        height: 478px;
        overflow-y: scroll;
        padding-left:5px;
    }

    .rc1 {
        width: 40px;
        float: left;
        padding-left: 10px;
    }

    .rc2 {
        width: 130px;
        float: left;
    }

    .rc3 {
        width: 150px;
        float: left;
    }

    .rc4 {
        width: 100px;
        float: left;
        text-align: center;
    }

    #ranking::-webkit-scrollbar {
        width: 1em;
    }

    #ranking::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }

    #ranking::-webkit-scrollbar-thumb {
        background-color: #E66117;
        outline: 1px solid #E66117;
    }

    #rankingHeader {
        background-color: #000019;
        color: #E66117;
        width: 450px;
        float: right;
        cursor: pointer;
        font-size: 14px;
        border-left: 1px solid #E66117;
        border-top: 1px solid #E66117;
        border-right: 1px solid #E66117;
        padding-left: 5px;
    }

    .headerr1 {
        width: 50px;
        float: left;
    }

    .headerr2 {
        width: 130px;
        float: left;
    }

    .headerr3 {
        width: 150px;
        float: left;
    }

    .headerr4 {
        width: 100px;
        float: left;
        text-align: center;
    }

    .eventDateSim {
        text-decoration: line-through;
    }

</style>


<div id="mainHeading">GAME ROSTER</div>
<br>

<div id="loading"><h2>Loading...</h2></div>
<div id="draftPage">

<?php foreach($entry_data->result() as $row) {
    ?>
    <div id="mainContest"><b>Roster Name: </b><?php echo $row->roster_name; ?></div>
<?php } ?>

<div class="gameFilter">
    <ul class="gameFilterList">
    </ul>
</div>

    <div id="draftContainer">

        <div class="posFilterContainer">
            <ul>
<!--                <li class="simulate">SIMULATE</li>-->
                <li class="scoring">Scoring</li>
            </ul>
        </div>

        <div id="draftPanel">
        </div>

        <div id="rankingContainer">
            <div class="rankingContainerHeading">RANKING TABLE</div>
            <div id="rankingHeader">
                <div class="headerr1"><b>POS</b></div>
                <div class="headerr2"><b>USERNAME</b></div>
                <div class="headerr3"><b>ROSTER NAME</b></div>
                <div class="headerr4"><b>FP</b></div>
            </div>
            <div id="ranking">
            </div>
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

        <!--    pop up box info-->
        <div class="playerInfoBg" id="playerInfoBg"></div>
        <div class="playerInfoBox" id="playerInfoBox" style="top: 200px;">
            <div class="playerInfoBoxContainer">

            </div>
        </div>


    </div>

</div>



<script type="text/javascript">
    //wait for ajax to load before showing page
    $(document).ajaxStop(function () {
        $('#loading').hide()
        $('#draftPage').show()
        $('.scoringDiv').hide()
        $('.submit-btn').show()
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
        const contest = segments[5];
        const user_id = segments[6];
        const user_entry_number = segments[7];
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
            url: baseurl + "index.php/games/get_events/" + contest,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (events) {
                $.each(events, function (i, event) {
                    $gameFilter.find('ul').append('<li class="eventFilter" tidh="' + event.team_id_home + '" tida="'
                        + event.team_id_away + '">' +
                        '<div class="homeTeam">' + event.team_name_home + '</div>' +
                        '<div class="awayTeam">@ ' + event.team_name_away + '</div>' +
                        '<br/><br/><div class="eventDate">' + event.start_date + '  ' + event.start_time + '</div>')


                });

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
            },
            complete: function () {


//                 //Get Player List
//                $.ajax({
//                    type: "GET",
//                    url: baseurl + "index.php/games/get_players/" + contest + "/" + user_id + "/" + user_entry_number,
//                    dataType: "json",
//                    tryCount: 0,
//                    retryLimit: 3,
//                    success: function (players) {
//
//                        $.each(players, function (i, player) {
//
//
//                            $('#draftPanel').append('' +
//                                '<div class="playerDraft" tid="' + player.team_phase_id + '" ' +
//                                'pid ="' + player.player_phase_id + '">' +
//                                '<div class="draftPosBox">' +
//                                '<div class="c0d" pos="' + player.pos + '">' +
//                                (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
//                                '</div>' +
//                                '</div><div class="draftPlayerBox">' +
//                                '<div class="c1d">' +
//                                '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' +
//                                '<div class="c1dTeam">(' + player.team_shorthand + ')</div>' +
//                                '</div> ' +
//                                '<div class="c2d">' +
//                                '<div class="c1dImg"><img src="<?php //echo base_url(); ?>//img/' + (player.role == "Starter" ? 'starter' : (player.role == "Bench" ? 'bench' : (player.role == "Reserve" ? 'reserve' : ''))) +
//                                '.png" title="' + (player.role == "Starter" ? 'Starting Player' : (player.role == "Bench" ? 'Bench Player' : (player.role == "Reserve" ? 'Reserve Player' : ''))) + '">&nbsp;</div>' +
//                                '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
//                                '</div>' +
//                                '</div><div class="draftInfoBox">' +
//                                '<div class="c3d"><b>Avg. FP</b><br>' + player.fp_avg + '</div>' +
//                                '<div class="c4d"><b>Form</b><br>' + player.fp_form + '</div>' +
//                                '</div><div class="draftSalaryBox">' +
//                                '<div class="c5d">$' + currencyFormat(parseFloat(player.salary)) + '</div>' +
//                                '</div>' +
//                                '</div>')
//                        });
//
//
//                        $(document).on('click', 'a.playerInfoBtn', onClickPopUp);
//
//                    },
//                    error: function (xhr, textStatus, errorThrown) {
//                        if (textStatus == 'timeout') {
//                            this.tryCount++
//                            if (this.tryCount <= this.retryLimit) {
//                                $.ajax(this);
//                                return;
//                            }
//                            return
//                        }
//                        if (xhr.status == 500) {
//                            //handle error
//                        } else {
//                            //handle error
//                        }
//                    }
//                })

                $.ajax({
                    type: "GET",
                    url: baseurl + "index.php/games/simulate_player_fp/" + contest + "/" + user_id + "/" + user_entry_number,
                    dataType: "json",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function (players) {

                        $.each(players, function (i, player) {


                            $('#draftPanel').append('' +
                                '<div class="playerDraft" tid="' + player.team_phase_id + '" ' +
                                'pid ="' + player.player_phase_id + '">' +
                                '<div class="draftPosBox">' +
                                '<div class="c0d" pos="' + player.pos + '">' +
                                (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
                                '</div>' +
                                '</div><div class="draftPlayerBox">' +
                                '<div class="c1d">' +
                                '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' + ' (' + player.team_shorthand + ')' +
                                '</div> ' +
                                '<div class="c2d">' +
                                '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
                                '</div>' +
                                '</div><div class="draftInfoBox">' +
                                '<div class="c3d">&nbsp;</div>' +
                                '<div class="c4d">&nbsp;</div>' +
                                '</div><div class="draftSalaryBox">' +
                                '<div class="c5d">' + player.player_fp + '</div>' +
                                '</div>' +
                                '</div>')
                        });

                        $(document).on('click', 'a.playerInfoBtn', onClickPopUp);

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

            }

        })

        // Get Result Table
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/games/simulate_team_fp/" + contest,
            dataType: "json",
            success: function (rankings) {
                $.each(rankings, function (i, ranking) {
                    $('#ranking').append('' +
                        '<div class="rrow">' +
                        '<div class="rc1">' + parseInt(i + 1) + '</div>' +
                        '<div class="rc2">' + ranking.entry_username + '</div>' +
                        '<div class="rc3">' + ranking.entry_roster_name + '</div>' +
                        '<div class="rc4">' + ranking.entry_total_team_fp + '</div>' +
                        '</div>')

                    if (user_id == ranking.entry_id && user_entry_number == ranking.entry_number) {
                        $('.rc1').last().addClass('selected')
                        $('.rc2').last().addClass('selected')
                        $('.rc3').last().addClass('selected')
                        $('.rc4').last().addClass('selected')
                    }

                })

            }
        })



        const simulate = function() {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[5];
            const baseurl = "<?php echo base_url(); ?>";
            const pid = $(this).parent(this).parent(this).attr('pid')

            $('#draftPanel').empty()
            $('#ranking').empty()
            $('.headerc3').empty()
            $('.headerc4').empty()
            $('.headerc5').empty()
            $('.headerc3').html('&nbsp;')
            $('.headerc4').html('&nbsp;')
            $('.headerc5').html('FP')

            // Get Result Table Simulated
            $.ajax({
                type: "GET",
                url: baseurl + "index.php/games/simulate_team_fp/" + contest,
                dataType: "json",
                success: function (rankings) {
                    $.each(rankings, function (i, ranking) {
                        $('#ranking').append('' +
                            '<div class="rrow">' +
                            '<div class="rc1">' + parseInt(i + 1) + '</div>' +
                            '<div class="rc2">' + ranking.entry_username + '</div>' +
                            '<div class="rc3">' + ranking.entry_roster_name + '</div>' +
                            '<div class="rc4">' + ranking.entry_total_team_fp + '</div>' +
                            '</div>')

                        if (user_id == ranking.entry_id && user_entry_number == ranking.entry_number) {
                            $('.rc1').last().addClass('selected')
                            $('.rc2').last().addClass('selected')
                            $('.rc3').last().addClass('selected')
                            $('.rc4').last().addClass('selected')
                        }

                    })

                }
            })

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/games/simulate_player_fp/" + contest + "/" + user_id + "/" + user_entry_number,
                dataType: "json",
                tryCount: 0,
                retryLimit: 3,
                success: function (players) {

                    $.each(players, function (i, player) {


                        $('#draftPanel').append('' +
                            '<div class="playerDraft" tid="' + player.team_phase_id + '" ' +
                            'pid ="' + player.player_phase_id + '">' +
                            '<div class="draftPosBox">' +
                            '<div class="c0d" pos="' + player.pos + '">' +
                            (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
                            '</div>' +
                            '</div><div class="draftPlayerBox">' +
                            '<div class="c1d">' +
                            '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' + ' (' + player.team_shorthand + ')' +
                            '</div> ' +
                            '<div class="c2d">' +
                            '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
                            '</div>' +
                            '</div><div class="draftInfoBox">' +
                            '<div class="c3d">&nbsp;</div>' +
                            '<div class="c4d">&nbsp;</div>' +
                            '</div><div class="draftSalaryBox">' +
                            '<div class="c5d">' + player.player_fp + '</div>' +
                            '</div>' +
                            '</div>')
                    });

                    $(document).on('click', 'a.playerInfoBtn', onClickPopUp);

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

            $('.eventDate').addClass('eventDateSim').removeClass('eventDate')
        }

        $(document).on('click', '.simulate', simulate);

        const onClickPopUp = function() {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[5];
            const baseurl = "<?php echo base_url(); ?>";
            const pid = $(this).parent(this).parent(this).parent(this).attr('pid')

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
                url: baseurl + "index.php/draft/calc_form_data/" + contest + "/" + pid,
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
                                '<div class="playerInfoName">' + player.first_name + '  ' + player.last_name + '</b></div>' +
                                '<div class="playerInfoContainer">' +
                                '<div class="playerInfoBoxPhoto">' +
                                '&nbsp;' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                'Team: <b>' + player.team_name + '</b>' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                'Age: <b>' + player.age + '</b>' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                'Height: <b>' + player.height + 'm</b>' +
                                '</div>' +
                                '<div class="playerInfoBoxMetaData">' +
                                'Weight: <b>' + player.weight + 'kg</b>' +
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
                                '$' + currencyFormat(parseFloat(player.salary)) +
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
                                'Next Game: <b>ARS   21/2</b>' +
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


        //function to open the scoring info panel - on click
        $('.scoring').on('click', function () {
            //preparation to display the scoring info panel
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

    })
</script>


