<!-- Gallery Starts Here
<div class="CH-Gallery">
    <div class="CH-GalleryBG"></div>
    <div class="CH-GalleryContent">

        <div class="CH-GalleryHead">All videos</div>
        <div class="CH-GalleryList">
            <div class="scroll-pane" id="gallerieVideoContent">
               <?php echo $videoContent;?>
            </div>
        </div>
    </div>
</div>
Gallery Ends Here -->


<!-- Gallery Starts Here -->
<div class="CH-Gallery">
    <div class="CH-GalleryBG"></div>
    <div class="CH-GalleryContent">
        <div class="CH-GalleryIcon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gallery-image.png" /></div>
        <div class="CH-GalleryHead">Entry Video #61 to 90...</div>
        <div class="CH-GalleryList">
		
            <!--div class="scroll-pane">
                <!-- videContent partial include start -->
                <?php //echo $videoContent;?>
                <!-- videContent partial include ends -->
            <!--</div>-->
			
			<!-- dynamic playlist start -->
			<?php /*$t = 1; foreach($aVideoList as $objVideo) {*/	?>
			<?php if ($aVideoList[0]) {
                $objVideo = $aVideoList[0];
			?>
			<div class="">
				<!-- Needed for the youtube player example 3 -->
				<div class="youtubeplayer">
					<div class="yt_holder yt_holder_right">
						<div id="ytvideogallery1<?php /*echo $t;*/ ?>" class="ytvideo"></div>
						<!--Up and Down arrow -->
						<div class="you_up"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
						<div class="you_down"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/down_arrow.png" alt="- Slide" title="SHOW" /></div>
						<!-- END  -->
						<div class="youplayer ytplayerright">
							<ul class="videoyou videoytright scroll-pane">
								<?php
								if ( $objVideo->get_videos() !=null ) {
									foreach ($objVideo->get_videos() as $yKey => $yValue) {
										echo '<li><p>' . $yValue['title'] . '</p><a class="videoThumbgallery1" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '">' . $yValue['description'] . '</a></li>';
									}
									
									//'. $t .'
								}else{
									echo '<li>Sorry, no video\'s found</li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<!-- END youtube player -->
			</div>
			<?php /*$t++; }*/ ?>
			<?php } ?>
			<!-- dynamic playlist ends -->
        </div>
		
		
		<!-- Please UnComment below code to enable another playlist and add playlist in production.php under gallery section -->
		<div class="CH-GalleryIcon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gallery-image.png" /></div>
        <div class="CH-GalleryHead">Entry Video #31 to 60...</div>
        <div class="CH-GalleryList">		
			<?php if ($aVideoList[1]) { $objVideo = $aVideoList[1]; ?>
			<div class="">
				<div class="youtubeplayer">
					<div class="yt_holder yt_holder_right">
						<div id="ytvideogallery2" class="ytvideo"></div>
						
						<div class="you_up"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
						<div class="you_down"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/down_arrow.png" alt="- Slide" title="SHOW" /></div>
						
						<div class="youplayer ytplayerright">
							<ul class="videoyou videoytright scroll-pane">
								<?php
								if ( $objVideo->get_videos() !=null ) {
									foreach ($objVideo->get_videos() as $yKey => $yValue) {
										echo '<li><p>' . $yValue['title'] . '</p><a class="videoThumbgallery2" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '">' . $yValue['description'] . '</a></li>';
									}
								}else{
									echo '<li>Sorry, no video\'s found</li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
        </div>
		
		<!-- Please UnComment below code to enable another playlist and add playlist in production.php under gallery section -->
		<div class="CH-GalleryIcon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gallery-image.png" /></div>
        <div class="CH-GalleryHead">Entry Video #1 to 30</div>
        <div class="CH-GalleryList">		
			<?php if ($aVideoList[2]) { $objVideo = $aVideoList[2]; ?>
			<div class="">
				<div class="youtubeplayer">
					<div class="yt_holder yt_holder_right">
						<div id="ytvideogallery3" class="ytvideo"></div>
						
						<div class="you_up"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/up_arrow.png" alt="+ Slide" title="HIDE" /></div>
						<div class="you_down"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/down_arrow.png" alt="- Slide" title="SHOW" /></div>
						
						<div class="youplayer ytplayerright">
							<ul class="videoyou videoytright scroll-pane">
								<?php
								if ( $objVideo->get_videos() !=null ) {
									foreach ($objVideo->get_videos() as $yKey => $yValue) {
										echo '<li><p>' . $yValue['title'] . '</p><a class="videoThumbgallery3" href="http://www.youtube.com/watch?v=' . $yValue['videoid'] . '">' . $yValue['description'] . '</a></li>';
									}
								}else{
									echo '<li>Sorry, no video\'s found</li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
        </div>
		
		
    </div>
</div>
<!-- Gallery Ends Here -->