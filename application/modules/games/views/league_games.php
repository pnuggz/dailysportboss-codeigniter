<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:34 PM
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
        border-left: 1px solid #E66117;
        border-bottom: 1px solid #E66117;
        border-right: 1px solid #E66117;
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
        font-weight: 800;
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
        font-weight: 800;
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
        font-weight: 800;
    }

    .draftPosBox {
        float: left;
        width: 50px;
    }

    .draftPlayerBox {
        float: left;
        width: 200px;
    }

    .draftInfoBox {
        float: left;
        width: 70px;
    }
    .draftSalaryBox {
        float: left;
        width: 80px;
    }

    .c0d {
        float: left;
        width: 50px;
        padding-left: 1px;
        color: #E66117;
        height: 40px;
        font-size: 20px;
        font-weight: 800;
        line-height: 40px;
    }

    .c1d {
        float: left;
        width: 180px;
        color: #E66117;
        font-weight: 500;
        display: block;
        font-size: 14px;
        line-height: 20px;
    }

    .c1d a:link {
        float: left;
        color: #E66117;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }

    .c1d a:visited {
        float: left;
        color: #E66117;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }

    .c2d {
        float: left;
        width: 150px;
        text-align: left;
        color: #E66117;
        font-size: 14px;
        line-height: 20px;
    }

    .c3d {
        float: left;
        width: 80px;
        text-align: center;
        font-size: 7.5px;
        color: #E66117;

    }

    .c4d {
        float: left;
        width: 80px;
        text-align: center;
        font-size: 7.5px;
        color: #E66117;
    }

    .c5d {
        float: left;
        width: 80px;
        text-align: center;
        color: #E66117;
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
        margin-left: 355px;
        background-color: #000019;
        color: #F7E1C8;
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

    #rosterName {
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
        font-size:  20px;
        font-weight: 800;
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


</style>

<div id="mainHeading">GAMES PAGE</div>
<br>
<div id="mainLeague">Active Games</div>
<br>
<!--<table id="datatables" class="display">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>Roster Name</th>-->
<!--        <th>Contest Name</th>-->
<!--        <th>User Entry Count</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!---->
<!--    <tbody>-->
<!--    --><?php
//    foreach($active_contests->result() as $row) {
//        $contest_id = $row->id;
//        $contest_name = $row->contest_name;
//        $user_id = $row->user_id;
//        $user_entry_count = $row->user_entry_count;
//        $roster_name = $row->roster_name;
//        $sponsor_id = $row->sponsors_id;
//        $start_date = $row->start_date;
//        $start_time = $row->start_time;
//        ?>
<!--        <tr>-->
<!--            <td>--><?php //echo $roster_name; ?><!--</td>-->
<!--            <td>--><?php //echo $contest_name; ?><!--</td>-->
<!--            <td><b>DJARUM</b></td>-->
<!--            <td>RP 10,000,000</td>-->
<!--            <td>--><?php //echo $start_date; ?><!--<br>--><?php //echo $start_time; ?><!--</td>-->
<!--            <td>-->
<!--                <a href="--><?php //echo base_url(); ?><!--games/details/--><?php //echo $contest_id; ?><!--/--><?php //echo $user_id; ?><!--/--><?php //echo $user_entry_count; ?><!--/">VIEW</a>-->
<!--            </td>-->
<!--        </tr>-->
<!--    --><?php //} ?>
<!--    </tbody>-->
<!---->
<!--</table>-->

<div id="lobby-table">&nbsp;
    <table class="game-table">
        <tr>
            <th class="game-container-data-1">ROSTER NAME</th>
            <th class="game-container-data-2">CONTEST NAME</th>
            <th class="game-container-data-3">SPONSOR</th>
            <th class="game-container-data-4">PRIZE POOL</th>
            <th class="game-container-data-5">START</th>
            <th class="game-container-data-6"></th>
        </tr>
        <?php
        foreach($active_contests->result() as $row) {
            $contest_id = $row->id;
            $contest_name = $row->contest_name;
            $user_id = $row->user_id;
            $user_entry_count = $row->user_entry_count;
            $roster_name = $row->roster_name;
            $sponsor_id = $row->sponsors_id;
            $start_date = $row->start_date;
            $start_time = $row->start_time;
            ?>
            <tr>
                <td><?php echo $roster_name; ?></td>
                <td><?php echo $contest_name; ?></td>
                <td><b>DJARUM</b></td>
                <td>RP 10,000,000</td>
                <td><?php echo $start_date; ?><br><?php echo $start_time; ?></td>
                <td>
                    <a href="<?php echo base_url(); ?>games/details/<?php echo $contest_id; ?>/<?php echo $user_id; ?>/<?php echo $user_entry_count; ?>/">VIEW</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>


