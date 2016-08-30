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
        margin-bottom: 50px;
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

    .scoringContainer {
        width: 100%;
        float: left;
        margin-top: -40px;
        margin-bottom: 80px;
        color: #F7E1C8;
        font-family: 'Open Sans', sans-serif;
        padding-left: 200px;
        padding-right: 200px;
        box-sizing: border-box;
    }

    .mainScoringHeading {
        color: #E66117;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 20px;
        padding-left: 40px;
    }

    .scoringHeading {
        height: 20px;
        width: 80%;
        float: left;
        font-family: 'Open Sans', sans-serif;
        font-size:  15px;
        font-weight: 600;
        padding-top: 13px;
        padding-bottom: 10px;
        border-bottom: 1px solid #6b2d04;
    }

    .scoringValue {
        height: 20px;
        width: 20%;
        float: left;
        text-align: right;
        font-family: 'Open Sans', sans-serif;
        font-size:  15px;
        font-weight: 600;
        padding-top: 13px;
        padding-bottom: 10px;
        border-bottom: 1px solid #6b2d04;
    }

    .rulesContainer {
        width: 100%;
        float: left;
        margin-bottom: 50px;
        color: #F7E1C8;
        font-family: 'Open Sans', sans-serif;
        padding-left: 40px;
        padding-right: 40px;
        box-sizing: border-box;
    }

    .mainRulesHeading {
        color: #E66117;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 20px;
        padding-left: 40px;
    }

    .rulesHeading {
        color: #E66117;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .rulesContent {
        font-size: 14px;
        font-weight: 500;
        padding-bottom: 30px;
        text-align: justify;
        border-bottom: 1px solid #6b2d04;
    }

    .rulesContent a:link {
        font-size: 14px;
        font-weight: 500;
        padding-bottom: 30px;
        text-align: justify;
        border-bottom: 1px solid #6b2d04;
        color: #E66117;
    }

    .rulesContent a:visited {
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

    <div class="mainScoringHeading">
        SCORING - SOCCER
    </div>
    <div class="scoringContainer">&nbsp;
        <div>
            &nbsp;
        </div>
        <div class="scoringHeading">Goal</div>
        <div class="scoringValue">5 Pts.</div>
        <div class="scoringHeading">Assist</div>
        <div class="scoringValue">4 Pts.</div>
        <div class="scoringHeading">Completed Pass</div>
        <div class="scoringValue">0.02 Pts.</div>
        <div class="scoringHeading">Completed Key Pass</div>
        <div class="scoringValue">1 Pts.</div>
        <div class="scoringHeading">Cross</div>
        <div class="scoringValue">0.4 Pts.</div>
        <div class="scoringHeading">Completed Cross</div>
        <div class="scoringValue">1 Pts.</div>
        <div class="scoringHeading">Tackle</div>
        <div class="scoringValue">0.4 Pts.</div>
        <div class="scoringHeading">Interception</div>
        <div class="scoringValue">0.4 Pts.</div>
        <div class="scoringHeading">Clearance</div>
        <div class="scoringValue">0.5 Pts.</div>
    </div>

    <br/>

    <div class="mainRulesHeading">
        RULES
    </div>

    <div class="rulesContainer">&nbsp;
        <div class="rulesContent">
            <b>In addition to our Terms of Use and Privacy Policy, contests at Daily Sport Boss are governed by the following set of rules:</b>
        </div>
        <br/>

        <div class="rulesHeading">Eligibility</div>
            <div class="rulesContent">
                You must be 18 years of age or over, as well as a resident of AND physically located in Indonesia to play Daily Sport Boss and claim a prize. For further information regarding eligibility, please consult our official Terms of Use.
            </div>
            <br/>

        <div class="rulesHeading">Multiple Accounts</div>
            <div class="rulesContent">
                As a general rule, each player on Daily Sport Boss (DSB) is allowed ONE account only. It is at the discretion of DSB to determine whether, in our judgment, two accounts have been created belonging to the same person. Penalties are at the discretion of DSB, but may include closure of all accounts, and withholding of any prizes that we determine to have been fraudulently obtained.
            </div>
            <br/>

        <div class="rulesHeading">Suspended Accounts</div>
            <div class="rulesContent">
                There are a variety of behaviours that are detrimental to Daily Sport Boss (DSB) and other players on the Service. Engaging in those behaviours may result in suspension of some or all functions associated with your account. Suspended players are expected to respect the disciplinary actions imposed on their accounts, and all communication regarding restoration of your account should take place via the support@dailysportboss.co.id email account.
            </div>
            <br/>

        <div class="rulesHeading">User Names</div>
            <div class="rulesContent">
                Daily Sport Boss (DSB) may require users to change their username or team roster name in cases where the name is offensive or promotes a commercial venture. The requirement to change will be determined at DSB’s sole discretion, and if requests are ignored, DSB may unilaterally change a player’s username or team roster name.
            </div>
            <br/>

        <div class="rulesHeading">Contest Lock Times</div>
            <div class="rulesContent">
                Contests lock when the first game start have commenced. That means no more entries, and no more team changes are permitted.
            </div>
            <br/>

        <div class="rulesHeading">Maximum Entries</div>
            <div class="rulesContent">
                Contests may have limits on the maximum number of entries that a single user may submit. These limits may vary, and they will be specified in the description of each contest.
                <br/><br/>
                Under no circumstances will you be allowed to exceed the entry limits through the use of a different account.
            </div>
            <br/>

        <div class="rulesHeading">Postponed Games</div>
            <div class="rulesContent">
                Rules for how postponed games are treated in Daily Sport Boss (DSB) contests vary depending on the sport and contest type. For EPL contests, you will receive fantasy points for any postponed games that are played before the commencement of the following week.
                <br/><br/>
                If a game is postponed to a later date or called off for any reason, any players you have selected for that game will receive zero fantasy points.
            </div>
            <br/>

        <div class="rulesHeading">Suspended Games</div>
            <div class="rulesContent">
                Rules for how suspended games are treated in Daily Sport Boss (DSB) contests vary depending on the sport and game type. A game is considered suspended if it is unfinished, but to be completed in the future. At a minimum, the statistics compiled prior to the end of the contest period will count towards contests.
            </div>
            <br/>

        <div class="rulesHeading">Traded Players</div>
            <div class="rulesContent">
                Players being traded may impact contests that have already been created with the players on their old teams. Player team listings on Daily Sport Boss are updated based on the last feed we receive from our sport statistics provider. Because contests are created as much as five or six days in advance, traded players may not be available in contests which include a game involving their new team, but not their old team. Also in some instances, a player selected may no longer be available in a contest which includes their old team, but not their new team. In that case, you'll need to select a replacement or be credited with zero fantasy points for the player.
                <br/><br/>
                Most importantly, in the very rare case a player is traded in the middle of a running contest, that player will receive zero fantasy points.
            </div>
            <br/>

        <div class="rulesHeading">Scripts</div>
            <div class="rulesContent">
                Use of unauthorised scripts is prohibited on Daily Sport Boss (DSB).
            </div>
            <br/>

        <div class="rulesHeading">Prize Payment</div>
            <div class="rulesContent">
                Prizes will be awarded to all users those who place within the Prize Payout Structure. Users will then receive an email with details on how to claim their prize.
            </div>
            <br/>

        <div class="rulesHeading">Scoring Revisions</div>
            <div class="rulesContent">
                During the game Daily Sport Boss (DSB) receive live scoring from our stats provider(s). After the game has ended, they will provide a final feed for the game. Once the final feed is received and confirmed by DSB, all contests are closed and results are final.
                <br/><br/>
                In the event of mistakes or updates received after the contest results are finalised, user scores on DSB will not be updated.
            </div>
            <br/>

        <div class="rulesHeading">Service Access and Editing Problems</div>
            <div class="rulesContent">
                While we try to ensure that Daily Sport Boss functions smoothly at all times, like any online service we may periodically experience periods of outage or slow performance. These can sometimes result in an inability to access the Service, problems editing teams, or problems entering new contests.
                <br/><br/>
                If you're unable to access the Service, please report the problems by emailing us at support@dailysportboss.co.id.
            </div>
            <br/>

        <div class="rulesHeading">Contest Cancellation</div>
            <div class="rulesContent">
                Daily Sport Boss (DSB) reserves the right to cancel contests at our discretion, without any restrictions. This would typically be done only in cases where we believe that due to problems on the Service or events impacting the sporting events, there would be a widespread impact on the integrity of contests.
            </div>
            <br/>



    </div>

    <div class="assistanceHeading">For further assistance, please select one of the following:</div>

    <div class="assistanceContainer">&nbsp;
        <div class="assistanceBox">
            <div class="assistanceContentHeading"><a href="<?php echo base_url(); ?>help/">FAQ</a></div>
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
            <div class="assistanceContentHeading">RULES & SCORING</div>
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
</div>
