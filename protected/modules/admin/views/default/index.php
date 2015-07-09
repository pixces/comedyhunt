<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Content' => array('index'),
    'List',
);
?>
<h1>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <span class="pull-left">Content List</span>
    <span class="pull-right">
        <span><?php echo CHtml::link('Export all CSV',array('/admin/default/downloadCsv','status'=>'all'), array('class'=>'btn download-action')); ?></span>
        <span><?php echo CHtml::link('Export Approved',array('/admin/default/downloadCsv','status'=>'approved'), array('class'=>'btn download-action')); ?></span>
    </span>

    <span class="clearfix"></span>
</h1>
<div class="contentListing">
    <?php
    if ($dataProvider) {
        $this->widget('zii.widgets.CListView',
            array(
            'dataProvider' => $dataProvider,
            'itemView' => '_list',
            'sortableAttributes' => array(
                'author',
                'title',
                'status'
            ),
        ));
    } else {
        echo "No User found";
    }
    ?>
</div>
<script>

    $(function() {
        // $(".shortlist-action").live("click",ACTION.shortlistAction);
        // $(".winner-action").live("click",ACTION.winnerAction);
        $(".admin-action").on("click", function(event) {

            event.preventDefault();
            var url = {
                actionUrl: "<?php echo Yii::app()->request->baseUrl; ?>/admin/default/toggleStatus"
            };

            var rowId = $(this).attr("data-id");
            var rowAction = $(this).attr("data-action");
            var rowValue = $(this).attr("data-value");

            var queryString = {
                id: rowId,
                status: rowValue
            };

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url.actionUrl,
                data: queryString,
                success: function(data) {

                    if (data.error == 0 && data.status) {
                        var rowToUpdateId = "#btn-set-" + rowId;
                        var btnBar = "#btn-bar-" + rowId;
                        $(rowToUpdateId).closest("span").find(".pill-pending").addClass(data.selector).removeClass("pill-pending").html(data.message);
                        $(btnBar).hide();
                    }


                }, error: function(data, error) {
                    console.log(error);
                }
            });


        });
    });
</script>