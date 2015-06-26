<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
        echo "Hello World!";
		$this->render('index');
	}
}