<?php

class UserController extends Controller {

    public function actionIndex() {
        $this->actionUser();
    }

    public function actionUser() {
        if (isset($_GET["token"])) {
            
            $user_activity = $this->userActivity();
            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "user_token = '" . $_GET["token"] . "'";

            $user_current_token = User::model()->findByAttributes(array('user_token' => $_GET["token"]));

            if ($user_current_token) {

                $sql = "SELECT * FROM tbl_class_user INNER JOIN tbl_class ON tbl_class_user.class_id = tbl_class.class_id WHERE user_id = '" . $user_current_token->user_id . "'";
                $user_class_info = Yii::app()->db->createCommand($sql)->queryAll();
                $this->render('user', array('user_detail_info' => User::model()->findAll($spCriteria),
                    'user_class_info' => $user_class_info, 'user_activity' => $user_activity));
            } else {
                $this->redirect('welcomePage');
            }
        } else
            $this->redirect('welcomePage');
    }
    
     public function actionUser_Visitor() {
        if (isset($_GET["userid"])) {
            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "user_id = '" . $_GET["userid"] . "'";

            $user_current_token = User::model()->findByAttributes(array('user_id' => $_GET["userid"]));

            if ($user_current_token) {

                $sql = "SELECT * FROM tbl_class_user INNER JOIN tbl_class ON tbl_class_user.class_id = tbl_class.class_id WHERE user_id = '" . $user_current_token->user_id . "'";
                $user_class_info = Yii::app()->db->createCommand($sql)->queryAll();
                $this->render('user', array('user_detail_info' => User::model()->findAll($spCriteria),
                    'user_class_info' => $user_class_info));
            } else {
                $this->redirect('welcomePage');
            }
        } else
            $this->redirect('welcomePage');
    }
    
    
    public function userActivity() {
        $user_activity = Post::model()->findAllByAttributes(array('post_author' =>  Yii::app()->session["user_id"] ));
        return $user_activity;
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
