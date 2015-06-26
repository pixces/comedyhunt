<?php

class IndexController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model=new SubmissionForm();
        if (isset($_POST['SubmissionForm'])){
            $model->attributes = $_POST['SubmissionForm'];
            if ($model->validate()){

                //fetch all the data corresponding to
                //this youtube url from youtube apis

                //post all the data into the database and display
                //appropriate message

                //Yii::app()->user->setFlash('submission','Thank you for contacting us. We will respond to you as soon as possible.');
                //$this->refresh();

                print_r($model);
                exit;
            }
        }

        $this->render('index', array('model' => $model));
    }






}