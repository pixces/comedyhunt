<?php

class PagesController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/default';

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
                    $contentModel->user_name        = $model->attributes['username'];
                    $contentModel->user_email       = $model->attributes['username'];
                    $contentModel->title            = $videoDetails['items'][0]['snippet']['title'];
                    $contentModel->description      = $videoDetails['items'][0]['snippet']['description'];
                    $contentModel->media_id         = $videoDetails['items'][0]['id'];
                    $contentModel->type             = "video";
                    $contentModel->author           = $videoDetails['items'][0]['snippet']['channelTitle'];
                    $contentModel->channel_name     = $videoDetails['items'][0]['kind'];
                    $contentModel->is_ugc           = 1;
                    $contentModel->thumb_image      = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails']);
                    $contentModel->alternate_image  = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails'],'medium');
                    $contentModel->status       = 'pending';
                    $contentModel->source       = "youtube";
                    $contentModel->media_url    = $model->url;
                    $contentModel->notes        = $videoDetails['items'][0]['snippet']['localized']['description'];
                    if ($contentModel->save()) {
                        Yii::app()->user->setFlash('videoInformationSubmitted','<span>Thank you.<a href="">Reload form</a>');
                        unset($_POST['SubmissionForm']);
                        $this->redirect(array('pages/index'));
                        Yii::app()->end();
                    }
                }
            }
        }

        $pageName = 'index';
        //render the page
        $this->render(
            $pageName, array(
            'model' => $model
            )
        );
    }
}