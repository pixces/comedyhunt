<?php if (!empty($galleries)) { ?>
    <?php echo CHtml::hiddenField('loadCounter', '1',
        array('id' => 'loadCounter')); ?>
    <?php foreach ($galleries as $gallery) { ?>
        <div class="CH-GalleryListItems">

            <div class="CH-GalleryImage"><img src="<?php echo $gallery['thumb_image'] ?>" /></div>
            <div class="CH-GalleryVideoTitle"><?php echo $gallery['title']; ?></div>
            <div class="CH-GalleryName"><?php echo $gallery['user_name']; ?></div>

        </div>
    <?php } ?>
<?php } else { ?>
    <div class="CH-GalleryListItems">
        <span>Empty Gallery.</span>
    </div>
<?php } ?>