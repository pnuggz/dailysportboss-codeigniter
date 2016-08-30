<?php
/**
 * Created by PhpStorm.
 * User: RIZZ-ASUS
 * Date: 28/07/2016
 * Time: 12:26 PM
 */
?>

<style>
    #container {
        width: 100%;
        height: 100%;
        margin-top: 20px;
        padding-left: 10px;
        padding-right: 10px;
        display: block;
        box-sizing: border-box;
    }

    .assistanceHeading {
        font-family: 'Open Sans', sans-serif;
        font-size: 18px;
        font-weight:700;
        color: #F7E1C8;
    }

    .assistanceContainer {
        display: block;
        width: 1000px;
        padding-left: 3px;
        padding-top: 50px;
        margin: 0px auto;
        box-sizing: border-box;
    }

    .assistanceBox {
        width: 233px;
        padding: 20px;
        margin-right: 20px;
        box-sizing: border-box;
        float: left;
        background-color: #F7E1C8;
        border: 1px solid #E66117;
        height: 120px;
    }

    .assistanceBoxLast {
        width: 233px;
        padding: 20px;
        box-sizing: border-box;
        float: left;
        background-color: #F7E1C8;
        border: 1px solid #E66117;
        height: 120px;
    }

    .assistanceContentHeading {
        text-align: center;
        margin-top: -40px;
        background-color: #E66117;
        width: auto;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
        color: #F7E1C8;
    }

    .assistanceContentHeading a:link {
        text-align: center;
        margin-top: -40px;
        background-color: #E66117;
        width: auto;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
        color: #F7E1C8;
        text-decoration: none;
    }

    .assistanceContentHeading a:visited {
        text-align: center;
        margin-top: -40px;
        background-color: #E66117;
        width: auto;
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
        color: #F7E1C8;
        text-decoration: none;
    }

    .assistanceContent {
        text-align: justify;
        padding-top: 20px;
        font-size: 14px;
        color: #000019;
    }

    .faqContainer {
        width: 100%;
        float: left;
        margin-top: 50px;
        margin-bottom: 50px;
        color: #F7E1C8;
        font-family: 'Open Sans', sans-serif;
        padding-left: 40px;
        padding-right: 40px;
        box-sizing: border-box;
    }

    .mainFaqHeading {
        color: #E66117;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .faqHeading {
        color: #E66117;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .faqContent {
        font-size: 14px;
        font-weight: 500;
        padding-bottom: 30px;
        text-align: justify;
        border-bottom: 1px solid #6b2d04;
    }

    .faqContent a:link {
        font-size: 14px;
        font-weight: 500;
        padding-bottom: 30px;
        text-align: justify;
        border-bottom: 1px solid #6b2d04;
        color: #E66117;
    }

    .faqContent a:visited {
        font-size: 14px;
        font-weight: 500;
        padding-bottom: 30px;
        text-align: justify;
        border-bottom: 1px solid #6b2d04;
        color: #E66117;
    }
</style>

<div id="mainHeading">HELP PAGE</div>

<div id="container">

    <div class="assistanceHeading">To get assistance, please select one of the following issues:</div>

    <div class="assistanceContainer">&nbsp;
        <div class="assistanceBox">
            <div class="assistanceContentHeading">FAQ</div>
            <div class="assistanceContent">
                Get answers from your very own <b>Personal Assistant</b> below.
            </div>
        </div>
        <div class="assistanceBox">
            <div class="assistanceContentHeading"><a href="javascript:void(0)">HOW TO PLAY</a></div>
            <div class="assistanceContent">
                View our <b>How to Play Video</b>, and brush up your drafting and managerial skills.
            </div>
        </div>
        <div class="assistanceBox">
            <div class="assistanceContentHeading"><a href="<?php echo base_url(); ?>help/rules/">RULES & SCORING</a></div>
            <div class="assistanceContent">
                <b>A Boss's best friend.</b> Study the ins and outs of the game to become the <b>Special One</b>.
            </div>
        </div>
        <div class="assistanceBoxLast">
            <div class="assistanceContentHeading"><a href="javascript:void(0)">SUPPORT</a></div>
            <div class="assistanceContent">
                Still <b>need help?</b> Contact one of our team members to assist you.
            </div>
        </div>
    </div>

    <div class="faqContainer">&nbsp;
        <div class="mainFaqHeading">
            FAQ (Frequently Asked Questions)
        </div>

        <div class="faqHeading">What is Daily Sport Boss?</div>
        <div class="faqContent">
        Before we start, we must differentiate the following:
            <br/><br/>
        User = You, the aspiring Daily Sport Boss’s <br/>
        Player = The real life sport players that you will draft (pick) to create your very own ultimate fantasy sport team
            <br/><br/>
        Daily Sport Boss (DSB) is a daily and weekly fantasy sports platform where our users compete in various free Daily Fantasy Sport (DFS) contests against their friends and other aspiring Daily Sport Boss’s. Users are able to draft (create) their ultimate fantasy sport team based on how they believe each player will perform in their respective upcoming real-life game.
        As with any real life sport managers, our users are limited to a fixed amount of fantasy money (salary cap) in each contest for their ultimate team. This is the only limiting factor in creating your ultimate fantasy sport team.
            <br/><br/>
        Once the contest starts, each player will start to accumulate Fantasy Points (FP) based on certain accomplishments achieved in their respective game (see Rules & Scoring for more details). These Fantasy Points will accumulate towards your team score in the contest.
            <br/><br/>
        At the end of the contest, when every game is finished, the users will be ranked against other users. The user who place within the prize payout structure will win prizes.
        </div>
        <br/>

        <div class="faqHeading">How do I play?</div>
        <div class="faqContent">
        Please refer to our <a href="<?php echo base_url(); ?>help/howtoplay/">HOW TO PLAY</a> and <a href="<?php echo base_url(); ?>help/rules/">RULES & SCORING</a> sections to learn more about the details of the game.
        </div>
        <br/>

        <div class="faqHeading">Do I have to pay to play?</div>
        <div class="faqContent">
        No. Daily Sport Boss (DSB) is completely free-to-play.
            <br/><br/>
        However please note that in order be part of the prize pool and get a chance to win our daily prizes, you will have to watch a short video advertisement from the contest sponsors. While you are able to skip the video advertisements and still enjoy the game, you will be excluded from the prize pool if you do so.
        </div>
        <br/>

        <div class="faqHeading">How are the prize payout allocated?</div>
        <div class="faqContent">
        Depending on the contest size and sponsor, different contests will have different Prize Payout Allocations. Please see each contest details to see the breakdown.
        </div>
        <br/>

        <div class="faqHeading">How do I sign up?</div>
        <div class="faqContent">
        Simply create an account, and join in on the excitement!
        </div>
        <br/>

        <div class="faqHeading">Who can play Daily Sport Boss?</div>
        <div class="faqContent">
        Users must be 18+ years of age and a resident of Indonesia to play Daily Sport Boss.
            <br/><br/>
        For more information please see our Terms and Conditions.
        </div>
        <br/>

        <div class="faqHeading">Where can I see contests I have entered?</div>
        <div class="faqContent">
        All contests you have entered – either upcoming, running, or completed – is in the Games section of the website.
        </div>
        <br/>

        <div class="faqHeading">How do I edit my team?</div>
        <div class="faqContent">
        To Edit your team, simply go to the Games section of the website, and click on View to be taken to the respective Game page. From here, you can click Edit to change your ultimate fantasy sport team accordingly.
            <br/><br/>
        You have until the commencement of the first match for that contest to Edit your team. After such time, your team is ‘locked’.
        </div>
        <br/>

        <div class="faqHeading">I’ve WON! Now what?</div>
        <div class="faqContent">
        Congratulations!
            <br/><br/>
        If you have managed to outwit and outmatch other Daily Sport Boss’s, and placed within the Prize Payout Structure, you will receive an email with details on how to claim your prize.
        </div>
        <br/>

        <div class="faqHeading">What if there are ties in the final ranking? What happens to the Prize?</div>
        <div class="faqContent">
        In the event of a tie, the Prize will be split evenly between the users.
        </div>
        <br/>

        <div class="faqHeading">What if the stats are incorrect, and consequently I did not receive the correct number of Fantasy Points?</div>
        <div class="faqContent">
        As Daily Sport Boss gets our player statistics from a third party, we can only finalise our results based on their final summary.
        All contest results, once deemed final and finished, are not up for interpretation.
        </div>

    </div>
</div>
