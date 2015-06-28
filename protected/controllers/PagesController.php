<?php

class PagesController extends Controller
{
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $model = new SubmissionForm();
        if (isset($_POST['SubmissionForm'])) {
            $model->attributes = $_POST['SubmissionForm'];
            if ($model->validate()) {
                $youtubeVideoInfo = Utility::fetchYouTubeVideoDetails($model->url);
                $videoInfo        = json_decode($youtubeVideoInfo, true);
                if ($videoInfo['error'] == false) {
                    $videoDetails = json_decode($videoInfo['result'], true);
                    $contentModel                   = new Content();
                    $contentModel->isNewRecord      = true;
                    $contentModel->primaryKey       = NULL;
                    $contentModel->username        = $model->attributes['username'];
                    $contentModel->email       = $model->attributes['username'];
                    $contentModel->title            = $videoDetails['items'][0]['snippet']['title'];
                    $contentModel->description      = $videoDetails['items'][0]['snippet']['description'];
                    $contentModel->media_id         = $videoDetails['items'][0]['id'];
                    $contentModel->type             = "video";
                    $contentModel->author           = $videoDetails['items'][0]['snippet']['channelTitle'];
                    $contentModel->channel_name     = $videoDetails['items'][0]['kind'];
                    $contentModel->is_ugc           = 1;
                    $contentModel->thumb_image      = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails']);
                    $contentModel->alternate_image  = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails'],'medium');
                    $contentModel->status       = 'approved';
                    $contentModel->media_url    = $model->url;
                    if ($contentModel->save()) {
                        Yii::app()->user->setFlash('videoInformationSubmitted','<div class="CH-SubmissionsTextContainer"><div class="CH-Head acenter">Thank you for <br/>your submission</div> </div> <div class="CH-SubmitButton"><a href="'.Yii::app()->createUrl('/').'">Submit another video</a></div>');
                        unset($_POST['SubmissionForm']);
                        $this->redirect(array('pages/index'));
                        Yii::app()->end();
                    }
                }
            }
        }

        //fetch all the videos for the first page
        $brandVideos = $this->getCarouselContent();

        $pageName = 'index';
        //render the page
        $this->render(
            $pageName, array(
            'model' => $model,
            'gallery' => $brandVideos,
            )
        );
    }

    public function getCarouselContent($params=null){

        $columns = Content::$defaultSelectableFields;

        $Criteria            = new CDbCriteria;
        $Criteria->condition = 'is_ugc=:ugc AND status=:status';
        $Criteria->params    = array(':ugc' => 0, 'status' => 'approved');
        $Criteria->order     ='date_created DESC';

        if (Content::model()->count($Criteria)) {
            $content = Content::model()->findAll($Criteria);
            foreach ($content as $video) {
                $row = new stdClass();
                foreach($columns as $column) {
                    $row->$column = $video->$column;
                }
                $galleryData[] = $row;
            }
        }
        return $galleryData;
    }
}