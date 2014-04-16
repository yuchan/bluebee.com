<?php

class ClassPageController extends Controller {

    public function actionIndex() {
        $this->actionClassPage();
    }

    public function actionClassPage() {
        $this->render('classpage');
    }

    public function actionCreateClass() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $createClassFormData = array(
                    'classcode' => @$_POST['classcode'],
                    'classname' => @$_POST['classname'],
                    'description' => @$_POST['description'],
                );
                if (!empty($loginFormData['classcode'])) {
                    $newclass = class_model::model()->findByAttributes(array('class_code' => $createClassFormData['classcode']));
                    if ($newclass) {
                        $this->retVal->message = "Mã lớp đã tồn tại";
                    } else {
                        
                    }
                } else {
                    $this->retVal->message = "Mã lớp không được để trống";
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            //     Yii::app()->end();
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
