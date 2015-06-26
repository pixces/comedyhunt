<!-- Mobile Logo Starts Here -->
<div class="CH-MobileDisplay">
    <div class="CH-MobileLogo"><img src="images/mobile-logo.png" class="img-responsive" /></div>
    <div class="CH-MobileText">
        <span class="CH-Head">You can be the next Comedy Super Star</span>
        <span class="CH-SubHead">Submit your entry video below</span>
    </div>

</div>
<!-- Mobile Logo Ends Here -->

<!-- Submissions Starts Here -->
<div class="CH-Submissions">
    <div class="CH-SubmissionsContent">
        <div class="CH-SubmissionsText">
            <div class="CH-SubmissionsVideoBlk">
                <div class="CH-SubmissionsVideo transition">
                    <div class="CH-SubmissionsVideoImage"><img src="images/video-image1.png" /></div>
                    <div class="CH-SubmissionsVideoPlay">
                        <a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><span><img src="images/video-play-icon.png" /></span></a>
                    </div>
                </div>
            </div>
            <div class="CH-SubmissionsTextContainer">
                <div class="CH-SubHead">How To Enter the Comedy Hunt</div>
                <div class="CH-Text">
                    <ul>
                        <li>Create your own channel</li>
                        <li>Upload a Funny Video onto your channel</li>
                        <li>Fill in Details below</li>
                        <li>Read the Rules &amp; Press Submit</li>
                        <li>Visit this channel everyday to see if you have been selected</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="CH-SubmissionsContentBG"></div>
        <div class="CH-SubmissionsForm">
            <div class="CH-SubmissionsFormContainer">
                <div class="CH-SubmissionsTextContainer">
                    <div class="CH-SubHead">How To Enter the Comedy Hunt</div>
                    <div class="CH-Text">
                        <ul>
                            <li>Create your own channel</li>
                            <li>Upload a Funny Video onto your channel</li>
                            <li>Fill in Details below</li>
                            <li>Read the Rules &amp; Press Submit</li>
                            <li>Visit this channel everyday to see if you have been selected</li>
                        </ul>
                    </div>
                </div>
                <div class="CH-HorizontalForm">

                    <?php if (Yii::app()->user->hasFlash('videoInformationSubmitted')): ?>
                        <div class="info">
                            <?php echo Yii::app()->user->getFlash('videoInformationSubmitted'); ?>
                        </div>

                    <?php else: ?>

                        <?php
                        $form = $this->beginWidget('CActiveForm',
                            [
                            'id' => 'my-form',
                            'enableAjaxValidation' => true,
                            'clientOptions' => [
                                'validateOnSubmit' => true
                            ],
                            'focus' => [$model, 'username'],
                        ]);
                        ?>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Name',
                                array('for' => 'name'));
                            ?>
                            <?php
                            echo $form->textField($model, 'username',
                                array('placeholder' => "Enter your name", 'class' => "CH-FormInput",
                                'id' => "name", 'class' => 'CH-FormInput'));
                            ?>
                        <?php echo $form->error($model, 'username');?>
                        </div>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model, 'Your Email',
                                array('for' => 'email'));
                            ?>
                            <?php
                            echo $form->textField($model, 'email',
                                array('placeholder' => "Enter your email id", 'class' => "CH-FormInput",
                                'id' => "email", 'class' => 'CH-FormInput'));
                            ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div>
                        <div class="CH-FormGroup">
                            <?php echo $form->labelEx($model,
                                'Your Video', array('for' => 'video'));
                            ?>
                            <?php
                            echo $form->textField($model, 'url',
                                array('placeholder' => "Paste your video url here",
                                'class' => "CH-FormInput",
                                'id' => "video", 'class' => 'CH-FormInput'));
                            ?>
                            <?php echo $form->error($model, 'url'); ?>
                        </div>
                        <div class="CH-FormGroup">
    <?php echo $form->labelEx($model, 'Your Phone Number',
        array('for' => 'phone'));
    ?>
                                <?php
                                echo $form->textField($model, 'phone',
                                    array('placeholder' => "Enter your phone number",
                                    'class' => "CH-FormInput",
                                    'id' => "phone", 'class' => 'CH-FormInput'));
                                ?>
                        <?php echo $form->error($model, 'phone'); ?>
                        </div>
                        <div class="CH-FormGroupSubmit">
                            <div class="CH-Terms">
                                <span<?php echo $form->checkBox($model, 'accept'); ?>I agree to the terms and conditions</span>
                                <span class="CH-TermsLinks"><a href="javascript:void(0)">Privacy policy</a>   |   <a href="javascript:void(0)">Terms &amp; Conditions</a></span>
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
</div>
<!-- Submissions Ends Here -->

<!-- Videos Carousel Starts Here -->
<div class="CH-VideoCarousel">
    <div class="CH-VideoCarouselBG"></div>
    <div class="CH-VideoCarouselContent">
        <div class="CH-VideoCarouselIcon"><img src="images/inspired-videos-icon.png" /></div>
        <div class="CH-VideoCarouselHead">Not Inspired to Take Part yet ? <span>Watch these videos and you surely will</span></div>
        <p>Presenting the best of the funniest videos that will want you to be the next big Comedy Creator</p>
        <div class="CH-VideoCarouselBlk">
            <div id="CH-VideoCarousel">
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-image1.png" /></div>
                        <div class="CH-VideoThumbPlay">
                            <!--a href="javascript:void(0)" data-CHVideoTitle="Royal Turds - Worst Ads (Tanmay Bhat, Gursimran Khamba)" data-CHVideoURL="uG3RlN_zMRE"><img src="images/video-thumb-play.png" /></a-->
                            <a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><img src="images/video-thumb-play.png" /></a>
                        </div>
                    </div>
                    <div class="CH-Description">Proin rutrum nisi nec scelerisque dictum</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-thumb-image.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="Royal Turds - Worst Ads (Tanmay Bhat, Gursimran Khamba)" data-videoURL="uG3RlN_zMRE"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Aenean eu libero sit amet leo aliquam facilisis</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-image1.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Etiam mollis est eget facilisis convallis</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-thumb-image.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="Royal Turds - Worst Ads (Tanmay Bhat, Gursimran Khamba)" data-videoURL="uG3RlN_zMRE"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Sed vel dui a nulla venenatis laoreet</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-image1.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Proin rutrum nisi nec scelerisque dictum</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-thumb-image.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="Royal Turds - Worst Ads (Tanmay Bhat, Gursimran Khamba)" data-videoURL="uG3RlN_zMRE"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Aenean eu libero sit amet leo aliquam facilisis</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-image1.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="THE BIG BANG THEORY SEASON 8 - PROMO" data-videoURL="sehlQGZi16w"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Etiam mollis est eget facilisis convallis</div>
                </div>
                <div class="CH-VideoCarouselItem">
                    <div class="CH-Video">
                        <div class="CH-VideoThumb"><img src="images/video-thumb-image.png" /></div>
                        <div class="CH-VideoThumbPlay"><a href="javascript:void(0)" data-showpopup="1" class="show-popup" data-videoTitle="Royal Turds - Worst Ads (Tanmay Bhat, Gursimran Khamba)" data-videoURL="uG3RlN_zMRE"><img src="images/video-thumb-play.png" /></a></div>
                    </div>
                    <div class="CH-Description">Sed vel dui a nulla venenatis laoreet</div>
                </div>
            </div>
        </div>
        <div class="CH-WorkshopDate">
            <p>Comedy hunt workshop coming to a city near you</p>
            <div class="CH-WorkshopCity">
                <div>
                    <span>9th July</span>
                    <span class="CH-City">Mumbai</span>
                </div>
                <div>
                    <span>10th July</span>
                    <span class="CH-City">Bangalore</span>
                </div>
                <div>
                    <span>16th July</span>
                    <span class="CH-City">Hyderabad</span>
                </div>
                <div>
                    <span>17th July</span>
                    <span class="CH-City">Delhi</span>
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