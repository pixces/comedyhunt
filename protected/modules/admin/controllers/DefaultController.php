<?php

class DefaultController extends AdminController
{
    protected $recordPerPage = 20;

    public function actionIndex()
    {
        $Criteria            = new CDbCriteria;
        $Criteria->condition = 'is_ugc=:ugc';
        $Criteria->params    = array(':ugc' => 1);
        $Criteria->order     = 'date_created DESC';

        $dataProvider = new CActiveDataProvider('Content',
            array('criteria' => $Criteria,
            'pagination' => array('pageSize' => $this->recordPerPage)
            )
        );

        $this->render('index',
            array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionToggleVideoStatus($id = null, $status = null)
    {
        $videoId = (int) Yii::app()->getRequest()->getParam('id', 0);
        $status  = (int) Yii::app()->getRequest()->getParam('status', 0);
        if ($videoId > 0 && is_int($videoId)) {
            try {
                $videoStatus = ($status) ? "approved" : "inactive";
                Content::model()->updateByPk($videoId,
                    array('status' => $videoStatus));
                Yii::app()->user->setFlash('message', "Video Staus Changed");
            } catch (Exception $e) {

                Yii::app()->user->setFlash('message', "Error:".$e->getMessage());
            }
        } else {
            Yii::app()->user->setFlash('message', "Invalid Video Id");
        }
        $this->redirect(array('index'));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
                $this->redirect(Yii::app()->getRequest()->urlReferrer);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Banner the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Content::model()->findByPk($id);
        if ($model === null)
                throw new CHttpException(404,
            'The requested page does not exist.');
        return $model;
    }

    /**
     * ToggleStatus Function 
     */
    public function actionToggleStatus()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $aResponse     = ['error' => 0, 'status' => 0, 'message' => ''];
            $videoId       = (int) Yii::app()->getRequest()->getParam('id', 0);
            $status        = (int) Yii::app()->getRequest()->getParam('status',
                    0);
            $videoStatus   = ($status) ? "approved" : "rejected";
            $colorSelector = ($status) ? "green" : "red";
            if ($videoId > 0 && is_int($videoId)) {
                try {
                    Content::model()->updateByPk($videoId,
                        array('status' => $videoStatus));
                    $message   = $videoStatus;
                    $aResponse = ['error' => 0, 'status' => 1, 'message' => ucwords($message),
                        'selector' => $colorSelector];
                } catch (Exception $e) {
                    $message   = $e->getMessage();
                    $aResponse = ['error' => 1, 'status' => 0, 'message' => $message];
                }
            } else {
                $message   = "Invalid Id !";
                $aResponse = ['error' => 1, 'status' => 0, 'message' => $message];
            }


            echo json_encode($aResponse);
            exit;
        }
    }
}