<?php

class UserController extends Controller {

    public function actionIndex() {
        $this->actionUser();
    }

    public function actionUser() {
        if (isset($_GET["token"])) {
            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "user_token = '" . $_GET["token"]."'";
            
            $user_current_token = User::model()->findByAttributes(array('user_token' => $_GET["token"]));
            
            $user_classCriteria = new CDbCriteria();
            $user_classCriteria->select = "*";
            $user_classCriteria->condition = "user_id = '".$user_current_token->user_id."'";
            
            $this->render('user', array('user_detail_info' => User::model()->findAll($spCriteria),
                'user_class_info' => ClassUser::model()->findAll($user_classCriteria)));
        }
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
