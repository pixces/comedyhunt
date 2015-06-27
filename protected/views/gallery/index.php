<!-- Gallery Starts Here -->
<div class="CH-Gallery">
    <div class="CH-GalleryBG"></div>
    <div class="CH-GalleryContent">
        <div class="CH-GalleryIcon"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gallery-image.png" /></div>
        <div class="CH-GalleryHead">All videos</div>
        <div class="CH-GalleryList">
            <div class="scroll-pane" id="gallerieVideoContent">
               <?php echo $videoContent;?>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Ends Here -->