<?php

class ShareController extends Controller {

//    public function beforeAction() {
//        if (Yii::app()->session['token'] == '')
//            $this->redirect('welcomePage');
//    }

    public function actionIndex() {
          if (Yii::app()->session['token'] == "")
           $this->redirect('welcomePage');
        $this->actionShare();
    }

    public function actionShare() {
        $this->render('share');
    }

    public function actionTeacher() {
        $this->render('teacher');
    }

    public function actionSubject() {
        $this->render('subject');
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
