<?php

class SiteController extends Controller
{

    //public $layout='//layouts/default';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function actionFaq()
    {
        $this->layout = '//layouts/default';

        //baisc youtube playlist params
        $ytConfig = Yii::app()->params['YT_PLAYLIST'];

        $playListId = array('PL548A047B9D0B4A7C','RDRb0UmrCXxVA');

        $video = new Youtubelist('playlist');

        $video->set_api($ytConfig['apiKey']);
        $video->set_max($ytConfig['maxSize']);
        $video->set_cachexml($ytConfig['isCache']);
        $video->set_cachelife($ytConfig['cacheLifetime']);
        $video->set_xmlpath($ytConfig['cachePath']);
        $video->set_start(1);
        // --Set text and description length
        $video->set_descriptionlength(40);
        $video->set_titlelength(20);

        $video2 = clone $video;

        //set the playlistId
        $video->set_playlist($playListId[0]);
        $video2->set_playlist($playListId[1]);

        //include the playlist js and css files
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/path/to/your/javascript/file',CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/vendor/youtubeplaylist-right-with-thumbs.css');



        $this->render('faq', array(
            'video' => $video,
            'video2' => $video2,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}