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
        padding-right: 3px;
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
        padding-right: 3px;
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
        line-height: 20px;
    }

    .c1 a:link {
        color: #F7E1C8;
        line-height: 20px;
    }

    .c1 a:visited {
        color: #F7E1C8;
        line-height: 20px;
    }

    .c1Team {
        font-size: 12px;
        line-height: 20px;
        float: left;
        padding-right: 5px;
    }

    .c1Img {
        float: left;
    }

    .playerInfoBtn {
        float: left;
        padding-right: 5px;
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
        display: none;
        visibility: hidden;
    }

    #activatorVideoBox {
        cursor: pointer;
        float: right;
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
    }

    /* Style for overlay and box */
    .contestInfoBg {
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

    .contestInfoBox {
        position:absolute;
        left:10%;
        right:10%;
        top: 10%;
        bottom: 10%;
        background-color: #282B38;
        color: white;
        border:2px solid #E66117;
        z-index:121;
        display: none;
    }

    .contestInfo {
        border-bottom: 1px solid #f66606;
        background-color: #fff9e0;
        color: black;
        font-family: 'Open Sans', sans-serif;
        font-size:  14px;
        opacity: 0.8;
        padding: 10px;
    }

    .mainmediabox {
        float: left;
        position: absolute;
        top: 80px;
        bottom: 12%;
        left: 2%;
        right: 2%;
        overflow-y: auto;
        color: #F7E1C8;
        padding: 0px 10px 0px 10px;
    }

    .mediabox1 {
        float: left;
        width: 45%;
        height: 100%;
        overflow-y: auto;
        color: #F7E1C8;
        padding: 0px 10px 0px 10px;
    }

    .mediabox2 {
        float: right;
        width: 45%;
        height: 100%;
        overflow-y: auto;
        color: #F7E1C8;
        padding: 0px 10px 0px 10px;
    }

    .contestInfoName {
        float: left;
        margin: auto;
    }

    .contestInfoDetails {
        float: right;
        min-width: 20px;
        text-align: right;
        padding-right: 20px;
    }

    .contestInfoDetails2 {
        font-size: 10px;
    }

    .contestInfoLast {
        clear: both;
    }

    .games {
        border-bottom: 1px solid #6b2d04;
        margin-bottom: 20px;
        float: left;
        width: 100%;
        overflow-x: auto;
        max-height 20px;
    }

    .game {
        float: left;
        margin-right: 30px;
        padding: 10px 0px 10px 0px;
        font-family: 'Open Sans', sans-serif;
        font-size:  13px;
        display: inline-block;
    }

    .gameLast {
        clear: both;
    }

    .scoring1 {
        width: 100%;
    }

    .scoringHeading {
        height: 20px;
        width: 80%;
        float: left;
        font-family: 'Open Sans', sans-serif;
        font-size:  13px;
        padding-top: 13px;
        border-bottom: 1px solid #6b2d04;
    }

    .scoringValue {
        height: 20px;
        width: 20%;
        float: left;
        text-align: right;
        font-family: 'Open Sans', sans-serif;
        font-size:  14px;
        padding-top: 13px;
        border-bottom: 1px solid #6b2d04;
    }

    .prizes {
    }

    .prizesHeading {;
        height: 20px;
        width: 50%;
        float: left;
        font-family: 'Open Sans', sans-serif;
        font-size:  14px;
        padding-top: 13px;
        border-bottom: 1px solid #6b2d04;
    }

    .prizesValue {
        height: 20px;
        width: 50%;
        float: left;
        text-align: right;
        font-family: 'Open Sans', sans-serif;
        font-size:  12px;
        padding-top: 13px;
        border-bottom: 1px solid #6b2d04;
    }

/*VIDEO CHECKER STYLES*/
    a.selected {
        background-color:#1F75CC;
        color:white;
        z-index:100;
    }

    .messagepop {
        background-color:#282B38;
        border:1px solid #E66117;
        color: #E66117;
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        cursor:default;
        box-sizing: border-box;
        text-align:center;
        width:400px;
        left: calc(50% - 200px);
        z-index:150;
        position:fixed;
        top:-200%;
        padding: 25px 25px 20px;
    }

    .messagepopp {
        background-color: #282B38;
        border: 1px solid #E66117;
        color: #E66117;
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        cursor: default;
        box-sizing: border-box;
        width: 400px;
        left: calc(50% - 200px);
        text-align: left;
        z-index: 150;
        position: fixed;
        top: -200%;
        padding: 25px 25px 20px;
    }

    .messagepoppHeading {
        float: left;
        margin-right: 5px;
    }

    .word {
        font-weight: 800;
        float: left;
        /*display: none;*/
    }

    .overlayVideoBox {
        background-color: black;
        opacity: 0.8;
        position:fixed;
        top:0px;
        bottom:0px;
        left:0px;
        right:0px;
        z-index:120;
    }

    a.activatorVideoBox {
        width:auto;
        height:auto;
        float:right;
        z-index:1;
        cursor:pointer;
    }

    .containerVideoBox {
        position:fixed;
        top:-200%;
        width: 900px;
        left: calc(50% - 450px);
        background-color: #000019;
        color: white;
        border:2px solid #E66117;
        z-index:121;
        height: 550px;
    }

    .sponsorHeading {
        display: block;
        margin: 0px auto;
        color: #F7E1C8;
        font-size: 28px;
        text-align: center;
        padding-top:20px;
        font-weight: 700;
    }

    .sponsorVideo {
        float: left;
        margin-top: 50px;
        margin-left: 125px;
    }

    #videoEnterBtn {
        cursor: pointer;
        display: block;
        background-color: #E66117;
        color: #F7E1C8;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        font-size: 12px;
        border: none;
        margin: 0px auto;
    }

    #btnExport {
        cursor: pointer;
        background-color: #E66117;
        color: #F7E1C8;
        padding: 2px 2px;
        text-align: center;
        text-decoration: none;
        font-size: 12px;
        border: none;
        margin-top: 20px;
    }

</style>
<div id="mainHeading">DRAFT PAGE</div>
<div id="loading"><h2>Loading...</h2></div>

<div id="draftPage">

    <?php
    $attributes = array('id'  =>   'myform',  'name' => 'myform');

    echo form_open('draft/add', $attributes);
    ?>
    <br />
    <div id="mainContest">
    <?php foreach($contest_details->result() as $row){
        $contest_name = $row->contest_name;
        $contest_id = $row->id;
    }
    echo $contest_name;
    $data = array('contest_id' => $contest_id
    );
    echo form_hidden($data);
    ?>
    </div>

    <?php
    $data = array('user_id' => $this->session->userdata('user_id'));
    echo form_hidden($data);
    ?>

    <br />
    <div id="headingRoster">Roster Name</div>

    <?php
    $data = array(  'name'          =>      'roster_name',
        'id'    =>      'rosterName',
        'placeholder'   =>      'Roster Name',
        'value'         =>      set_value('roster_name'),
    );
    echo form_input($data);
    echo "<br /><br />";
    ?>

<div id="hiddenTempEvent"></div>


<div class="gameFilter">
    <ul class="gameFilterList">
    </ul>
</div>

<br>
<div id="draftContainer">
<div class="posFilterContainer">
    <ul>
        <li class="posFilter" pos="Defender">DEF</li>
        <li class="posFilter" pos="Midfielder">MID</li>
        <li class="posFilter" pos="Forward">FOR</li>
        <li class="scoring">Scoring</li>
    </ul>
</div>

<input type="text" id="search" placeholder="Player Search">
<br/><br/>
<div id="draftPanelHeader">
    <div class="headerc0"><b>POS</b></div>
    <div class="headerc1"><b>NAME</b></div>
    <div class="headerc2"><b>OPP</b></div>
    <div class="headerc3"><b>AVG FP</b></div>
    <div class="headerc4"><b>FORM</b></div>
    <div class="headerc5"><b>SALARY</b></div>
</div>
    <br/>
<div id="draftPanel">
</div>

<div class="scoringDiv">
    <div class="closeScoringDiv">Close</div>
    <br>
    <p><b>Players will accumulate fantasy points as follows:</b></p>
    <ul>
        <li class="scoringList">Goal (G): <b>5 Pts.</b></li>
        <li class="scoringList">Assist (A): <b>4 Pts.</b></li>
        <li class="scoringList">Key Pass (KP): <b>1 Pts.</b></li>
        <li class="scoringList">Tackle (T): <b>0.4 Pts.</b></li>
        <li class="scoringList">Interception (I): <b>0.4 Pts.</b></li>
        <li class="scoringList">Clearance (CL): <b>0.5 Pts.</b></li>
        <li class="scoringList">Passes (P): <b>0.02 Pts.</b></li>
        <li class="scoringList">Crosses (C): <b>0.4 Pts.</b></li>
        <li class="scoringList">Accurate Crosses (AC): <b>1 Pts.</b></li>
    </ul>
</div>


<div id="draftTeam">
    <div id="draftTeamHeader">
        <div class="teamHeading">YOUR TEAM</div>
        <div class="salaryRemainingValue">$100,000.00</div>
        <div class="salaryRemaining">Salary Rem.:  </div>
        <br>
        <div class="salaryPerPlayerValue">$10,000.00</div>
        <div class="salaryPerPlayer">Salary/Player:  </div>
    </div>
        <div id="draftTeamDef">
<!--            <div class="draftPosBox">-->
<!--                <div class="c0d">DEF</div>-->
<!--            </div>-->
<!--            <div class="draftPlayerBox">-->
<!--                <div class="c1d">Michael Antonio (WHU)</div>-->
<!--                <div class="c2d">OPP: CHE</div>-->
<!--            </div>-->
<!--            <div class="draftInfoBox">-->
<!--                <div class="c3d">AVG. FP<br>4.17</div>-->
<!--                <div class="c4d">Form<br>8.18</div>-->
<!--            </div>-->
<!--            <div class="draftSalaryBox">-->
<!--                <div class="c5d">13,065.76</div>-->
<!--            </div>-->
<!--            <div class="draftBtn">-->
<!--                REMOVE-->
<!--            </div>-->
        </div>
        <div id="draftTeamMid">
        </div>
        <div id="draftTeamFor">
        </div>
</div>

    <input type="button" id="btnExport" value=" Export to Excel "/>

    <div class="contestInfoBg" id="contestInfoBg"></div>
    <div class="contestInfoBox" id="contestInfoBox">
        <div class="contestInfoBoxContainer"></div>
    </div>

    <div id="activatorVideoBox">DRAFT TEAM</div>
</div>

    <div id="sumDef">0</div>
    <div id="sumMid">0</div>
    <div id="sumFor">0</div>
    <div id="exportTable">
        <table class="exportTable">
            <tr>
                <th>POS</th>
                <th>NAME</th>
                <th>ROLE</th>
                <th>TEAM</th>
                <th>OPPONENT</th>
                <th>AVG FP</th>
                <th>FORM</th>
                <th>SALARY</th>
            </tr>
        </table>
    </div>

</div>

<!--    pop up box info-->
<div class="playerInfoBg" id="playerInfoBg"></div>
<div class="playerInfoBox" id="playerInfoBox" style="top: 200px;">
    <div class="playerInfoBoxContainer">
    </div>
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
        $('#exportTable').hide()
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
            url: baseurl + "index.php/draft/get_events/" + contest,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (events) {
                $.each(events, function (i, event) {
                    $gameFilter.find('ul').append('<li class="eventFilter" tidh="' + event.team_id_home + '" tida="'
                        + event.team_id_away + '">' +
                        '<div class="awayTeam">' + event.team_name_away + '</div>' +
                        '<div class="homeTeam">@ ' + event.team_name_home + '</div>' +
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
            url: baseurl + "index.php/draft/get_players/" + contest,
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
                            '<a class="playerInfoBtn" href="JavaScript:void(0);">' + player.first_name + ' ' + player.last_name + '</a>' +
                                '<div class="c1Team">(' + player.team_shorthand + ')</div>' +
                                '<div class="c1Img"><img src="<?php echo base_url(); ?>img/' +  (player.role == "Starter" ? 'starter' : (player.role == "Bench" ? 'bench' : (player.role == "Reserve" ? 'reserve' : ''))) +
                                '.png" title="' + (player.role == "Starter" ? 'Starting Player' : (player.role == "Bench" ? 'Bench Player' : (player.role == "Reserve" ? 'Reserve Player' : ''))) + '">&nbsp;</div>' +
                        '</div> ' +
                        '<div class="c2">' +
                        '' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) +
                        '' + '</div>' +
                        '<div class="c3">' + Math.round(parseFloat(player.fp_avg) * 100) / 100 + '</div>' +
                        '<div class="c4">' + Math.round(parseFloat(player.fp_form) * 100) / 100 + '</div>' +
                        '<div class="c5">$' + currencyFormat(parseFloat(player.salary)) + '</div>' +
                        '<a class="draft" href="JavaScript:void(0);">+</a>' +
                        '</div>')

                    $('.exportTable').append('' +
                        '<tr>' +
                        '<td>' + (player.pos == "Defender" ? 'DEF' : (player.pos == "Midfielder" ? 'MID' : (player.pos == "Forward" ? 'FOR' : (player.pos == "Substitute" ? 'SUB' : '')))) + '</td>' +
                        '<td>' + player.first_name + ' ' + player.last_name + '</td>' +
                        '<td>' + player.role + '</td>' +
                        '<td>' + player.team_shorthand + '</td>' +
                        '<td>' + ($('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').attr('tidh') == player.oppid ? $('li.eventFilter').siblings('[tidh="' + player.oppid + '"]').find('.homeTeam').text() : ($('li.eventFilter').siblings('[tida="' + player.oppid + '"]').attr('tida') == player.oppid ? $('li.eventFilter').siblings('[tida="' + player.oppid + '"]').find('.awayTeam').text() : 'error' )) + '</td>' +
                        '<td>' + Math.round(parseFloat(player.fp_avg) * 100) / 100 + '</td>' +
                        '<td>' + Math.round(parseFloat(player.fp_form) * 100) / 100 + '</td>' +
                        '<td>' + currencyFormat(parseFloat(player.salary)) + '</td>' +
                        '</tr>')

                });

                //assigns an onclick function on the list of players
                $('a.draft').on('click', onClickDraft)
                $('.playerDraft').on('click', 'a.draft', onClickDraft)

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

        //export table to excel
        $("#btnExport").click(function (e) {
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#exportTable').html()));
            e.preventDefault();
        });


        const onClickPopUp = function() {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[5];
            const baseurl = "<?php echo base_url(); ?>";
            const parenttableid = $(this).closest('[id]').attr('id')

            if(parenttableid == 'draftPanel') {
                var pid = $(this).parent(this).parent(this).attr('pid')
            } else {
                var pid = $(this).parent(this).parent(this).parent(this).attr('pid')
            }
            
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
            var countDef = $('#draftTeamDef').children('.playerDraft').length
            var countMid = $('#draftTeamMid').children('.playerDraft').length
            var countFor = $('#draftTeamFor').children('.playerDraft').length
            const task = event.target.parentElement
            const list = task.parentElement.id
            const pid = $(this).attr('pid')
            const posFilterSelected = $('.posFilter.selected').html()
            const lists = {
                draftPanel: document.getElementById('draftPanel'),
                draftTeamDef: document.getElementById('draftTeamDef'),
                draftTeamMid: document.getElementById('draftTeamMid'),
                draftTeamFor: document.getElementById('draftTeamFor')
            }

            var parentId = $(this).closest('[id]').attr('id')

            if(parentId == 'draftPanel') {
                var cost = parseFloat($(this).siblings('.c5').text().split('$').join('').split(',').join(''))
                var playerSalary = $(this).siblings(".c5").text()
                var playerPos = $(this).siblings(".c0").text()
            } else {

            }

            console.log(cost)

            var sumDefCalc = parseFloat($('#sumDef').text().split('$').join('').split(',').join(''))
            var sumMidCalc = parseFloat($('#sumMid').text().split('$').join('').split(',').join(''))
            var sumForCalc = parseFloat($('#sumFor').text().split('$').join('').split(',').join(''))
            var sumOfCost = cost + sumDefCalc + sumMidCalc + sumForCalc

            //If Player is Defender
            if (parentId == 'draftPanel' && playerPos == 'DEF' && countDef < 4 && playerSalary != '0.00' && sumOfCost <= 100000) {
                console.log(cost)
                $(this).html('-')
                $(this).siblings('.c0').addClass('c0d').removeClass('c0')
                $(this).siblings('.c1').children('.c1Team').addClass('c1dTeam').removeClass('c1Team')
                $(this).siblings('.c1').children('.c1Img').addClass('c1dImg').removeClass('c1Img')
                $(this).siblings('.c1').addClass('c1d').removeClass('c1')
                $(this).siblings('.c2').addClass('c2d').removeClass('c2')
                $(this).siblings('.c3').addClass('c3d').removeClass('c3')
                $(this).siblings('.c4').addClass('c4d').removeClass('c4')
                $(this).siblings('.c5').addClass('c5d').removeClass('c5')

                $(this).siblings('.c1d').children('a.playerInfoBtn').append('  ')
                $(this).siblings('.c2d').prepend('<b>OPP:  </b>')
                $(this).siblings('.c3d').prepend('<b>Avg. FP</b><br>')
                $(this).siblings('.c4d').prepend('<b>Form</b><br>')

                $(this).siblings('.c0d').wrap('<div class="draftPosBox">')
                $(this).siblings('.c1d, .c2d').wrapAll('<div class="draftPlayerBox">')
                $(this).siblings('.c3d, .c4d').wrapAll('<div class="draftInfoBox">')
                $(this).siblings('.c5d').wrap('<div class="draftSalaryBox">')

                lists[list === 'draftTeamDef' ? 'draftPanel' : 'draftTeamDef'].appendChild(task)

                //to ensure player is not added if a different position filter is selected
                if (typeof posFilterSelected == 'undefined' && list === 'draftTeamDef') {

                } else if (playerPos != posFilterSelected && list === 'draftTeamDef') {
                    $(this).parent().hide()
                }
            } else if (parentId == 'draftPanel' && playerPos == 'DEF' && countDef > 3) {
                alert('You can only choose 4 DEFENDERS!');
            } else if (parentId == 'draftPanel' && playerPos == 'DEF' && sumOfCost > 100000) {
                alert('You will be over the SALARY CAP!')
            }

            //If Player is Midfielder
            if (parentId == 'draftPanel' && playerPos == 'MID' && countMid < 4 && playerSalary != '0.00' && sumOfCost <= 100000) {
                $(this).html('-')
                $(this).siblings('.c0').addClass('c0d').removeClass('c0')
                $(this).siblings('.c1').children('.c1Team').addClass('c1dTeam').removeClass('c1Team')
                $(this).siblings('.c1').children('.c1Img').addClass('c1dImg').removeClass('c1Img')
                $(this).siblings('.c1').addClass('c1d').removeClass('c1')
                $(this).siblings('.c2').addClass('c2d').removeClass('c2')
                $(this).siblings('.c3').addClass('c3d').removeClass('c3')
                $(this).siblings('.c4').addClass('c4d').removeClass('c4')
                $(this).siblings('.c5').addClass('c5d').removeClass('c5')

                $(this).siblings('.c1d').children('a.playerInfoBtn').append('  ')
                $(this).siblings('.c2d').prepend('<b>OPP:  </b>')
                $(this).siblings('.c3d').prepend('<b>Avg. FP</b><br>')
                $(this).siblings('.c4d').prepend('<b>Form</b><br>')

                $(this).siblings('.c0d').wrap('<div class="draftPosBox">')
                $(this).siblings('.c1d, .c2d').wrapAll('<div class="draftPlayerBox">')
                $(this).siblings('.c3d, .c4d').wrapAll('<div class="draftInfoBox">')
                $(this).siblings('.c5d').wrap('<div class="draftSalaryBox">')

                lists[list === 'draftTeamMid' ? 'draftPanel' : 'draftTeamMid'].appendChild(task)

                //to ensure player is not added if a different position filter is selected
                if (typeof posFilterSelected == 'undefined' && list === 'draftTeamMid') {

                } else if (playerPos != posFilterSelected && list === 'draftTeamMid') {
                    $(this).parent().hide()
                }
            } else if (parentId == 'draftPanel' && playerPos == 'MID' && countMid > 3) {
                alert('You can only choose 4 MIDFIELDERS!');
            } else if (parentId == 'draftPanel' && playerPos == 'MID' && sumOfCost > 100000) {
                alert('You will be over the SALARY CAP!')
            }

            if (parentId == 'draftPanel' && playerPos == 'FOR' && countFor < 2 && playerSalary != '0.00' && sumOfCost <= 100000) {
                $(this).html('-')
                $(this).siblings('.c0').addClass('c0d').removeClass('c0')
                $(this).siblings('.c1').children('.c1Team').addClass('c1dTeam').removeClass('c1Team')
                $(this).siblings('.c1').children('.c1Img').addClass('c1dImg').removeClass('c1Img')
                $(this).siblings('.c1').addClass('c1d').removeClass('c1')
                $(this).siblings('.c2').addClass('c2d').removeClass('c2')
                $(this).siblings('.c3').addClass('c3d').removeClass('c3')
                $(this).siblings('.c4').addClass('c4d').removeClass('c4')
                $(this).siblings('.c5').addClass('c5d').removeClass('c5')

                $(this).siblings('.c1d').children('a.playerInfoBtn').append('  ')
                $(this).siblings('.c2d').prepend('<b>OPP:  </b>')
                $(this).siblings('.c3d').prepend('<b>Avg. FP</b><br>')
                $(this).siblings('.c4d').prepend('<b>Form</b><br>')

                $(this).siblings('.c0d').wrap('<div class="draftPosBox">')
                $(this).siblings('.c1d, .c2d').wrapAll('<div class="draftPlayerBox">')
                $(this).siblings('.c3d, .c4d').wrapAll('<div class="draftInfoBox">')
                $(this).siblings('.c5d').wrap('<div class="draftSalaryBox">')

                lists[list === 'draftTeamFor' ? 'draftPanel' : 'draftTeamFor'].appendChild(task)

                //to ensure player is not added if a different position filter is selected
                if (typeof posFilterSelected == 'undefined' && list === 'draftTeamFor') {

                } else if (playerPos != posFilterSelected && list === 'draftTeamFor') {
                    $(this).parent().hide()
                }
            } else if (parentId == 'draftPanel' && playerPos == 'FOR' && countFor > 1) {
                alert('You can only choose 2 FORWARDS!');
            } else if (parentId == 'draftPanel' && playerPos == 'FOR' && sumOfCost > 100000) {
                alert('You will be over the SALARY CAP!')
            }

            if (parentId == 'draftTeamDef') {
                $(this).html('+')
                $(this).siblings('.draftPosBox').children('.c0d').unwrap()
                $(this).siblings('.draftPlayerBox').children('.c1d, .c2d').unwrap()
                $(this).siblings('.draftInfoBox').children('.c3d, .c4d').unwrap()
                $(this).siblings('.draftSalaryBox').children('.c5d').unwrap()

                $(this).siblings('.c0d').addClass('c0').removeClass('c0d')
                $(this).siblings('.c1d').children('.c1dTeam').addClass('c1Team').removeClass('c1dTeam')
                $(this).siblings('.c1d').children('.c1dImg').addClass('c1Img').removeClass('c1dImg')
                $(this).siblings('.c1d').addClass('c1').removeClass('c1d')
                $(this).siblings('.c2d').addClass('c2').removeClass('c2d')
                $(this).siblings('.c3d').addClass('c3').removeClass('c3d')
                $(this).siblings('.c4d').addClass('c4').removeClass('c4d')
                $(this).siblings('.c5d').addClass('c5').removeClass('c5d')

                $(this).siblings('.c1').not('a.playerInfoBtn').prepend('  ')
                $(this).siblings('.c2').html($(this).siblings('.c2').html().substring(9))
                $(this).siblings('.c3').html($(this).siblings('.c3').html().substring(18))
                $(this).siblings('.c4').html($(this).siblings('.c4').html().substring(15))

                $(this).siblings('.draftPosBox').remove()
                $(this).siblings('.draftPlayerBox').remove()
                $(this).siblings('.draftInfoBox').remove()
                $(this).siblings('.draftSalaryBox').remove()

                lists[list === 'draftTeamDef' ? 'draftPanel' : 'draftTeamDef'].appendChild(task)
            } else if (parentId == 'draftTeamMid') {
                $(this).html('+')
                $(this).siblings('.draftPosBox').children('.c0d').unwrap()
                $(this).siblings('.draftPlayerBox').children('.c1d, .c2d').unwrap()
                $(this).siblings('.draftInfoBox').children('.c3d, .c4d').unwrap()
                $(this).siblings('.draftSalaryBox').children('.c5d').unwrap()

                $(this).siblings('.c0d').addClass('c0').removeClass('c0d')
                $(this).siblings('.c1d').children('.c1dTeam').addClass('c1Team').removeClass('c1dTeam')
                $(this).siblings('.c1d').children('.c1dImg').addClass('c1Img').removeClass('c1dImg')
                $(this).siblings('.c1d').addClass('c1').removeClass('c1d')
                $(this).siblings('.c2d').addClass('c2').removeClass('c2d')
                $(this).siblings('.c3d').addClass('c3').removeClass('c3d')
                $(this).siblings('.c4d').addClass('c4').removeClass('c4d')
                $(this).siblings('.c5d').addClass('c5').removeClass('c5d')

                $(this).siblings('.c1').not('a.playerInfoBtn').prepend('  ')
                $(this).siblings('.c2').html($(this).siblings('.c2').html().substring(9))
                $(this).siblings('.c3').html($(this).siblings('.c3').html().substring(18))
                $(this).siblings('.c4').html($(this).siblings('.c4').html().substring(15))

                $(this).siblings('.draftPosBox').remove()
                $(this).siblings('.draftPlayerBox').remove()
                $(this).siblings('.draftInfoBox').remove()
                $(this).siblings('.draftSalaryBox').remove()

                lists[list === 'draftTeamMid' ? 'draftPanel' : 'draftTeamMid'].appendChild(task)
            } else if (parentId == 'draftTeamFor') {
                $(this).html('+')
                $(this).siblings('.draftPosBox').children('.c0d').unwrap()
                $(this).siblings('.draftPlayerBox').children('.c1d, .c2d').unwrap()
                $(this).siblings('.draftInfoBox').children('.c3d, .c4d').unwrap()
                $(this).siblings('.draftSalaryBox').children('.c5d').unwrap()

                $(this).siblings('.c0d').addClass('c0').removeClass('c0d')
                $(this).siblings('.c1d').children('.c1dTeam').addClass('c1Team').removeClass('c1dTeam')
                $(this).siblings('.c1d').children('.c1dImg').addClass('c1Img').removeClass('c1dImg')
                $(this).siblings('.c1d').addClass('c1').removeClass('c1d')
                $(this).siblings('.c2d').addClass('c2').removeClass('c2d')
                $(this).siblings('.c3d').addClass('c3').removeClass('c3d')
                $(this).siblings('.c4d').addClass('c4').removeClass('c4d')
                $(this).siblings('.c5d').addClass('c5').removeClass('c5d')

                $(this).siblings('.c1').not('a.playerInfoBtn').prepend('  ')
                $(this).siblings('.c2').html($(this).siblings('.c2').html().substring(9))
                $(this).siblings('.c3').html($(this).siblings('.c3').html().substring(18))
                $(this).siblings('.c4').html($(this).siblings('.c4').html().substring(15))

                $(this).siblings('.draftPosBox').remove()
                $(this).siblings('.draftPlayerBox').remove()
                $(this).siblings('.draftInfoBox').remove()
                $(this).siblings('.draftSalaryBox').remove()

                lists[list === 'draftTeamFor' ? 'draftPanel' : 'draftTeamFor'].appendChild(task)
            }

//            //if selected player is defender
//            if (playerPos == 'DEF' && playerSalary != '0.00') {
//                //initial limit for number of defenders: 4
//                if (countDef > 3 && list === 'draftPanel' && playerPos == 'DEF') {
//                    alert('You can only choose 4 DEFENDERS!');
//                } else if (sumOfCost > 100000) {
//                    alert('You will be over the SALARY CAP!')
//                } else {
//                    lists[list === 'draftTeamDef' ? 'draftPanel' : 'draftTeamDef'].appendChild(task)
//
//                    //to ensure player is not added if a different position filter is selected
//                    if (typeof posFilterSelected == 'undefined' && list === 'draftTeamDef') {
//
//                    } else if (playerPos != posFilterSelected && list === 'draftTeamDef') {
//                        $(this).parent().hide()
//                    }
//                }
//                //if selected player is midfielder
//            } else if (playerPos == 'MID' && playerSalary != '0.00') {
//                //initial limit for number of midfielders: 4
//                if (countMid > 3 && list === 'draftPanel' && playerPos == 'MID') {
//                    alert('You can only choose 4 MIDFIELDERS!');
//                } else if (sumOfCost > 100000) {
//                    alert('You will be over the SALARY CAP!')
//                } else {
//                    lists[list === 'draftTeamMid' ? 'draftPanel' : 'draftTeamMid'].appendChild(task)
//
//                    //to ensure player is not added if a different position filter is selected
//                    if (typeof posFilterSelected == 'undefined' && list === 'draftTeamMid') {
//
//                    } else if (playerPos != posFilterSelected && list === 'draftTeamMid') {
//                        $(this).parent().hide()
//                    }
//                }
//                //if selected player is forward
//            } else if (playerPos == 'FOR' && playerSalary != '0.00') {
//
//            }
            console.log($('#draftTeamDef').children('.playerDraft').children('.draftSalaryBox').children('.c5d'))

            var countDef = $('#draftTeamDef').children('.playerDraft').children('.draftSalaryBox').children('.c5d').length
            var countMid = $('#draftTeamMid').children('.playerDraft').children('.draftSalaryBox').children('.c5d').length
            var countFor = $('#draftTeamFor').children('.playerDraft').children('.draftSalaryBox').children('.c5d').length

            $('#draftTeamDef').children('.playerDraft').children('.draftSalaryBox').children('.c5d').each(function()
            {
                sumDef += parseFloat($(this).text().split('$').join('').split(',').join(''))
                $('#sumDef').empty()
                $('#sumDef').html('$' + sumDef)
            });

            $('#draftTeamMid').children('.playerDraft').children('.draftSalaryBox').children('.c5d').each(function()
            {
                sumMid += parseFloat($(this).text().split('$').join('').split(',').join(''))
                $('#sumMid').empty()
                $('#sumMid').html('$' + sumMid)
            });

            $('#draftTeamFor').children('.playerDraft').children('.draftSalaryBox').children('.c5d').each(function()
            {
                sumFor += parseFloat($(this).text().split('$').join('').split(',').join(''))
                $('#sumFor').empty()
                $('#sumFor').html('$' + sumFor)
            })

            var sumTotal = 100000 - sumDef - sumMid - sumFor
            var countTotal = 10 - countDef - countMid - countFor;

            $('.salaryRemainingValue').html('  $' + currencyFormat(sumTotal))
            if (isFinite(sumTotal/countTotal)) {
                $('.salaryPerPlayerValue').html('  $' + currencyFormat(sumTotal / countTotal))
            } else {
                $('.salaryPerPlayerValue').html('  $ -')
            }


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
                if ( parseFloat($.trim($(a).find(".c5").text().split('$').join('').split(',').join(''))) > parseFloat($.trim($(b).find(".c5").text().split('$').join('').split(',').join(''))) ) {
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
                if ( parseFloat($.trim($(a).find(".c5").text().split('$').join('').split(',').join(''))) > parseFloat($.trim($(b).find(".c5").text().split('$').join('').split(',').join(''))) ) {
                    return -1;
                } else {
                    return 1;
                }
            });
            $("#draftPanel").html(sortbyteam);
            $('a.draft').on('click', onClickDraft)
        });

        const onClickContestInfo = function () {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[6];
            const baseurl = "<?php echo base_url(); ?>";
            const cid = <?php echo $contest_id; ?>

            console.log(cid)

            $('.contestInfoBoxContainer').empty()

            $('#contestInfoBg').fadeIn()
            $('#contestInfoBox').fadeIn()


            $.ajax({
                type: "GET",
                url: baseurl + "index.php/draft/get_contest_details/" + cid,
                dataType: "json",
                global: false,
                tryCount: 0,
                retryLimit: 3,
                success: function (contests) {

                    $.each(contests, function (i, contest) {
                        $('.contestInfoBoxContainer').append('' +
                            '<div class="contestInfo">' +
                            '<div class="contestInfoName">' + contest.contest_name + '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>' + contest.start_time + '</div>' +
                            '<div class="contestInfoDetails2">Start Time</div>' +
                            '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>' + contest.start_date + '</div>' +
                            '<div class="contestInfoDetails2">Start Date</div>' +
                            '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>RP 10,000,000*</div>' +
                            '<div class="contestInfoDetails2">Prizes</div>' +
                            '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>FREE</div>' +
                            '<div class="contestInfoDetails2">Entry Fee</div>' +
                            '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>' + contest.entry_count + ' / ' + contest.entry_max + '</div>' +
                            '<div class="contestInfoDetails2">Prizes for top 50</div>' +
                            '</div>' +
                            '<div class="contestInfoDetails">' +
                            '<div>' + contest.user_entry_count + '</div>' +
                            '<div class="contestInfoDetails2">Number of Entries</div>' +
                            '</div>' +
                            '<div class="contestInfoLast">' +
                            '</div>' +
                            '</div>' +
                            '<div class="mainmediabox">' +
                            '<div class="mediabox1">' +
                            '<div class="inputHeading">' +
                            '<b>Pick a team of 10 players from the following games:</b>' +
                            '</div>' +
                            '<div class="games">' +
                            '<div class="gameLast"></div>' +
                            '</div>' +
                            '<br/><br/>' +
                            '<div class="inputHeading1">' +
                            '<b>Scoring Categories:</b>' +
                            '</div>' +
                            '<div class="scoring1">' +
                            '<div class="scoringHeading">Goal</div>' +
                            '<div class="scoringValue">5 Pts.</div>' +
                            '<div class="scoringHeading">Assist</div>' +
                            '<div class="scoringValue">4 Pts.</div>' +
                            '<div class="scoringHeading">Completed Pass</div>' +
                            '<div class="scoringValue">0.02 Pts.</div>' +
                            '<div class="scoringHeading">Completed Key Pass</div>' +
                            '<div class="scoringValue">1 Pts.</div>' +
                            '<div class="scoringHeading">Cross</div>' +
                            '<div class="scoringValue">0.4 Pts.</div>' +
                            '<div class="scoringHeading">Completed Cross</div>' +
                            '<div class="scoringValue">1 Pts.</div>' +
                            '<div class="scoringHeading">Tackle</div>' +
                            '<div class="scoringValue">0.4 Pts.</div>' +
                            '<div class="scoringHeading">Interception</div>' +
                            '<div class="scoringValue">0.4 Pts.</div>' +
                            '<div class="scoringHeading">Clearance</div>' +
                            '<div class="scoringValue">0.5 Pts.</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="mediabox2">' +
                            '<div class="inputHeading1">' +
                            '<b>Prize Payout Structure</b>' +
                            '</div>' +
                            '<div class="prizes">' +
                            '<div class="prizesHeading"><b>1st:</b></div>' +
                            '<div class="prizesValue">40% of Prize Pool</div>' +
                            '<div class="prizesHeading"><b>2nd:</b></div>' +
                            '<div class="prizesValue">20% of Prize Pool</div>' +
                            '<div class="prizesHeading"><b>3rd:</b></div>' +
                            '<div class="prizesValue">15% of Prize Pool</div>' +
                            '<div class="prizesHeading"><b>4th - 13th:</b></div>' +
                            '<div class="prizesValue">0.1% of Prize Pool Per Person</div>' +
                            '<div class="prizesHeading"><b>14th - 25th:</b></div>' +
                            '<div class="prizesValue">0.066% of Prize Pool Per Person</div>' +
                            '<div class="prizesHeading"><b>26th - 37th:</b></div>' +
                            '<div class="prizesValue">0.041% of Prize Pool Per Person</div>' +
                            '<div class="prizesHeading"><b>38th - 50th:</b></div>' +
                            '<div class="prizesValue">0.015% of Prize Pool Per Person</div>' +
                            '</div>' +
                            '</div> <!-- /content -->' +
                            '</div> <!-- /tabs -->')

                    })
                },
                complete: function() {
                    $.ajax({
                        type: "GET",
                        url: baseurl + "index.php/draft/get_events/" + cid,
                        dataType: "json",
                        tryCount: 0,
                        retryLimit: 3,
                        success: function (events) {
                            $.each(events, function (i, event) {

                                $('.games').append('' +
                                    '<div class="game">' +
                                    '<div>' + event.team_name_home + '</div>' +
                                    '<div>@ ' + event.team_name_away + '</div>' +
                                    '<div>' + event.start_date + '  ' + event.start_time + '</div>' +
                                    '</div>')

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
                }
            })

        }

        $('#contestInfoBg').on('click', function () {
            $('#contestInfoBg').fadeOut()
            $('#contestInfoBox').fadeOut()
            return false
        })

        $(document).on('click', '#mainContest', onClickContestInfo);


        //pass selected players to form for submission
        $('#myform').submit(function() {
//            $('.playerInfoBoxContainer').empty()
//            $('#playerInfoBg').fadeIn()
//            $('#playerInfoBox').fadeIn()
//
//            function playVideo(){
//                var video = document.getElementById("video");
//                video.play();
//                video.addEventListener("ended",function(){
//                    window.location = "game.html";
//                });
//            }

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


<?php
$data = array(  'value'         =>      'DRAFT TEAM',
'name'          =>      'submit',
'class'         =>      'submit-btn',
);
echo form_submit($data);

echo form_close();
?>

<div class="messagepop pop">
    <form method="post" id="new_message" action="javascript:void(0)">
        <p>What is the Code?<br><input type="text" name="name" id="log" /></p>
        <p><input type="submit" value="Enter" name="commit" id="videoEnterBtn"/>
    </form>
</div>


<div class="messagepopp">
    <div class="messagepoppHeading">Code is:  </div>
    <div class="word">
    </div>
</div>

<div class="overlayVideoBox" id="overlayVideoBox" style="display:none;"></div>
<div class="containerVideoBox" id="containerVideoBox">
    <div class="sponsorHeading">This Contest is Sponsored By:</div>
    <div class="sponsorVideo">
        <video id="video" class="video-js vjs-default-skin" preload="auto" width="640" height="360" onclick="playVideo()">
            <source src="<?php echo base_url(); ?>video/djarum-super.webm" type='video/webm'>
            <source src="<?php echo base_url(); ?>video/djarum-super.mp4" type='video/mp4'>
        </video>
    </div>
</div>

<script type="text/javascript">

    $(function() {
        $('#activatorVideoBox').click(function(){
            $('#overlayVideoBox').fadeIn('fast',function(){
                $('#containerVideoBox').animate({'top':'200px'},500);
            });


            const baseurl = "<?php echo base_url(); ?>";

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/draft/get_words/",
                dataType: "json",
                success: function (words) {
                    var number = Math.floor(Math.random() * 2) + 1

                    $.each(words, function (i, word) {
                        if (word.word_id == number) {
                            $('.messagepopp').children('.word').append(word.word)
                        }
                    });
                }
            })


            var video = document.getElementById("video");
            $('#video').get(0).play();
            $('#containerVideoBox').unbind('click');
            video.addEventListener("ended",function(){
                $('.pop').animate({'top':'45%'},500);

                //  Bind the event handler to the "submit" JavaScript event
                $('form').submit(function (e) {
                    // Get the Login Name value and trim it
                    var name = $.trim($('#log').val());

                    var answer = $.trim($('.messagepopp').children('.word').text())

                    // Check if empty of not
                    if (name  === answer) {
                        $('.submit-btn').click()
                    } else {
                        alert('Incorrect!')
                        return false
                    }
                })

            });


            setTimeout(function() {   //calls click event after a certain time
                $('.messagepopp').animate({'top':'0px'},500);
            }, Math.floor(Math.random() * 20000) + 10000);

            setTimeout(function() {   //calls click event after a certain time
                $('.messagepopp').animate({'top':'-120%'},500);
            }, 55000);

        });

    });

    $.fn.slideFadeToggle = function(easing, callback) {
        return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
    };

</script>
