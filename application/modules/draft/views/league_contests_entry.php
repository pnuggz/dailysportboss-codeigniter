<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 23/04/2016
 * Time: 1:34 PM
 */
?>

<style>


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

    .contestTabs {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    /* Nav */
    .contestTabs nav {
        text-align: center;
        width: 100%;
    }

    .contestTabs nav ul {
        float: left;
        position: absolute;
        display: block;
        margin-top: 20px;
        margin-bottom: 20px;
        left: 40%;
        right: 40%;
        border: 1px solid #E66117;
        padding-left: 0px;
    }

    .contestTabs nav ul li:nth-child(1) {
        margin: 0;
        display: block;
        text-align: center;
        position: relative;
        float: left;
        width: 50%;
        box-sizing: border-box;
        background: #F7E1C8;
        color: #E66117;
    }

    .contestTabs nav ul li:nth-child(2) {
        margin: 0;
        display: block;
        text-align: center;
        position: relative;
        float: right;
        width: 50%;
        box-sizing: border-box;
        background: #F7E1C8;
        color: #E66117;
    }

    .contestTabs nav li:nth-child(1).contestTabCurrent {
        z-index: 100;
        width: 50%;
        float: left;
        box-sizing: border-box;
        background: #E66117;
        color: #F7E1C8;
    }


    .contestTabs nav li:nth-child(2).contestTabCurrent {
        width: 50%;
        z-index: 100;
        float: right;
        box-sizing: border-box;
        background: #E66117;
        color: #F7E1C8;
    }

    .contestTabs nav li.contestTabCurrent:after {
        float: left;
        width: 4000px;
    }

    .contestTabs nav a {
        color: #E66117;
        display: block;
        font-family: 'Open Sans', sans-serif;
        font-size:  12px;
        line-height: 3;
        text-decoration: none;
    }

    .contestTabs nav a:hover {
        color: #E66117;;
        text-decoration: none;
    }

    .contestTabs nav li.contestTabCurrent a {
        font-family: 'Open Sans', sans-serif;
        font-size:  12px;
        color: #F7E1C8;
        text-decoration: none;
    }

    /* Content */
    .content section {
        display: none;
        width: 100%;
    }

    .content section:before,
    .content section:after {
        content: '';
        display: table;
    }

    .content section:after {
        clear: both;
    }

    /* Fallback example */
    .no-js .content section {
        display: block;
        padding-bottom: 2em;
        box-sizing: border-box;
    }

    .content section.contentCurrent {
        width: 100%;
        height: 100%;
        display: block;
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

    .scoring {
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

    .loginButton {
        text-align: center;
        float: right;
        display: block;
        border: 1px solid #E66117;
        background-color: #E66117;
        padding: 10px 30px 10px 30px;
        font-family: 'Open Sans', sans-serif;
        font-size:  16px;
    }

    .loginButton a:link {
        color: #F7E1C8;
        font-family: 'Open Sans', sans-serif;
        font-size:  16px;
        text-decoration: none;
    }

    .loginButton a:visited {
        color: #F7E1C8;
        font-family: 'Open Sans', sans-serif;
        font-size:  16px;
        text-decoration: none;
    }

</style>

<div id="mainHeading">LOBBY</div>

<br>
<?php
    echo $this->session->flashdata('noaccess');
?>
<br>
<?php if($active_contests) : ?>
<?php foreach($active_contests->result() as $row) {
$league_id = $row->leagues_id;
$league_name = $row->league_name;
?>
    <div id="mainLeague"><?php echo $league_name;  break; } ?></div>

<div id="lobby-table">&nbsp;
    <table class="game-table">
        <tr>
            <th class="game-container-data-1"></th>
            <th class="game-container-data-2"></th>
            <th class="game-container-data-3">Contest</th>
            <th class="game-container-data-4">Entry Size</th>
            <th class="game-container-data-5">Entry Fee</th>
            <th class="game-container-data-6">Sponsor</th>
            <th class="game-container-data-7">Prizes</th>
            <th class="game-container-data-8">Start Date</th>
            <th class="game-container-data-9"></th>
            <th class="game-container-data-10"></th>
        </tr>
        <?php
        foreach($active_contests->result() as $row) {
        $contest_id = $row->contests_id;
        $contest_name = $row->contest_name;
        $league_shorthand = $row->league_shorthand;
        $start_date = $row->start_date;
        $start_time = $row->start_time;
        $entry_max = $row->entry_max;
        $entry_count = $row->entry_count;
        $sponsor_id = $row->sponsors_id;
        ?>
        <tr>
            <td></td>
            <td><img src="<?php echo base_url(); ?>img/tablesporttype.png"></td>
            <td class="game-container-data-4" cid="<?php echo $contest_id; ?>"><?php echo $contest_name; ?></td>
            <td><?php echo $entry_count; ?> / <?php echo $entry_max?></td>
            <td>FREE</td>
            <td><b>DJARUM</b></td>
            <td><b>RP 10,000,000*</b></td>
            <td><b><?php echo $start_date; ?>  <?php echo $start_time; ?></b></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo base_url(); ?>draft/add/<?php echo $contest_id; ?>/">ENTER</a></td>
        </tr>
        <?php } else : ?>

        <?php endif; ?>
    </table>
</div>


<div class="contestInfoBg" id="contestInfoBg"></div>
<div class="contestInfoBox" id="contestInfoBox">
    <div class="contestInfoBoxContainer"></div>
</div>

<script type="text/javascript">
    $(function () {

        const onClickPopUp = function () {
            const url = $(location).attr('href')
            const segments = url.split('/');
            const contest = segments[6];
            const baseurl = "<?php echo base_url(); ?>";
            const cid = $(this).attr('cid')

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
                            '<div class="scoring">' +
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

        $(document).on('click', '.game-container-data-4', onClickPopUp);
    })
</script>

