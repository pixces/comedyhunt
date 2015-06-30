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
                        <!--<li><a href="<?=Yii::app()->createAbsoluteUrl('/gallery/'); ?>" class="<?=($this->pagename == 'gallery') ? 'active ':''; ?>transition">Gallery</a></li>
                        <li><a href="<?=Yii::app()->createAbsoluteUrl('/site/faq/'); ?>" class="<?=($this->pagename == 'faq') ? 'active ':''; ?>transition">Faq's</a></li> -->
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
					<li><a href="<?=Yii::app()->createAbsoluteUrl('/site/page/?view=rules'); ?>" target="_blank">Terms &amp; Conditions</a></li>
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
	
	<div class="overlay-content popup2">
    	<div class="close-btn"><img src="images/close-icon-black.png" /></div>
		<div class="CH-YouTubeTitle">Your Videos</div>
		<form>
			<div class="CH-YouTubeList">
				<div class="scroll-pane">
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="9wMsjGPT_OI" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/9wMsjGPT_OI/default.jpg" data-YouTubeVideoTitle="Aamhi Travelkar- Season 2- Darjeeling - Episode - 10">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="xuCbvNUOqp0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/xuCbvNUOqp0/default.jpg" data-YouTubeVideoTitle="Travel to Ireland with Cox and Kings - Duniya Dekho International Holidays">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="X264_5Yh3Uw" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/X264_5Yh3Uw/default.jpg" data-YouTubeVideoTitle="Beauties of Penang">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="sc8NfWn_QPo" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/sc8NfWn_QPo/default.jpg" data-YouTubeVideoTitle="Kuala Lumpur City Guide">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="Cv3GQDMslL0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/Cv3GQDMslL0/default.jpg" data-YouTubeVideoTitle="Malaysia in a minute!">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="aRG_gTNCJt8" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/aRG_gTNCJt8/default.jpg" data-YouTubeVideoTitle="Melbourne, Australia.">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="81ll2B4zl1g" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/81ll2B4zl1g/default.jpg" data-YouTubeVideoTitle="'Rio 2' Trailer 2">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="9wMsjGPT_OI" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/9wMsjGPT_OI/default.jpg" data-YouTubeVideoTitle="Aamhi Travelkar- Season 2- Darjeeling - Episode - 10">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="xuCbvNUOqp0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/xuCbvNUOqp0/default.jpg" data-YouTubeVideoTitle="Travel to Ireland with Cox and Kings - Duniya Dekho International Holidays">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="X264_5Yh3Uw" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/X264_5Yh3Uw/default.jpg" data-YouTubeVideoTitle="Beauties of Penang">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="sc8NfWn_QPo" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/sc8NfWn_QPo/default.jpg" data-YouTubeVideoTitle="Kuala Lumpur City Guide">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="Cv3GQDMslL0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/Cv3GQDMslL0/default.jpg" data-YouTubeVideoTitle="Malaysia in a minute!">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="aRG_gTNCJt8" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/aRG_gTNCJt8/default.jpg" data-YouTubeVideoTitle="Melbourne, Australia.">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="81ll2B4zl1g" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/81ll2B4zl1g/default.jpg" data-YouTubeVideoTitle="'Rio 2' Trailer 2">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="9wMsjGPT_OI" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/9wMsjGPT_OI/default.jpg" data-YouTubeVideoTitle="Aamhi Travelkar- Season 2- Darjeeling - Episode - 10">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="xuCbvNUOqp0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/xuCbvNUOqp0/default.jpg" data-YouTubeVideoTitle="Travel to Ireland with Cox and Kings - Duniya Dekho International Holidays">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="X264_5Yh3Uw" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/X264_5Yh3Uw/default.jpg" data-YouTubeVideoTitle="Beauties of Penang">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="sc8NfWn_QPo" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/sc8NfWn_QPo/default.jpg" data-YouTubeVideoTitle="Kuala Lumpur City Guide">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="Cv3GQDMslL0" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/Cv3GQDMslL0/default.jpg" data-YouTubeVideoTitle="Malaysia in a minute!">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="aRG_gTNCJt8" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/aRG_gTNCJt8/default.jpg" data-YouTubeVideoTitle="Melbourne, Australia.">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
					<div class="CH-YouTubeListItems" data-YouTubeVideoID="81ll2B4zl1g" data-YouTubeVideoThumbURL="https://i1.ytimg.com/vi/81ll2B4zl1g/default.jpg" data-YouTubeVideoTitle="'Rio 2' Trailer 2">
						<div class="CH-YouTubeThumbImage"><img src="images/youtube-thumb.jpg" /></div>
						<div class="CH-YouTubeThumbTitle">Aamhi Travelkar- Season 2- Darjeeling - Episode - 10</div>
					</div>
				</div>
			</div>
			<input type="hidden" class="YouTubeVideoID" value="" /> 
			<input type="hidden" class="YouTubeVideoThumbURL" value=""  /> 
			<input type="hidden" class="YouTubeVideoTitle" value=""  />
			<input type="submit" value="submit" class="CH-YouTubeVideoSubmit" />
			<div class="CH-YouTubeNote">* Please make sure your video is authorized to the public.</div>			
		</form>
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
