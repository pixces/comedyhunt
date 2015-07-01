<?php

class PagesController extends Controller
{
    /**
     * @var null
     */
    protected $oGoogle = null;

    /**
     * @var null
     */
    protected $oGooglePlus = null;

    /**
     * @var null
     */
    protected $oYoutube = null;

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $model = new SubmissionForm();

        //fetch all the videos for the first page
        $brandVideos = $this->getCarouselContent();

		//baisc youtube playlist params
        $ytConfig = Yii::app()->params['YT_PlayList'];

        $ytParams = array(
            'api' => $ytConfig['apiKey'],
            'max' => $ytConfig['maxSize'],
            'cachexml' => $ytConfig['isCache'],
            'cachelife' => $ytConfig['cacheLifetime'],
            'xmlpath' => $ytConfig['cachePath'],
            'start' => 1,
            'descriptionlength' => 40,
            'titlelength' => 20
        );

        $videoPlayList = array();

        foreach(Yii::app()->params['YT_Faq_PlayListID'] as $id){
            $obj = new CHPlaylist('playlist',$id,$ytParams);
            array_push($videoPlayList, $obj->getInstance() );
        }

		//include the playlist js and css files
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/path/to/your/javascript/file',CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist-right-with-thumbs.css');

        //render the page
        $this->pagename = 'index';

        //check if the userdetails are already set
        //then display the video link
        if (isset(Yii::app()->session['user_info'])){
            $auth = true;
        } else {
            $auth = false;
        }

        //validate to check if video submission is set
        $submission = false;

        $this->render(
            $this->pagename, array(
            'model' => $model,
            'gallery' => $brandVideos,
			'aVideoList' => $videoPlayList,
            'auth' => $auth,
            'submission' => $submission
            )
        );
    }

    /**
     * Social Google Authentication
     */
    public function actionAuthenticate(){

        $client = $this->getGoogle();

        if (isset($_GET['code'])) {

            $client->authenticate($_GET['code']);

            $token = $client->getAccessToken();
            $client->setAccessToken($token);

            $session = Yii::app()->session;

            $session['auth_token']  = $client->getAccessToken();

            $plus = $this->getGooglePlus();

            //fetch the user profile for later storage
            $user_profile = $plus->people->get('me');
            Yii::log("Received profile  info ".json_encode($user_profile));

            //parse and store the profile in session
            if ($user_profile){
                $oEmail  = $user_profile->getEmails();
                $oImage = $user_profile->getImage();

                $profile = array(
                    'identifier' => $user_profile->getId(),
                    'display_name' => $user_profile->getDisplayName(),
                    'profile_url' => $user_profile->getUrl(),
                    'profile_photo' => $oImage->getUrl(),
                    'email' => $oEmail[0]->getValue(),
                );

                $session['user_info'] = $profile;
            }
            $this->redirect(Yii::app()->createUrl('/'));
        } else {
            $client->setScopes(array(
                'https://www.googleapis.com/auth/youtube.readonly',
                'https://www.googleapis.com/auth/plus.me',
                'https://www.googleapis.com/auth/youtubepartner-channel-audit',
                'https://www.googleapis.com/auth/plus.profile.emails.read',
            ));
            $authUrl = $client->createAuthUrl();
            header("location:$authUrl");
        }
    }

    /**
     * Method to fetch All videos fro the Authenticated user
     * @throws Exception
     */
    public function actionVideos(){

        if(isset(Yii::app()->session['auth_token'])){
            try {
                $client = $this->getGoogle();
                $client->setAccessToken(Yii::app()->session['auth_token']);

                $youtube = $this->getYoutube();
                $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
                    'mine' => 'true',
                ));

                $htmlBody = '';
                foreach ($channelsResponse['items'] as $channel) {
                    // Extract the unique playlist ID that identifies the list of videos
                    // uploaded to the channel, and then call the playlistItems.list method
                    // to retrieve that list.
                    $uploadsListId = $channel['contentDetails']['relatedPlaylists']['uploads'];

                    $playlistItemsResponse = $youtube->playlistItems->listPlaylistItems('snippet', array(
                        'playlistId' => $uploadsListId,
                        'maxResults' => 50
                    ));

                    $videoList = array();
                    foreach ($playlistItemsResponse['items'] as $playlistItem) {
                        array_push($videoList,
                            array(
                                'channelId' => $playlistItem['snippet']['channelId'],
                                'title' => $playlistItem['snippet']['title'],
                                'description' => $playlistItem['snippet']['description'],
                                'thumb_image' => $playlistItem['snippet']['thumbnails']['default']['url'],
                                'alternate_image' => $playlistItem['snippet']['thumbnails']['medium']['url'],
                                'videoId' => $playlistItem['snippet']['resourceId']['videoId'],
                                'playlistId' => $playlistItem['snippet']['playlistId'],
                                'channelTitle' => $playlistItem['snippet']['channelTitle'],
                            )
                        );
                    }
                }
            } catch (Exception $e) {
                Yii::app()->session['auth_token'] = null;
                throw $e;
            }
        } else {
            // Redirect the user to authenticate page
            echo "Authentication expired";
            exit;
        }

        $this->layout = false;
        $this->render('videos',
            array(
                'videoList' => $videoList,
                'user_info' => Yii::app()->session['user_info']
            )
        );
    }

    /**
     * Method to get list of Viode
     * to be displayed on the Casousel for the Index page
     * @param null $params
     * @return array
     */
    protected function getCarouselContent($params=null){

        $galleryData=[];
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


    public function getGoogle(){
        if (is_null($this->oGoogle)){
            Yii::import(Yii::getPathOfAlias("application.vendor.Google.Client", true));
            $client_id = Yii::app()->params['GOOGLE']['CLIENT_ID'];
            $client_secret = Yii::app()->params['GOOGLE']['SECRET'];
            $redirect_uri = YII::app()->params['GOOGLE']['CALLBACK_URL'];
            $this->oGoogle = new Google_Client();
            $gg = $this->oGoogle;
            $gg->setClientId($client_id);
            $gg->setClientSecret($client_secret);
            $gg->setRedirectUri($redirect_uri);
        }
        return $this->oGoogle;
    }


    public function getGooglePlus(){
        if(is_null($this->oGooglePlus)){
            Yii::import(Yii::getPathOfAlias("application.vendor.Google.Service.Plus"),true);
            $this->oGooglePlus = new Google_Service_Plus($this->oGoogle);
        }
        return $this->oGooglePlus;
    }


    public function getYoutube(){
        if(is_null($this->oYoutube)){
            Yii::import(Yii::getPathOfAlias("application.vendor.Google.Service.YouTube"),true);
            $this->oYoutube = new Google_Service_YouTube($this->oGoogle);
        }
        return $this->oYoutube;
    }

    public function actionTmpIndex()
    {
        $model = new SubmissionForm();

        if ( isset($_POST['SubmissionForm']) || !empty(Yii::app()->session['SubmissionForm']))  {

            $model->attributes = isset($_POST['SubmissionForm']) ? $_POST['SubmissionForm'] : Yii::app()->session['SubmissionForm'];

            if ($model->validate()) {
                //set the session here after validating the data
                if (!isset(Yii::app()->session['SubmissionForm'])) {
                    Yii::app()->session['SubmissionForm'] = $model->attributes;
                }

                //first validate if the url is valid
                if (Utility::isValidYoutubeUrl($model->url)){

                    unset($_POST['SubmissionForm']);
                    $plus   = Yii::app()->GoogleApis->serviceFactory('Plus');
                    $client = Yii::app()->GoogleApis->client;
                    $client->setScopes(array('https://www.googleapis.com/auth/youtube','https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/youtubepartner-channel-audit')   );


                    try {
                        if (!isset(Yii::app()->session['auth_token']) || is_null(Yii::app()->session['auth_token']))
                            Yii::app()->session['auth_token'] = $client->authenticate();
                        else $activities = '';

                        if (isset(Yii::app()->session['auth_token'])) {

                            $client->setAccessToken(Yii::app()->session['auth_token']);
                            $userInfo = $plus->people->get("me");
                            Yii::app()->session['user_info'] = $userInfo;

                            /**
                             * User Information Google
                             */
                            /** @var (Object) $userInfoGoogle  Google User's Information * */
                            $userInfoGoogle              = new stdClass();
                            $userInfoGoogle->googleId    = $userInfo['id'];
                            $userInfoGoogle->displayName = $userInfo['displayName'];
                            $userInfoGoogle->image       = $userInfo['image']['url'];
                            //$userInfoGoogle->gender      = $userInfo['gender'];

                            //validate the video url to proceed
                            //only in case of a youtube url

//                            $youtubeVideoInfo = Utility::fetchYouTubeVideoDetails($model->url);
//                            $videoInfo        = json_decode($youtubeVideoInfo, true);
//                            if ($videoInfo['error'] == false) {
//                                $videoDetails                  = json_decode($videoInfo['result'],
//                                    true);


//                                $contentModel                  = new Content();
//                                $contentModel->isNewRecord     = true;
//                                $contentModel->primaryKey      = NULL;
//                                $contentModel->username        = $model->attributes['username'];
//                                $contentModel->email           = $model->attributes['username'];
//                                $contentModel->title           = $videoDetails['items'][0]['snippet']['title'];
//                                $contentModel->description     = strlen($videoDetails['items'][0]['snippet']['description'])
//                                    > 10 ? $videoDetails['items'][0]['snippet']['description']
//                                        : $videoDetails['items'][0]['snippet']['title'];
//                                $contentModel->media_id        = $videoDetails['items'][0]['id'];
//                                $contentModel->type            = "video";
//                                $contentModel->author          = $videoDetails['items'][0]['snippet']['channelTitle'];
//                                $contentModel->channel_name    = $videoDetails['items'][0]['kind'];
//                                $contentModel->is_ugc          = 1;
//                                $contentModel->thumb_image     = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails']);
//                                $contentModel->alternate_image = Utility::getThumbnails($videoDetails['items'][0]['snippet']['thumbnails'],
//                                        'medium');
//                                $contentModel->status          = 'approved';
//                                $contentModel->media_url       = $model->url;
//
//                                /** Google User Info * */
//                                $contentModel->google_id             = $userInfoGoogle->googleId;
//                                $contentModel->google_displayname    = $userInfoGoogle->displayName;
//                                $contentModel->google_profilepicture = $userInfoGoogle->image;
//
//                                if ($contentModel->save()) {
//                                    Yii::app()->session['SubmissionForm'] = '';
//                                    unset($_POST['SubmissionForm']);
//                                    Yii::app()->user->setFlash('videoInformationSubmitted','<div class="CH-SubmissionsTextContainer"><div class="CH-Head acenter">Thank you for <br/>your submission</div> </div> <div class="CH-SubmitButton"><a href="'.Yii::app()->createUrl('/').'">Submit another video</a></div>');
//                                    $this->redirect(array('/pages/index'));
//                                    Yii::app()->end();
//                                }


//                            }
                        }
                    } catch (Exception $e) {
//                        Yii::app()->session['auth_token'] = null;
                        throw $e;
                    }
                } else {
                    //unset post | unset session
                    //set flash message & redirect
                    unset(Yii::app()->session['SubmissionForm']);
                    unset($_POST['SubmissionForm']);
                    Yii::app()->user->setFlash('invalidVideoUrl','<div class="acenter">Invalid or wrong Video Url. Only Youtube urls accepted.</div>');
                    $this->redirect(Yii::app()->createUrl("/"));
                    Yii::app()->end();
                }
            }
        }

        //fetch all the videos for the first page
        $brandVideos = $this->getCarouselContent();


        //baisc youtube playlist params
        $ytConfig = Yii::app()->params['YT_PlayList'];

        $ytParams = array(
            'api' => $ytConfig['apiKey'],
            'max' => $ytConfig['maxSize'],
            'cachexml' => $ytConfig['isCache'],
            'cachelife' => $ytConfig['cacheLifetime'],
            'xmlpath' => $ytConfig['cachePath'],
            'start' => 1,
            'descriptionlength' => 40,
            'titlelength' => 20
        );

        $videoPlayList = array();

        foreach(Yii::app()->params['YT_Faq_PlayListID'] as $id){
            $obj = new CHPlaylist('playlist',$id,$ytParams);
            array_push($videoPlayList, $obj->getInstance() );
        }

        //include the playlist js and css files
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/path/to/your/javascript/file',CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist-right-with-thumbs.css');

        //render the page
        $this->pagename = 'index';

        $this->render(
            $this->pagename, array(
                'model' => $model,
                'gallery' => $brandVideos,
                'aVideoList' => $videoPlayList
            )
        );
    }
	
	public function actionSave(){ return true; }

}
