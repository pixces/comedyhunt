<div class="row" id="user-<?=$data->id; ?>">
    <div class="media-head image-thumb">
        <a target="_blank" href="<?=$data->media_url;?>" class="img-modal thumbnail-img" data-channelId="<?=$data->channel_id;?>" data-channelName="<?=$data->channel_name;?>" data-title="" >
            <img src="<?=$data->thumb_image;?>">
        </a>
    </div>
    <div class="media-body">
        <blockquote class="list-body">
            <h4><span class="title"><a href="<?=$data->media_url;?>" target="_blank"><?=$data->title;?></a></span></h4>
            <p><?php echo substr($data->description, 0, 150)." [...]"; ?></p>
            <p class="posted-by">uploaded by: <em><a href="<?=$data->google_profile_url; ?>" target="_blank"><?=$data->username; ?></a> (#<?=$data->google_id; ?>)</em> | <em></en><i class="icon-calendar"></i> <?=date('F d, Y', strtotime($data->date_modified)); ?></em></p>
        </blockquote>
    </div>
    <div class="media-action">
        <div class="list-action">
            <div>

            </div>
            <span id="btn-set-<?=$data->id; ?>">
                <span class="button-bar">
                    <?php if ($data->status) { ?>
                        <?php if ($data->status == 'approved') { ?>
                            <a id="<?=$data->id; ?>" class="admin-action btn green" title="Click to Change Status" data-value="<?=$data->status; ?>" data-id="<?=$data->id; ?>" data-action="change_status" href="#">Approved</a>
                        <?php } else if ($data->status == 'rejected') { ?>
                            <a id="<?=$data->id; ?>" class="admin-action btn red" title="Click to Change Status" data-value="<?=$data->status; ?>" data-id="<?=$data->id; ?>" data-action="change_status" href="#">Rejected</a>
                        <?php } else if ($data->status == 'pending') { ?>
                            <a id="<?=$data->id; ?>" class="admin-action btn yellow" title="Click to Change Status" data-value="<?=$data->status; ?>" data-id="<?=$data->id; ?>" data-action="change_status" href="#">Pending</a>
                        <?php } ?>
                    <?php } ?>
                </span>
        </div>
    </div>
</div>