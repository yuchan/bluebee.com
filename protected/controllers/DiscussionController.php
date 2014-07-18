<?php

Yii::import('application.controllers.BaseController');

class DiscussionController extends BaseController {

//     public function beforeAction() {
//        if (Yii::app()->session['token'] == '')
//            $this->redirect('welcomePage');
//    }

    public function actionIndex() {
        $this->actionDiscussion();
    }

    public function actionDiscussion() {
        $newCriteria = new CDbCriteria();
        $newCriteria->select = "*";
        $newCriteria->order = "post_id DESC";
        $this->render('discussion', array('post' => Post::model()->findAll($newCriteria)));
    }

    public function actionMakePost() {

        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'post_content' => $_POST['post_content'],
                );
                $post_model = new Post;
                $post_model->post_content = $loginFormData['post_content'];

                $post_model->save(FALSE);
                if ($post_model->save(FALSE)) {
                    $this->retVal->success = TRUE;
                } else {
                    $this->retVal->success = FALSE;
                }
            } catch (exception $e) {
                // $this->retVal->message = $e->getMessage();
            }
        }
        $this->retVal->message = $loginFormData['post_content'];
        echo CJSON::encode($this->retVal);
        Yii::app()->end();
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
