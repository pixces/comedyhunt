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
					<div class="CH-Text">
						<ul>
							<li>Set up your own YouTube channel</li>
							<li>Shoot your entry video using the Creative Toolkit provided in the links below</li>
							<li>Upload your entry video on to your YouTube channel with the title in this format: "Comedy Hunt – entry video title"</li>
							<li>Read the terms and conditions and enter your details below</li>
							<li>Submit and keep checking this channel and our social handles for updates!</li>
						</ul>
					</div>
					<div class="CH-Text no-margin"><a href="javascript:void(0)" target="_blank">Download Creative Toolkit</a></div>
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
						<div class="CH-Text">
							<ul>
								<li>Set up your own YouTube channel</li>
								<li>Shoot your entry video using the Creative Toolkit provided in the links below</li>
								<li>Upload your entry video on to your YouTube channel with the title in this format: "Comedy Hunt – entry video title"</li>
								<li>Read the terms and conditions and enter your details below</li>
								<li>Submit and keep checking this channel and our social handles for updates!</li>
							</ul>
						</div>
						<div class="CH-Text no-margin"><a href="javascript:void(0)" target="_blank">Download Creative Toolkit</a></div>
					</div>
                </div>
                <div class="CH-HorizontalForm">

                    <?php if (Yii::app()->user->hasFlash('videoInformationSubmitted')): ?>
                        <div class="info">
                            <?php echo Yii::app()->user->getFlash('videoInformationSubmitted'); ?>
                        </div>
                    <?php else: ?>
                        <!--show that this is an invalid video url -->
                        <?php if (Yii::app()->user->hasFlash('invalidVideoUrl')) : ?>
                            <div class="error">
                                <?php echo Yii::app()->user->getFlash('invalidVideoUrl'); ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        $form = $this->beginWidget('CActiveForm',
                            [
                                'id' => 'register-form',
                                'enableAjaxValidation' => false,
                                'clientOptions' => [
                                    'validateOnSubmit' => true
                                ],
                                'focus' => [$model, 'username'],
                            ]);
                        ?>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Name', array('for' => 'name')); ?>
                            <?php echo $form->textField($model, 'username', array('placeholder' => "Enter your name", 'class' => "CH-FormInput", 'id' => "name", 'class' => 'CH-FormInput')); ?>
                            <?php echo $form->error($model, 'username'); ?>
                        </div>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Email', array('for' => 'email')); ?>
                            <?php echo $form->textField($model, 'email', array('placeholder' => "Enter your email id", 'class' => "CH-FormInput", 'id' => "email", 'class' => 'CH-FormInput')); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Video', array('for' => 'video')); ?>
                            <?php echo $form->textField($model, 'url', array('placeholder' => "Paste your video url here", 'class' => "CH-FormInput", 'id' => "video", 'class' => 'CH-FormInput')); ?>
                            <?php echo $form->error($model, 'url'); ?>
                        </div>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Phone Number', array('for' => 'phone')); ?>
                            <?php echo $form->textField($model, 'phone', array('placeholder' => "Enter your phone number", 'class' => "CH-FormInput", 'id' => "phone", 'class' => 'CH-FormInput')); ?>
                            <?php echo $form->error($model, 'phone'); ?>
                        </div>
                        <div class="CH-FormGroupSubmit">
                            <div class="CH-Terms">
                                <span<?php echo $form->checkBox($model, 'accept'); ?>I agree to the terms and conditions</span>
                                <span class="CH-TermsLinks">
                                    <a href="<?= Yii::app()->createAbsoluteUrl('/site/pages/?view=privacy-policy'); ?>"
                                       target="_blank">Privacy policy</a>   |   <a
                                        href="<?= Yii::app()->createAbsoluteUrl('/site/pages/?view=terms-conditions'); ?>"
                                        target="_blank">Terms &amp; Conditions</a>
                                </span>
                                <?php echo $form->error($model, 'accept'); ?>
                            </div>
                            <div class="CH-FormSubmit">
                                <?php echo CHtml::submitButton('Submit'); ?>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    <?php endif; ?>
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
