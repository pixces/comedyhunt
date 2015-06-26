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
                    $contentModel = new Content();
                    $contentModel->isNewRecord = true;
                    $contentModel->primaryKey  = NULL;
                    $contentModel->user_name  = $model->attributes['username'];
                    $contentModel->user_email = $model->attributes['username'];
                    $contentModel->title      = $videoDetails['title'];
                    $contentModel->description      = $videoDetails['title'];
                    $contentModel->media_id      = $videoInfo['videoId'];
                    $contentModel->type      = "video";
                    $contentModel->author      = $videoDetails['author_name'];
                    $contentModel->channel_name      = $videoDetails['provider_name'];
                    $contentModel->is_ugc      =1;
                    $contentModel->thumb_image = $videoDetails['thumbnail_url'];
                    $contentModel->status = 'pending';
                    $contentModel->source = $videoDetails['provider_name'];
                    $contentModel->media_url =$model->url;
                    if($contentModel->save()){
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