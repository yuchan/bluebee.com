<?php

class BaseController extends CController {
     public $retVal;
     public function checkSession() {
        if (Yii::app()->session['user_id'] == '' || Yii::app()->session['user_real_name'] == '' || Yii::app()->session['user_email'] == '') {
            $this->redirect(Yii::app()->createUrl('welcomepage'));
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
