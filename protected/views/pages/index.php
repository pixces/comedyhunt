<!-- Submissions Starts Here -->
<div class="CH-Submissions">
    <div class="CH-SubmissionsContent">
        <div class="CH-SubmissionsText">
            <div class="CH-SubmissionsVideoBlk">
                <div class="CH-SubmissionsVideo transition">
                    <div class="CH-SubmissionsVideoImage"><img src="images/video-image1.png"/></div>
                    <div class="CH-SubmissionsVideoPlay">
                        <a href="javascript:void(0)" data-showpopup="1" class="show-popup"
                           data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><span><img
                                    src="images/video-play-icon.png"/></span></a>
                    </div>
                </div>
            </div>
            <div class="CH-SubmissionsTextContainer">
                <?php if (Yii::app()->user->hasFlash('videoInformationSubmitted')) { ?>
				<div class="CH-Head acenter">Thank you for <br/>your submission</div>
                <?php } else { ?>
				<div>
					<div class="CH-SubHead">Your Route to Stardom</div>
					<div class="CH-Text no-margin">
						<ul>
							<li>Set up your own YouTube channel</li>
							<li>Shoot your entry video</li>
							<li>Upload your entry video on to your YouTube channel, with the title in this format: "Comedy Hunt – entry video title"</li>
							<li>Read the terms and conditions on this page,  and enter your details below</li>
							<li>Click on the check box, press the Submit button, follow the steps after that & and keep checking this channel and our social handles for updates!</li>
						</ul>
					</div>
				</div>
                <?php } ?>
            </div>
        </div>
        <div class="CH-SubmissionsContentBG"></div>
        <div class="CH-SubmissionsForm">
            <div class="CH-SubmissionsFormContainer">
                <div class="CH-SubmissionsTextContainer">
					<div>
						<div class="CH-SubHead">Your Route to Stardom</div>
						<div class="CH-Text no-margin">
							<ul>
								<li>Set up your own YouTube channel</li>
								<li>Shoot your entry video</li>
								<li>Upload your entry video on to your YouTube channel, with the title in this format: "Comedy Hunt – entry video title"</li>
								<li>Read the terms and conditions on this page,  and enter your details below</li>
								<li>Click on the check box, press the Submit button, follow the steps after that & and keep checking this channel and our social handles for updates!</li>
							</ul>
						</div>
					</div>
                </div>
				<div class="CH-SubmitButton">
					<div>
						<a href="<?=Yii::app()->baseUrl."/pages/authenticate?media=youtube"; ?>" class="authenticate">Authenticate with youtube <br/>to submit video.</a>						
						<a class="show-popup" data-showpopup="2" href="<?=Yii::app()->baseUrl."/pages/videos?media=youtube"; ?>">Select your video</a>
						<div class="CH-SubmitButton no-margin "><a href="'.Yii::app()->createUrl('/').'">Submit another video</a></div>
					</div>
					<div class="CH-FormGroupSubmit">
						<div><input type="checkbox" class="termscheckbox" />I agree to the <a href="<?=Yii::app()->createAbsoluteUrl('/site/page/?view=rules'); ?>" target="_blank">terms and conditions</a></div>
						<div class="errorterms">You must agree to the terms and conditions before register.</div>
					</div>
					<div class="CH-Disclaimer"><span>Disclaimer:</span> This data is collected by OML, and stored at OML's 3rd party servers for contest administration purpose only, and will not be used for any other purpose</div>
					
				</div>
        </div>
    </div>
</div>
<!-- Submissions Ends Here -->

<!-- Videos Carousel Starts Here -->
<div class="CH-VideoCarousel">
    <div class="CH-VideoCarouselBG"></div>
    <div class="CH-VideoCarouselContent">
        <div class="CH-VideoCarouselIcon"><img src="images/inspired-videos-icon.png"/></div>
        <div class="CH-VideoCarouselHead">Need a little inspiration?</div>
        <p>Our judges all earned their comedy credentials, one video at a time. Watch the masters at work.</p>

        <div class="CH-VideoCarouselBlk">
            <div id="CH-VideoCarousel">
                <?php if ($gallery){
                    foreach($gallery as $video){ ?>

                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="<?=$video->thumb_image; ?>"/></div>
                        <div class="CH-VideoThumbPlay">
                            <a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="<?=$video->title; ?>" data-videoURL="<?=$video->media_id; ?>"><img src="images/video-thumb-play.png"/></a>
                        </div>
                    </div>
                    <div class="CH-Description"><?=$video->title; ?></div>
                </div>
                <?php } } ?>
            </div>
        </div>
        <div class="CH-WorkshopDate">
            <p>Want some Comedy coaching? The Comedy Hunt judges will be sharing their smarts with the new generation.
                Learn some laugh-logic on these dates.</p>

            <div class="CH-WorkshopCity">
               <div>
					<span>4th July</span>
					<span class="CH-City">Mumbai</span>
					<span class="CH-Register"><a href="https://docs.google.com/forms/d/1xPQyjneHxgteOdHhutO5zo38Hrq8SvdkshjKQF9s4Pw/viewform" target="_blank">Register</a></span>
				</div>
				<div>
					<span>8th July</span>
					<span class="CH-City">Delhi</span>
					<span class="CH-Register"><a href="https://docs.google.com/forms/d/1xPQyjneHxgteOdHhutO5zo38Hrq8SvdkshjKQF9s4Pw/viewform" target="_blank">Register</a></span>
				</div>
				<div>
					<span>16th July</span>
					<span class="CH-City">Hyderabad</span>
					<span class="CH-Register"><a href="https://docs.google.com/forms/d/1xPQyjneHxgteOdHhutO5zo38Hrq8SvdkshjKQF9s4Pw/viewform" target="_blank">Register</a></span>
				</div>
				<div>
					<span>17th July</span>
					<span class="CH-City">Bangalore</span>
					<span class="CH-Register"><a href="https://docs.google.com/forms/d/1xPQyjneHxgteOdHhutO5zo38Hrq8SvdkshjKQF9s4Pw/viewform" target="_blank">Register</a></span>
				</div>
            </div>
        </div>

        <!-- Video Overlay Starts Here
        <div class="CH-VideoOverlay">
            <div class="CH-VideoClose"><img src="images/close-icon-black.png" /></div>
            <div class="CH-VideoTitle"></div>
            <div class="CH-VideoDescription"></div>
        </div>
        <!-- Video Overlay Ends Here -->
    </div>
</div>
<!-- Videos Carousel Ends Here -->
