<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 29/07/2016
 * Time: 10:54 AM
 */
?>
<style>
    a.selected {
        background-color:#1F75CC;
        color:white;
        z-index:100;
    }

    .messagepop {
        background-color:#FFFFFF;
        border:1px solid #999999;
        cursor:default;
        display:none;
        margin-top: 15px;
        position:absolute;
        text-align:left;
        width:394px;
        z-index:150;
        padding: 25px 25px 20px;
    }

    .messagepop p, .messagepop.div {
        border-bottom: 1px solid #EFEFEF;
        margin: 8px 0;
        padding-bottom: 8px;
    }

    .messagepopp {
        background-color:#FFFFFF;
        border:1px solid #999999;
        cursor:default;
        display:none;
        margin-top: 100px;
        position:absolute;
        text-align:left;
        width:394px;
        z-index:150;
        padding: 25px 25px 20px;
    }

    .messagepopp p, .messagepop1.div {
        border-bottom: 1px solid #EFEFEF;
        margin: 8px 0;
        padding-bottom: 8px;
    }

    .answer {
        /*display: none;*/
    }

    .overlay-kane {
        background-color: black;
        opacity: 0.8;
        position:fixed;
        top:0px;
        bottom:0px;
        left:0px;
        right:0px;
        z-index:120;
    }

    a.activator-kane {
        width:auto;
        height:auto;
        float:right;
        z-index:1;
        cursor:pointer;
    }

    .login-box-kane {
        position:fixed;
        top:-200%;
        width: 900px;
        left: calc(50% - 450px);
        background-color: black;
        color: white;
        border:2px solid #f66606;
        z-index:121;
        height: 550px;
    }

    .sponsor-video {
        float: left;
        margin-top: 90px;
        margin-left: 125px;
    }

    .top-line-container {
        width: 100%;
        float: left;
        height: 100px;
        display: inline-block;
    }

    .playerinfo-container {
        width: 400px;
        margin-left: 25px;
        display: inline-block;
    }


</style>

<div class="messagepop pop">
    <form method="post" id="new_message" action="/messages">
        <p>What is the Code?<input type="text" name="name" id="log" /></p>
        <p><input type="submit" value="Send Message" name="commit" id="message_submit"/>
    </form>
</div>


<div class="messagepopp">
    <div class="word">
    </div>
</div>


<a href="javascript:void(0)" id="contact">Contact Us</a>

<div id="activator-kane">TEST</div>

<script type="text/javascript">

    $(function() {
        const baseurl = "<?php echo base_url(); ?>";

        $('#contact').on('click', function() {
            $.ajax({
                type: "GET",
                url: baseurl + "index.php/help/get_words/",
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

            setTimeout(function() {   //calls click event after a certain time
                $('.messagepopp').slideFadeToggle();
            }, Math.floor(Math.random() * 20000) + 10000);

            setTimeout(function() {   //calls click event after a certain time
                $('.messagepopp').slideFadeToggle();
            }, 40000);


            $('.pop').slideFadeToggle();


//  Bind the event handler to the "submit" JavaScript event
            $('form').submit(function (e) {
// Get the Login Name value and trim it
                var name = $.trim($('#log').val());

                var answer = $.trim($('.answer').text())

// Check if empty of not
                if (name  === answer) {
                    alert('Correct!');
                    return false
                } else {
                    alert('Incorrect!')
                    return false
                }
                return false
            })

        })


    });

    $(function() {
        $('#activator-kane').click(function(){
            $('#overlay-kane').fadeIn('fast',function(){
                $('#login-box-kane').animate({'top':'200px'},500);
            });


            const baseurl = "<?php echo base_url(); ?>";

                $.ajax({
                    type: "GET",
                    url: baseurl + "index.php/help/get_words/",
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
                $('#video_cotainer').unbind('click');
                video.addEventListener("ended",function(){
                    $('.pop').slideFadeToggle();

                    //  Bind the event handler to the "submit" JavaScript event
                    $('form').submit(function (e) {
                        // Get the Login Name value and trim it
                        var name = $.trim($('#log').val());

                        var answer = $.trim($('.messagepopp').children('.word').text())

                        // Check if empty of not
                        if (name  === answer) {
                            alert('Correct!');
                            return false
                        } else {
                            alert('Incorrect!')
                            return false
                        }
                    })

                });


                setTimeout(function() {   //calls click event after a certain time
                    $('.messagepopp').slideFadeToggle();
                }, Math.floor(Math.random() * 20000) + 10000);

                setTimeout(function() {   //calls click event after a certain time
                    $('.messagepopp').slideFadeToggle();
                }, 55000);

        });
        $('#overlay-kane').click(function(){
            $('#login-box-kane').animate({'top':'-120%'},500,function(){
                $('#overlay-kane').fadeOut('fast');
            });
        });

    });

    $.fn.slideFadeToggle = function(easing, callback) {
        return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
    };

</script>

<div class="overlay-kane" id="overlay-kane" style="display:none;"></div>
<div class="login-box-kane" id="login-box-kane">
    <div class="sponsor-video">
        <video id="video" class="video-js vjs-default-skin" preload="auto" width="640" height="360" onclick="playVideo()">
            <source src="<?php echo base_url(); ?>video/djarum-super.webm" type='video/webm'>
            <source src="<?php echo base_url(); ?>video/djarum-super.mp4" type='video/mp4'>
        </video>
    </div>
</div>
