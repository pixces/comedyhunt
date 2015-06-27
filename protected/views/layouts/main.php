<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Comedy Hunt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- Style Starts Here -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/owl.carousel.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/owl.theme.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/owl.transitions.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type='text/css' />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/media-queries.css" type='text/css' />
    <!-- Style Ends Here -->
</head>
<body>
<div class="CH-Wrapper">
<!-- Navigation Starts Here -->
<div class="CH-NavWrapper">
    <div class="CH-Navigation">
        <!-- Main Menu Starts Here -->
        <div class="CH-MainMenu">
            <a id="CH-MobileMenu" href="javascript:void(0)"></a>
            <ul>
                <li><a href="<?=Yii::app()->createAbsoluteUrl('/'); ?>" class="active transition">Home</a></li>
                <li><a href="<?=Yii::app()->createAbsoluteUrl('/gallery/'); ?>" class="transition">Gallery</a></li>
                <li><a href="<?=Yii::app()->createAbsoluteUrl('/site/faq/'); ?>" class="transition">Faq's</a></li>
                <li class="no-border"><a href="<?=Yii::app()->createAbsoluteUrl('/site/pages/?view=rules'); ?>" class="transition">Rules</a></li>
            </ul>
        </div>
        <!-- Main Menu Ends Here -->

        <!-- Social Icons Starts Here -->
        <div class="CH-SocialIcons">
            <ul>
                <li class="googleplus"><a href="javascript:void(0)" class="transition"></a></li>
                <li class="facebook"><a href="javascript:void(0)" class="transition"></a></li>
                <li class="twitter"><a href="javascript:void(0)" class="transition"></a></li>
            </ul>
        </div>
        <!-- Social Icons Ends Here -->
    </div>
</div>
<!-- Navigation Ends Here -->

<?php echo $content; ?>

<!-- TimeLine Starts Here -->
<div class="CH-TimeLine">
    <div class="CH-TimeLineBG"></div>
    <div class="CH-CompetitionTimeline">
        <div class="CH-TimelineContent">
            <span class="CH-Head">Competition <br/>timeline</span>
            <span class="CH-Description">We are looking for the best new comedy talent from the country. You can submit your entries till 21st July. And then get ready for the funniest ride of your life, as we throw one funny challenge after another at the selected creators. And if you want to be at the Finale, keep watching this space for more details</span>
        </div>
        <div class="CH-TimelineRules">
            <div class="CH-TimelineRulesImage"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/competition-timeline.png" class="img-responsive" /></div>
            <div class="CH-Phase1">
                <span class="CH-Title">Auditions Phase</span>
                <span class="CH-Description">Anyone* can submit a video to be considered for the Challenge Phase. Last Date <b>21st July</b></span>
            </div>
            <div class="CH-Phase2">
                <span class="CH-Title">Challenge Phase</span>
                <span class="CH-Description">Selected Contestants will get one challenge every week from our Jury, and they will put out a funny video every week in response - don't miss a single video !</span>
            </div>
            <div class="CH-Phase3">
                <span class="CH-Title">Finale</span>
                <span class="CH-Description">5 best contestants will be chosen at the end of the challenges - stay tuned for the Finale details</span>
            </div>
        </div>
    </div>
</div>
<!-- TimeLine Ends Here -->
<!-- Client Logo Starts Here -->
<div class="CH-ClientLogo">
    <div class="CH-ClientLogoBG"></div>
    <div class="CH-ClientLogoBlk">
        <ul>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/quikr-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/micromax-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/royal-challenge-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/garnier-men-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/5star-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sprite-logo.png" /></a></li>
            <li><a href="javascript:void(0)"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yoddly-logo.png" /></a></li>
        </ul>
    </div>
    <div class="CH-SocialIcons">
        <ul>
            <li class="sharetext">Share</li>
            <li class="googleplus"><a class="transition" href="javascript:void(0)"></a></li>
            <li class="facebook"><a class="transition" href="javascript:void(0)"></a></li>
            <li class="twitter"><a class="transition" href="javascript:void(0)"></a></li>
        </ul>
    </div>
    <div class="CH-Links">
        <ul>
            <li><a href="javascript:void(0)">Youtube</a></li>
            <li><a href="javascript:void(0)">Privacy</a></li>
            <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
        </ul>
        <div class="CH-CopyRight">&copy; copyright 2015. All rights reserved</div>
    </div>
</div>
<!-- Client Logo Ends Here -->
</div>

<!-- Overlay Starts Here -->
<div class="overlay-wrapper"></div>

<div class="overlay-content popup1">
    <div class="close-btn"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/close-icon-black.png" /></div>
    <div class="overlay-title"></div>
    <div class="overlay-description">
        <div class="modalVideo"></div>
    </div>
</div>
<!-- Overlay Ends Here -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>

