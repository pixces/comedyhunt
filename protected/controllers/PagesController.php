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
        if (isset($_POST['SubmissionForm']) || isset(Yii::app()->session['SubmissionForm'])) {
            $model->attributes = isset($_POST['SubmissionForm']) ? $_POST['SubmissionForm']
                    : Yii::app()->session['SubmissionForm'];
            if (!isset(Yii::app()->session['SubmissionForm'])) {
                Yii::app()->session['SubmissionForm'] = $model->attributes;
            }

            if ($model->validate()) {
                unset($_POST['SubmissionForm']);
                $plus   = Yii::app()->GoogleApis->serviceFactory('Plus');
                $client = Yii::app()->GoogleApis->client;

                try {
                    if (!isset(Yii::app()->session['auth_token']) || is_null(Yii::app()->session['auth_token']))
                            Yii::app()->session['auth_token'] = $client->authenticate();
                    else $activities                       = '';

                    if (isset(Yii::app()->session['auth_token'])) {

                        $client->setAccessToken(Yii::app()->session['auth_token']);
                        $userInfo = $plus->people->get("me");

                        /**
                         * User Information Google
                         */
                        /** @var (Object) $userInfoGoogle  Google User's Information * */
                        $userInfoGoogle              = new stdClass();
                        $userInfoGoogle->googleId    = $userInfo['id'];
                        $userInfoGoogle->displayName = $userInfo['displayName'];
                        $userInfoGoogle->image       = $userInfo['image']['url'];
                        $userInfoGoogle->gender      = $userInfo['gender'];

                        $youtubeVideoInfo = Utility::fetchYouTubeVideoDetails($model->url);
                        $videoInfo        = json_decode($youtubeVideoInfo, true);
                        if ($videoInfo['error'] == false) {
                            $videoDetails                  = json_decode($videoInfo['result'],
                                true);
                            $contentModel                  = new Content();
                            $contentModel->isNewRecord     = true;
                            $contentModel->primaryKey      = NULL;
                            $contentModel->username        = $model->attributes['username'];
                            $contentModel->email           = $model->attributes['username'];
                            $contentModel->title           = $videoDetails['items'][0]['snippet']['title'];
                            $contentModel->description     = strlen($videoDetails['items'][0]['snippet']['description'])
                                > 10 ? $videoDetails['items'][0]['snippet']['description']
                                    : $videoDetails['items'][0]['snippet']['title'];
                            $contentModel->media_id        = $videoDetails['items'][0]['id'];
                            $contentModel->type            = "video";
                            $contentModel->author          = $videoDetails['items'][0]['snippet']['channelTitle'];
                            $contentModel->channel_name    = $videoDetails['items'][0]['kind'];
                            $contentModel->is_ugc          = 1;
                            $contentModel->thumb_image     = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails']);
                            $contentModel->alternate_image = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails'],
                                    'medium');
                            $contentModel->status          = 'pending';
                            $contentModel->media_url       = $model->url;

                            /*                             * Google User Info * */
                            $contentModel->google_id             = $userInfoGoogle->googleId;
                            $contentModel->google_displayname    = $userInfoGoogle->displayName;
                            $contentModel->google_profilepicture = $userInfoGoogle->image;

                            if ($contentModel->save()) {
                                Yii::app()->session['SubmissionForm'] = '';
                                unset($_POST['SubmissionForm']);
                                Yii::app()->user->setFlash('videoInformationSubmitted',
                                    '<span>Thank you.<a href="">Reload form</a>');

                                $this->redirect(array('/pages/index'));
                                Yii::app()->end();
                            }
                        }
                    }
                } catch (Exception $e) {
                    Yii::app()->session['auth_token'] = null;
                    throw $e;
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