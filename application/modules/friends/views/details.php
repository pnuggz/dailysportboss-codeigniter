<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 26/08/2016
 * Time: 10:47 AM
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

    #mainContainer {
        width: 1180px;
        padding: 0px 25px 0px 25px;
        float: left;
    }

    #mainLeaguesHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #mainRankingHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #mainInviteHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #overlayInviteBox {
        background-color: black;
        opacity: 0.8;
        position:fixed;
        top:0px;
        bottom:0px;
        left:0px;
        right:0px;
        z-index:120;
    }

    #containerInviteBox {
        position:fixed;
        width: 900px;
        left: calc(50% - 450px);
        background-color: #000019;
        color: white;
        border:2px solid #E66117;
        z-index:121;
        height: 550px;
        display: none;
    }

    #mainUsersHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #horizontalContainer1 {
        float: left;
        width: 100%;
        height: auto;
        margin-bottom: 25px;
    }

    #container1Section1 {
        width: 50%;
        float: left;
    }

    #container1Section2 {
        width: 50%;
        float: right;
    }

    #horizontalContainer2 {
        float: left;
        width: 100%;
        height: auto;
        margin-bottom: 25px;
    }

    #container2Section1 {
        width: 50%;
        float: left;
    }

    #container2Section2 {
        width: 50%;
        float: right;
    }

    #horizontalContainer3 {
        float: left;
        width: 100%;
        height: auto;
        margin-bottom: 25px;
    }

    .invitationBox {
        padding: 10px;
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        color: #000019;
        background-color: #F7E1C8;
        width: 200px;
        float: left;
        border: 1px solid #E66117;
        margin-right: 10px;
        font-size: 13px;
    }

    .infoHeading1 {
        width: auto;
        float: left;
        padding-right: 5px;
    }

    .infoHeading2 {
        width: auto;
        float: left;
        padding-right: 5px;
    }


    .recipientUsername {
        width: 140px;
        float: left;
        font-weight: 700;
    }

    .dateReceived {
        width: 100px;
        float: left;
        font-weight: 700;
        padding-bottom: 10px;
    }

    #pendingInvites {
        width: 100%;
    }

    .deleteInvitation {
        display: block;
        float: left;
        width: 80px;
        margin: 0px 55px 0px 55px;
        padding: 5px;
        background-color: #E66117;
        color: #F7E1C8;
        text-align: center;
        font-weight: 700;
    }

    .mainLeagueInfo {
        min-width: 300px;
        float: left;
        color: #F7E1C8;
    }

    .leagueInfoHeading1 {
        width: auto;
        float: left;
        margin-right: 5px;
    }

    .commissionerHeading {
        width: auto;
        float: left;
        font-weight: 700;
    }

    .seasonInfo {
        width: auto;
        float: left;
        font-weight: 700;
    }

    .upcomingContestsBox {
        min-width: 300px;
        float: left;
    }

    table.upcomingContests {
        max-width: 550px;
        color: #F7E1C8;
    }

    table.upcomingContests th:nth-child(1) {
        text-align: left;
    }

    table.upcomingContests th:nth-child(2) {
        text-align: left;
        padding-left: 15px;
    }

    table.upcomingContests th:nth-child(3) {
        text-align: center;
        padding-left: 15px;
    }

    table.upcomingContests td:nth-child(1) {
        text-align: left;
        font-size: 13px;
        font-weight: 700;
    }

    table.upcomingContests td:nth-child(2) {
        font-size: 13px;
        text-align: center;
        padding-left: 15px;
    }

    table.upcomingContests td:nth-child(3) a:link {
        font-size: 13px;
        text-align: center;
        padding-left: 15px;
        color: #E66117;
        font-weight: 700;
    }

    table.upcomingContests td:nth-child(3) a:visited {
        font-size: 13px;
        text-align: center;
        padding-left: 15px;
        color: #E66117;
        font-weight: 700;
    }

    #numberOfSeasonsContainer {
        overflow-x: auto;
        width: 500px;
    }

    #numberOfSeasons {
        display: block;
        float: left;
        max-width: 400px;
        text-align: center;
        font-weight: 700;
    }

    .seasonNumber {
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        float: left;
        margin-right: 5px;
        display: block;
        width: auto;
        padding: 5px 15px 5px 15px;
        background-color: #000019;
        text-align: center;
        font-weight: 700;
        border: 1px solid #E66117;
        color: #E66117;
    }

    #newSeasonBtn {
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        float: left;
        margin-right: 5px;
        display: block;
        width: auto;
        padding: 5px 15px 5px 15px;
        background-color: #000019;
        text-align: center;
        font-weight: 700;
        border: 1px solid #E66117;
        color: #E66117;
    }

    .rankingTable {
        width: 500px;
        background-color: #000019;
        color: #E66117;
        float: left;
        font-size: 14px;
        border-top: 1px solid #E66117;
        border-left: 1px solid #E66117;
        border-bottom: 1px solid #E66117;
        border-right: 1px solid #E66117;
        overflow-y: scroll;
        padding-left:5px;
    }

    table.rankingTable  td{
        text-align: center;
    }

    table.rankingTable th:nth-child(1) {
        width: 30px;
    }

    table.rankingTable th:nth-child(3) {
        width: 100px;
    }

    table.rankingTable th:nth-child(4) {
        width: 100px;
    }

    table.rankingTable td:nth-child(4) {
        font-weight: 700;
    }

    #currentUsers {
        min-width: 300px;
        float: left;
        font-size: 13px;
        margin-bottom: 15px;
        color: #F7E1C8;
    }

    .usersTable {
        float: left;
        font-size: 14px;
        color: #F7E1C8;

    }

    #sendInviteContainer {
        float: left;
    }
</style>

<div id="mainHeading">FRIENDS LEAGUE PAGE</div>
<div id="loading"><h2>Loading...</h2></div>

<div id="mainContainer">
    <br/>
    <div id="horizontalContainer1">
        <div id="container1Section1">
            <div id="mainLeagueInfo">
            </div>
        </div>
        <div id="container1Section2">
            <div id="upcomingContests">
                <br>
                <div class="upcomingContestsBox">
                    <table class="upcomingContests">
                        <tr>
                            <th>Contest Name</th>
                            <th>Start Date</th>
                            <th></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="horizontalContainer2">
        <div id="container2Section1">
            <div id="mainRankingHeading">
                Current Ranking
            </div>
            <br/>
            <div id="numberOfSeasonsContainer">
                <div id="numberOfSeasons">
                </div>

            <div id="newSeasonBtn">New Season</div>
            </div>
            <br/>
            <div id="rankingTable">
                <table class="rankingTable">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Username</th>
                            <th>Games Played</th>
                            <th>Average FP</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="container2Section2">
            <div id="mainUsersHeading">
                Current Users in this League
            </div>
            <br/>
            <div id="currentUsers">
                <table class="usersTable">
                </table>
            </div>
            <br style="clear: both"/>
            <div id="sendInviteContainer">
                <div id="mainInviteHeading">
                    Invite a Friend
                </div>
                <?php
                $attributes = array('id'  =>   'myform',  'name' => 'myform');

                //        echo form_open();
                ?>
                <?php
                $data = array(  'name'          =>      'username',
                    'id'    =>      'usernameInput',
                    'placeholder'   =>      'Username',
                    'value'         =>      set_value('username'),
                );
                echo form_input($data);

                //        $data = array(  'value'         =>      'SEND INVITE',
                //            'name'          =>      'submit',
                //            'class'         =>      'submit-btn',
                //        );
                //        echo form_submit($data);

                //        echo form_close();
                ?>
                <input type="button" id="sendInviteBtn" value=" Send Invite "/>
            </div>

        </div>
    </div>
    <br/>

    <div id="horizontalContainer3">
        <div id="pendingInvites">
        </div>
    </div>

</div>

<div class="overlayInviteBox" id="overlayInviteBox" style="display:none;"></div>
<div class="containerInviteBox" id="containerInviteBox">
    Invite Successfully Sent
</div>

<script type="text/javascript">
    //wait for ajax to load before showing page
    $(document).ajaxStop(function () {
        $('#loading').hide()
        $('#mainContainer').show()
        $('.submit-btn').hide()
    });

    //wait for ajax to load before showing page
    $(document).ajaxStart(function () {
        $('#loading').show()
        $('#mainContainer').hide()
    });

    //page function -- document.ready
    $(function () {
        const baseurl = "<?php echo base_url(); ?>";
        const url = $(location).attr('href')
        const segments = url.split('/');
        const user_id = "<?php echo $this->session->userdata('user_id'); ?>"
        const friends_leagues_id = segments[5];
//        const $gameFilter = $('.gameFilter');

        // Get Friends League Info
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_friends_league/" + friends_leagues_id,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (leagues) {
                $.each(leagues, function (i, league) {
                    $('#mainLeagueInfo').append('' +
                        '<div id="mainLeaguesHeading">' + league.league_name + '</div><br>' +
                            '<div class="mainLeagueInfo">' +
                                '<div class="leagueInfoHeading1">Commissioner:  </div>' +
                                    '<div class="commissionerHeading">' + league.owner_username + '</div><br style="clear: both" />' +
                                '<div class="leagueInfoHeading1">Season Number:  </div>' +
                                    '<div class="seasonInfo">' + league.season_number + '</div>' +
                            '</div>')

                });

            },
            complete: function() {
                var num = parseInt($('.seasonInfo').text())
                for(var i = 1; i <= num; i++) {
                    $('#numberOfSeasons').prepend('' +
                        '<div class="seasonNumber' + (i == num ? ' currentSeason' : ' pastSeason') + '">' + i + '</div>')
                }

                $(document).on('click', '.currentSeason', loadCurrentSeason);
                $(document).on('click', '.pastSeason', loadPastSeason);


                // Get Friends League Ranking Table
                $.ajax({
                    type: "GET",
                    url: baseurl + "index.php/friends/get_friends_leagues_table/" + friends_leagues_id + "/" + num,
                    dataType: "json",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function (users) {
                        $.each(users, function (i, user) {
                            $('.rankingTable tbody').append('' +
                                '<tr>' +
                                '<td>' + Math.round(i + 1) + '</td>' +
                                '<td class="tableC1" uid="' + user.user_id + '">' + user.username + '</td>' +
                                '<td>' + user.games_played + '</td>' +
                                '<td>' + user.avg_fp+ '</td>' +
                                '</tr>')
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

        //GET CURRENT USERS
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_current_users/" + friends_leagues_id + "/",
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (users) {
                $.each(users, function (i, user) {
                    $('.usersTable').append('' +
                        '<tr>' +
                            '<td>' + user.username + '</td>' +
                        '</tr>')
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

        //GET CURRENT USERS
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_upcoming_friends_leagues_contests/" + friends_leagues_id + "/",
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (contests) {
                $('#upcomingContests').prepend('' +
                    '<div id="mainInviteHeading">Upcoming Contests</div>')

                $.each(contests, function (i, contest) {
                    $('.upcomingContests').append('' +
                        '<tr>' +
                            '<td>' + contest.contest_name + '</a></td>' +
                            '<td>' + contest.start_date + '</td>' +
                            '<td><a href="' + baseurl + 'draft/add/' + contest.contest_id + '/">ENTER</a></td>' +
                        '</tr>')
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

        const loadCurrentSeason = function() {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
            const user_id = "<?php echo $this->session->userdata('user_id'); ?>"
            const friends_leagues_id = segments[5];
            var num = $(this).text()

            $('.rankingTable tbody').empty()

            console.log(num)

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/friends/get_friends_leagues_table/" + friends_leagues_id + "/" + num,
                dataType: "json",
                tryCount: 0,
                retryLimit: 3,
                success: function (users) {
                    if(users == 'null') {
                        $('.rankingTable tbody').append('' +
                            '<tr>' +
                            '<td colspan="4">Currently No Results</td>' +
                            '</tr>')
                        alert('empty')
                    } else {

                        $.each(users, function (i, user) {
                            $('.rankingTable tbody').append('' +
                                '<tr>' +
                                '<td>' + Math.round(i + 1) + '</td>' +
                                '<td uid="' + user.user_id + '">' + user.username + '</td>' +
                                '<td>' + user.games_played + '</td>' +
                                '<td>' + user.avg_fp + '</td>' +
                                '</tr>')

                        });
                    }
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

        const loadPastSeason = function() {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
            const user_id = "<?php echo $this->session->userdata('user_id'); ?>"
            const friends_leagues_id = segments[5];
            var num = $(this).text()

            $('.rankingTable tbody').empty()

            console.log(num)

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/friends/get_friends_leagues_table_past/" + friends_leagues_id + "/" + num,
                dataType: "json",
                tryCount: 0,
                retryLimit: 3,
                success: function (users) {
                    $.each(users, function (i, user) {
                        $('.rankingTable tbody').append('' +
                            '<tr>' +
                                '<td>' + Math.round(i + 1) + '</td>' +
                                '<td>' + user.username + '</td>' +
                                '<td>' + user.games_played + '</td>' +
                                '<td>' + user.avg_fp+ '</td>' +
                            '</tr>')
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

        // Get Sent Friends Request
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_sent_friends_request/" + friends_leagues_id,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (invitations) {
                $('#pendingInvites').prepend('' +
                    '<div id="mainInviteHeading">Pending Invites</div><br/>')

                $.each(invitations, function (i, invitation) {
                    $('#pendingInvites').append('' +
                        '<div class="invitationBox">' +
                            '<div class="infoHeading1">Sent To:  </div>' +
                                '<div class="recipientUsername">' + invitation.recipient_username + '</div>' +
                            '<div class="infoHeading2">Date Sent:  </div>' +
                                '<div class="dateReceived">' + invitation.date_sent + '</div>' +
                            '<div class="deleteInvitation" flid="' + invitation.friends_league_id +
                            '" sid="' + invitation.sender_id + '" rid="' + invitation.recipient_id + '">DELETE</div>' +
                        '</div>')
                });

                $(document).on('click', '.deleteInvitation', deleteInvitation);
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
        
        const deleteInvitation = function() {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
//            const friends_leagues_id = segments[5];
            var flid = $(this).attr('flid')
            var sid = $(this).attr('sid')
            var rid = $(this).attr('rid')

            $.ajax({
                context: this,
                type: "POST",
                url: baseurl + "index.php/friends/delete_invitation/",
                dataType: "json",
                data: {flid: flid, sid: sid, rid: rid},
                success: function (data) {

                }

            })

            $(this).parent().remove()

        }


        // Get Past Friends League Ranking Table
//        $.ajax({
//            type: "GET",
//            url: baseurl + "index.php/friends/get_friends_leagues_table_past/" + friends_leagues_id + "/" + num,
//            dataType: "json",
//            tryCount: 0,
//            retryLimit: 3,
//            success: function (users) {
//                $.each(users, function (i, user) {
//                    $('.rankingTable').append('' +
//                        '<tr>' +
//                        '<td>' + Math.round(i + 1) + '</td>' +
//                        '<td>' + user.username + '</td>' +
//                        '<td>' + user.games_played + '</td>' +
//                        '<td>' + user.avg_fp+ '</td>' +
//                        '</tr>')
//                });
//
//            },
//            error: function (xhr, textStatus, errorThrown) {
//                if (textStatus == 'timeout') {
//                    this.tryCount++
//                    if (this.tryCount <= this.retryLimit) {
//                        $.ajax(this);
//                        return;
//                    }
//                    return
//                }
//                if (xhr.status == 500) {
//                    //handle error
//                } else {
//                    //handle error
//                }
//            }
//        })

        // Get Friends Request Count
//        $.ajax({
//            type: "GET",
//            url: baseurl + "index.php/friends/get_sent_friends_request/" + user_id,
//            dataType: "json",
//            tryCount: 0,
//            retryLimit: 3,
//            success: function (requests) {
//                $.each(requests, function (i, request) {
//                    $('#mainRequestHeading').append('' +
//                        'Friends League Requests (' + request.count + ')')
//                });
//
//            },
//            error: function (xhr, textStatus, errorThrown) {
//                if (textStatus == 'timeout') {
//                    this.tryCount++
//                    if (this.tryCount <= this.retryLimit) {
//                        $.ajax(this);
//                        return;
//                    }
//                    return
//                }
//                if (xhr.status == 500) {
//                    //handle error
//                } else {
//                    //handle error
//                }
//            }
//        })

    })
</script>

<script type="text/javascript">

    $(function() {
        $('#sendInviteBtn').click(function () {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
            const friends_leagues_id = segments[5];
            var username = $('#usernameInput').val()
            var username1 = $('#usernameInput').val()
            console.log(username)

            $.ajax({
                type: "GET",
                url: baseurl + "index.php/friends/invitation_check/" + username + "/" + friends_leagues_id + "/",
                dataType: "json",
                success: function (usernames) {
                    $.each(usernames, function (i, username) {
                        
                        if (username.checker == 0) {
                            var recipient_id = username.recipient_id
                            var sender_id = "<?php echo $this->session->userdata('user_id'); ?>"
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "index.php/friends/submit_invite/" + friends_leagues_id + "/",
                                dataType: 'json',
                                data: {sender_id: sender_id, recipient_id: recipient_id},
                                success: function (res) {
                                    $('#containerInviteBox').html('Invitation Successfully Sent')
                                    $('#overlayInviteBox').fadeIn()
                                    $('#containerInviteBox').fadeIn()
                                }
                            })

                            var d = new Date();

                            var month = d.getMonth()+1;
                            var day = d.getDate();

                            var output = d.getFullYear() + '-' +
                                ((''+month).length<2 ? '0' : '') + month + '-' +
                                ((''+day).length<2 ? '0' : '') + day;

                            if ( !$.trim( $('#pendingInvites').html() ).length ) {
                                $('#pendingInvites').prepend('' +
                                    '<div id="mainInviteHeading">Pending Invites</div>')
                            }

                            $('#pendingInvites').append('' +
                                '<div class="invitationBox">' +
                                '<div class="infoHeading1">Sent To:  </div>' +
                                    '<div class="username">' + username1 + '</div>' +
                                '<div class="infoHeading1">Date Sent:  </div>' +
                                    '<div class="dateReceived">' + output + '</div>' +
                                '<div class="deleteInvitation" flid="' + friends_leagues_id +
                                '" sid="' + sender_id + '" rid="' + recipient_id + '">DELETE</div>' +
                                '</div><br/>')

                            $(document).on('click', '.deleteInvitation', deleteInvitation);

                        } else if (username.checker == 1) {
                            $('#containerInviteBox').html('Invitation Already Sent, Awating Reply')
                            $('#overlayInviteBox').fadeIn()
                            $('#containerInviteBox').fadeIn()
                            console.log('Invitation Already Sent, Awaiting Reply')
                        } else if (username.checker == 2) {
                            $('#containerInviteBox').html('Username Does Not Exist')
                            $('#overlayInviteBox').fadeIn()
                            $('#containerInviteBox').fadeIn()
                            console.log('Username Does Not Exist')
                        }   else if (username.checker == 3) {
                            $('#containerInviteBox').html('User is Already in Your Friends League')
                            $('#overlayInviteBox').fadeIn()
                            $('#containerInviteBox').fadeIn()
                            console.log('User is Already in Your Friends League')
                        }   else if (username.checker == 4) {
                            $('#containerInviteBox').html('User Already Have a Pending Invitation')
                            $('#overlayInviteBox').fadeIn()
                            $('#containerInviteBox').fadeIn()
                            console.log('User is Already in Your Friends League')
                        }
                        
                    })
                }
            })
        })
    })

    $(document).on('click', '.deleteInvitation', deleteInvitation)

    function deleteInvitation() {
        if(confirm("Are you sure you want to delete invitation?")) {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
//          const friends_leagues_id = segments[5];
            var flid = $(this).attr('flid')
            var sid = $(this).attr('sid')
            var rid = $(this).attr('rid')

            $.ajax({
                context: this,
                type: "POST",
                url: baseurl + "index.php/friends/delete_invitation/",
                dataType: "json",
                data: {flid: flid, sid: sid, rid: rid},
                success: function (data) {

                }

            })

            $(this).parent().remove()
        } else {
            e.preventDefault();
        }


    }


    $('#overlayInviteBox').on('click', function(){
        $('#overlayInviteBox').fadeOut()
        $('#containerInviteBox').fadeOut()
        return false
    })

    $(document).on('click', '#newSeasonBtn', html2json)

    function html2json() {
        if(confirm("Are you sure you want to start a new season?"))
        {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
            const friends_leagues_id = segments[5];
            var username = $('#usernameInput').val()
            var season_number = $(this).siblings('.currentSeason').html()

            console.log(season_number)
            console.log($('.rankingTable').find('.tableC1').attr('uid'))

            $('.rankingTable thead').remove()
            var json = '{';
            var otArr = [];
            var tbl2 = $('.rankingTable tr').each(function(i) {
                x = $(this).children();
                var itArr = [];
                x.each(function() {
                    itArr.push('"' + $(this).text() + '"');
                });
                itArr.push('"' + friends_leagues_id + '"');
                itArr.push('"' + season_number + '"');
                itArr.push('"' + $(this).find('.tableC1').attr('uid') + '"');
                otArr.push('"' + i + '": [' + itArr.join(',') + ']');
            })
            json += otArr.join(",") + '}'

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/friends/save_season_history/" + friends_leagues_id + "/",
                data: {history_table: json},
                success: function () {
                    alert('success')
                    console.log(json)
                    $('.seasonNumber').prepend('<div>' + Math.round(parseInt(season_number) + 1) + '</div>')
                    $('.seasonInfo').html(Math.round(parseInt(season_number) + 1))

                    $('.rankingTable tbody').remove()

                    $('.rankingTable').append('' +
                        '<thead>' +
                        '<tr>' +
                        '<th>Position</th>' +
                        '<th>Username</th>' +
                        '<th>Games Played</th>' +
                        '<th>Average FP</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                        '</tbody>');
                },
                error: function() {
                    $('.rankingTable').prepend('' +
                        '<thead>' +
                        '<tr>' +
                        '<th>Position</th>' +
                        '<th>Username</th>' +
                        '<th>Games Played</th>' +
                        '<th>Average FP</th>' +
                        '</tr>' +
                        '</thead>');
                }
            })

            return json;
        }
        else
        {
            e.preventDefault();
        }



    }


</script>