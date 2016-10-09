<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 26/07/2016
 * Time: 6:01 PM
 */

?>

<div id="section-one">
    <div class="section-one-left">&nbsp;</div>
    <div class="section-one-right">&nbsp;</div>
    <div class="section-one-content">
        <div class="one-heading-one">
            <img class="img-logo" src="<?php echo base_url(); ?>img/largelogo.png">
            <br>
            <br>
            THINK YOU KNOW SPORTS?
            <br>
            PROVE IT.
        </div>
        <div class="one-heading-three">
            <b>GAME CHANGING DAILY FANTASY SPORTS.</b>
            <br>
            <div class="intro-vid">
                <video id="video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="1200" height="675" poster="">
                    <source src="video/Daily-Sport-Manager-revA.webm" type='video/webm'>
                    <source src="video/Daily-Sport-Manager-revA.mp4" type='video/mp4'>
                </video>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        videojs("video").ready(function () {
            var myPlayer = this;
            myPlayer.on("pause", function () {
                myPlayer.bigPlayButton.show();
            });
            myPlayer.on("play", function () {
                myPlayer.bigPlayButton.hide();
            });
        });
    });
</script>

<div id="section-two">
    <div class="section-two-left">&nbsp;</div>
    <div class="section-two-right">&nbsp;</div>
    <div class="section-two-content">
        <div class="two-image">
            <img src="<?php echo base_url(); ?>img/how-to-play.png">
        </div>
    </div>
</div>

<div id="section-three">
    <div class="section-three-left">&nbsp;</div>
    <div class="section-three-right">&nbsp;</div>
    <div class="section-three-content">
        <div class="section-three-text">
            <div class="three-heading-one">
                <b>WIN REAL CASH</b>
            </div>
            <div class="three-heading-three">
                Awarding <b>millions</b> in real cash prizes to event winners thanks to our sponsors. Check out grand sponsored events, below!
            </div>
        </div>
        <div class="three-image">
        </div>
    </div>
</div>


<div id="section-four">
    <div class="section-four-left">&nbsp;</div>
    <div class="section-four-right">&nbsp;</div>
    <div class="section-four-content">
        <div class="section-four-text">
            <div class="four-heading-one">
                With <b>millions</b> of users enjoying <b>Daily Fantasy Sport</b> around the world, <b>don't be the last to play!</b>
            </div>
            <div class="four-heading-three">
                <br><a href="<?php echo base_url() ?>draft/lobby/">JOIN NOW</a>
            </div>
        </div>
    </div>
</div>
