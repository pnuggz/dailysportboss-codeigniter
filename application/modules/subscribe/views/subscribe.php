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
            <!--            <br>-->
            <!--            <br>-->
            <!--            THINK YOU KNOW SPORTS?-->
            <!--            <br><br>-->
            <!--            PROVE IT.-->
        </div>
        <div class="subscribeContainer">
            <div class="subscribeBox">
                <div class="subscribeHeading">SUBSCRIBE FOR THE LATEST UPDATE</div>
                <input type="text" name="email" id="emailInput" onfocus="if(this.value == 'Email Address') { this.value = ''; }" value="Email Address"><br>
                <input type="submit" name="submit" id="submitBtn" value="JOIN NOW">
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
    <div class="section-two-heading">
        INTERACTIVE, EASY, AND FUN!
    </div>
    <div class="section-two-content">
        <div class="two-image1">
            <img src="<?php echo base_url(); ?>img/step1.png">
        </div>
        <div class="two-image2">
            <img src="<?php echo base_url(); ?>img/step2.png">
        </div>
        <div class="two-image3">
            <img src="<?php echo base_url(); ?>img/step3.png">
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
                Daily Sport Boss is set to introduce the first ever Daily Fantasy Sport in Indonesia, awarding <b>Real Cash</b> prizes to contest winners.
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
                With <b>millions</b> of users enjoying <b>Daily Fantasy Sport</b> around the world, <b>don't miss a second of the action!</b>
            </div>
            <div class="subscribeContainer">
                <div class="subscribeBox">
                    <div class="subscribeHeading">SUBSCRIBE FOR THE LATEST UPDATE</div>
                    <input type="text" name="email" id="emailInput" onfocus="if(this.value == 'Email Address') { this.value = ''; }" value="Email Address"><br>
                    <input type="submit" name="submit" id="submitBtn" value="JOIN NOW">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    var lastScrollTop = 0;
    $(window).scroll(function (event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $('.two-image2 img').animate({bottom: '-=100'}, 100);
        } else {
            $('.two-image2 img').animate({bottom: '+=100'}, 100);
        }
        lastScrollTop = st;
    });



</script>