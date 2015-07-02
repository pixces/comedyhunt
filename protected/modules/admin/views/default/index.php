<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Content'=>array('index'),
    'List',
);
?>
<h1>
    <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <span class="pull-left">Content List</span>
    <span class="clearfix"></span>
</h1>
<div class="contentListing">
    <?php if($dataProvider){
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_list',
            'sortableAttributes'=>array(
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
        $(".shortlist-action").live("click",ACTION.shortlistAction);
        $(".winner-action").live("click",ACTION.winnerAction);
    });
</script>