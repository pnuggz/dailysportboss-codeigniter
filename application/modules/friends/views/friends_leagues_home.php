<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 26/08/2016
 * Time: 8:16 AM
 */
?>

<style>
    #mainContainer {
        width: 1180px;
        margin-left: 10px;
        float: left;
        padding: 0px 25px 0px 25px;
    }

    #mainLeaguesHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #mainRequestHeading {
        font-family: 'Open Sans', sans-serif;
        font-size:  24px;
        font-weight: 900;
        color: #F7E1C8;
        width: 80%;
    }

    #topContainer {
        float: left;
        width: 100%;
        margin-bottom: 25px;
    }

    #bottomContainer {
        float: left;
        width: 100%;
    }

    #invitationContainer {
        float: left;
        width: 100%;
        height: auto;
    }

    .invitationBox {
        padding: 10px;
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        color: #000019;
        background-color: #F7E1C8;
        width: 250px;
        float: left;
        border: 1px solid #E66117;
        margin-right: 10px;
        font-size: 13px;
    }

    .leagueName {
        width: 100%;
        color: #E66117;
        font-size: 18px;
        font-weight: 700;
        float: left;
        padding-bottom: 5px;
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


    .senderUsername {
        width: 150px;
        float: left;
        font-weight: 700;
    }

    .dateReceived {
        width: 100px;
        float: left;
        font-weight: 700;
        padding-bottom: 10px;
    }

    .acceptInvitation {
        float: left;
        width: 80px;
        padding: 5px;
        margin-left: 25px;
        background-color: #E66117;
        color: #F7E1C8;
        text-align: center;
        font-weight: 700;
    }

    .rejectInvitation {
        float: right;
        width: 80px;
        padding: 5px;
        margin-right: 25px;
        background-color: #E66117;
        color: #F7E1C8;
        text-align: center;
        font-weight: 700;
    }


</style>

<div id="mainHeading">FRIENDS LEAGUE PAGE</div>

<div id="mainContainer">
    <div id="topContainer">
        <div id="mainRequestHeading">
        </div>
        <br/>
        <div id="invitationContainer">
        </div>
    </div>
    <div id="bottomContainer">
        <div id="mainLeaguesHeading">
            Friends Leagues
        </div>
        <br/>
        <div id="leagueTable">
            <table class="game-table">
                <tr>
                    <th>League Name</th>
                    <th>League Owner</th>
                    <th>Season Number</th>
                </tr>
            </table>
        </div>
    </div>
    <br/>

</div>

<script type="text/javascript">
    //wait for ajax to load before showing page
    $(document).ajaxStop(function () {
        $('#loading').hide()
        $('#mainContainer').show()
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
//        const contest = segments[6];
//        const $gameFilter = $('.gameFilter');

        // Get Friends League List
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_friends_leagues_list/" + user_id,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (leagues) {
                $.each(leagues, function (i, league) {
                    $('.game-table').append('' +
                        '<tr>' +
                            '<td class="game-container-data-3" leagueid="' + league.friends_league_id + '">' +
                            '' + league.league_name + '</td>' +
                            '<td class="game-container-data-4">' + league.owner_username + '</td>' +
                            '<td class="game-container-data-5">' + league.season_number + '</td>' +
                            '<td class="game-container-data-10">' +
                                '<a href="' + baseurl + 'friends/details/' + league.friends_league_id + '/">ENTER</a>' +
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

//        // Get Friends Request Count
//        $.ajax({
//            type: "GET",
//            url: baseurl + "index.php/friends/get_friends_requests_count/" + user_id,
//            dataType: "json",
//            tryCount: 0,
//            retryLimit: 3,
//            success: function (requests) {
//                $.each(requests, function (i, request) {
//                    $('#mainRequestHeading').append('' +
//                        'Friends Leagues Invites (' + request.count + ')')
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

        // Get Friends Request 
        $.ajax({
            type: "GET",
            url: baseurl + "index.php/friends/get_friends_request/" + user_id,
            dataType: "json",
            tryCount: 0,
            retryLimit: 3,
            success: function (invitations) {
                $('#mainRequestHeading').append('<br/>' +
                    'Friends Leagues Invites')

                $.each(invitations, function (i, invitation) {

                    $('#invitationContainer').append('' +
                        '<div class="invitationBox">' +
                        '<div class="leagueName">' + invitation.friends_league_name + '</div>' +
                        '<div class="infoHeading1">Sent By:  </div>' +
                            '<div class="senderUsername">' + invitation.sender_username + '</div>' +
                        '<div class="infoHeading2">Date Received:  </div>' +
                            '<div class="dateReceived">' + invitation.date_sent + '</div>' +
                        '<div class="acceptInvitation" flid="' + invitation.friends_league_id +
                        '" sid="' + invitation.sender_id + '" rid="' + invitation.recipient_id + '">ACCEPT</div>' +
                        '<div class="rejectInvitation" flid="' + invitation.friends_league_id +
                        '" sid="' + invitation.sender_id + '" rid="' + invitation.recipient_id + '">REJECT</div>' +
                        '</div>')
                });

                $(document).on('click', '.acceptInvitation', acceptInvitation);

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

        const acceptInvitation = function() {
            const baseurl = "<?php echo base_url(); ?>";
            const url = $(location).attr('href')
            const segments = url.split('/');
            const friends_leagues_id = segments[6];
            var flid = $(this).attr('flid')
            var sid = $(this).attr('sid')
            var rid = $(this).attr('rid')

            $.ajax({
                context: this,
                type: "POST",
                url: baseurl + "index.php/friends/accept_invitation/",
                dataType: "json",
                data: {flid: flid, sid: sid, rid: rid},
                success: function (data) {
                    if (data.success == true) {
                        location.reload()
                    }

                }

            })

        }

    })
</script>