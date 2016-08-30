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

    .match_entry_id {
        background-color: yellow;
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
    .simulate {
        display: inline-block;
        padding: 20px;
        border: 1px solid black;
        cursor: pointer;
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

    #ranking {
        width: 500px;
        background-color: black;
        color: white;
        float: right;
        border: 1px solid black;
    }

    .rc1 {
        width: 50px;
        float: left;
    }

    .rc2 {
        width: 175px;
        float: left;
    }

    .rc3 {
        width: 175px;
        float: left;
    }

    .rc4 {
        width: 100px;
        float: left;
        text-align: center;
    }

    #rankingHeader {
        background-color: #000000;
        width: 500px;
        float: right;
        color: white;
        cursor: pointer;
        border: 1px solid black;
    }

    .headerr1 {
        width: 50px;
        float: left;
    }

    .headerr2 {
        width: 175px;
        float: left;
    }

    .headerr3 {
        width: 175px;
        float: left;
    }

    .headerr4 {
        width: 100px;
        float: left;
        text-align: center;
    }


</style>


<?php foreach($entry_data->result() as $row) {
?>

<h2>Game Roster - *<?php echo $row->roster_name; ?>* - *<?php echo $this->session->userdata('username'); ?>*</h2>

<?php } ?>
<div id="loading"><h2>Loading...</h2></div>
<div id="draftPage">


<div class="gameFilter">
    <ul class="gameFilterList">
    </ul>
</div>

<div id="draftPage">
    <div id="draftContainer">

        <div class="posFilterContainer">
            <ul>
                <li class="simulate">Simulate</li>
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

        <div id="rankingHeader">
            <div class="headerr1">Pos</div>
            <div class="headerr2">Username</div>
            <div class="headerr3">Team Name</div>
            <div class="headerr4">FP</div>

        </div>
        <br/>
        <div id="ranking">
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
        const contest = segments[6];
        const user_id = segments[7];
        const user_entry_number = segments[8];
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
                        '<br/><br/>' + event.start_date + '  ' + event.start_time)


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
            }
        })

        // Get Player List
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/games/get_players/" + contest + "/" + user_id + "/" + user_entry_number,
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
                        '<div class="c3"> N/A </div>' +
                        '<div class="c4"> N/A </div>' +
                        '<div class="c5">' + currencyFormat(parseFloat(player.salary)) + '</div>' +
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

        // Get Result Table
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/games/get_team_fp/" + contest,
            dataType: "json",
            success: function (rankings) {
                $.each(rankings, function (i, ranking) {
                    $('#ranking').append('' +
                        '<div class="rrow">' +
                        '<div class="rc1">' + parseInt(i + 1) + '</div>' +
                        '<div class="rc2">' + ranking.entry_username + '</div>' +
                        '<div class="rc3">' + ranking.entry_roster_name + '</div>' +
                        '<div class="rc4">' + 0.00 + '</div>' +
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
            const contest = segments[6];
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
                            '<div class="c0" pos="' + player.pos + '">' +
                            (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) +
                            '</div>' +
                            '<div class="c1">' +
                            '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' + ' (' + player.team_shorthand + ')' +
                            '</div> ' +
                            '<div class="c2">' +
                            '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
                            '' + '</div>' +
                            '<div class="c3">&nbsp;</div>' +
                            '<div class="c4">&nbsp;</div>' +
                            '<div class="c5">' + player.player_fp + '</div>' +
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

        $(document).on('click', '.simulate', simulate);

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


