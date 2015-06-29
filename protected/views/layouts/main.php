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
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/jquery.jscrollpane.css" type='text/css' />
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
                        <li><a href="<?=Yii::app()->createAbsoluteUrl('/'); ?>" class="<?=($this->pagename == 'index') ? 'active ':''; ?> transition">Home</a></li>
                        <li><a href="<?=Yii::app()->createAbsoluteUrl('/gallery/'); ?>" class="<?=($this->pagename == 'gallery') ? 'active ':''; ?>transition">Gallery</a></li>
                        <li><a href="<?=Yii::app()->createAbsoluteUrl('/site/faq/'); ?>" class="<?=($this->pagename == 'faq') ? 'active ':''; ?>transition">Faq's</a></li>
                        <li class="no-border"><a href="<?=Yii::app()->createAbsoluteUrl('/site/page/?view=rules'); ?>" class="<?=($this->pagename == 'page') ? 'active ':''; ?>transition">Rules</a></li>
					</ul>
				</div>
				<!-- Main Menu Ends Here -->

				<!-- Social Icons Starts Here -->
				<div class="CH-SocialIcons">
					<ul>
						<!--li class="googleplus"><a href="javascript:void(0)" class="transition"></a></li-->
						<li class="facebook"><a href="https://www.facebook.com/ComedyHunt?fref=ts" target="_blank" class="transition"></a></li>
						<li class="twitter"><a href="https://twitter.com/comedyhunt" target="_blank" class="transition"></a></li>
					</ul>
				</div>
				<!-- Social Icons Ends Here -->
			</div>
		</div>
		<!-- Navigation Ends Here -->

        <!-- Content Starts -->
        <?php echo $content; ?>
        <!-- Content Ends -->

		<!-- Client Logo Starts Here -->
		<div class="CH-ClientLogo">
			<div class="CH-ClientLogoBG"></div>
			<div class="CH-ClientLogoBlk">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-logo.png" class="img-responsive" />
				<!--ul>
					<li><a href="javascript:void(0)"><img src="images/quikr-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/micromax-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/royal-challenge-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/garnier-men-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/5star-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/sprite-logo.png" /></a></li>
					<li><a href="javascript:void(0)"><img src="images/yoddly-logo.png" /></a></li>
				</ul-->
			</div>
			<div class="CH-SocialIcons">
				<ul>
					<li class="sharetext">Follow Us</li>
					<!--li class="googleplus"><a href="javascript:void(0)" class="transition"></a></li-->
					<li class="facebook"><a href="https://www.facebook.com/ComedyHunt?fref=ts" target="_blank" class="transition"></a></li>
					<li class="twitter"><a href="https://twitter.com/comedyhunt" target="_blank" class="transition"></a></li>
				</ul>
			</div>
			<div class="CH-Links">
				<ul>
					<li><a href="https://youtube.com" target="_blank">Youtube</a></li>
					<li><a href="https://www.google.co.uk/intl/en-GB/policies/privacy/" target="_blank">Privacy</a></li>
					<li><a href="https://www.youtube.com/t/terms" target="_blank">Terms &amp; Conditions</a></li>
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
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.jscrollpane.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.youtubeplaylist.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>
