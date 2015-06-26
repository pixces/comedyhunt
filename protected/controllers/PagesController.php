<?php

class PagesController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $model=new SubmissionForm();
        if(isset($_POST['SubmissionForm']))
        {
            $model->attributes=$_POST['SubmissionForm'];
            if($model->validate())
            {

            }
        }

        $pageName = 'index';

        //render the page
        $this->render(
            $pageName,
            array(
                'model' => $model
            )
        );
	}


}