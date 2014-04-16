<?php

Yii::import('application.controllers.BaseController');

class ClassPageController extends BaseController {

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
                    $newclass = ClassYear::model()->findByAttributes(array('class_code' => $createClassFormData['classcode']));
                    if ($newclass) {
                        if ($newclass->class_year == date("Y")) {
                            $this->retVal->message = "Mã lớp cho năm học này đã tồn tại, bạn hãy tìm xem lớp mình ở đâu nhé";
                            $this->retVal->success = 0;
                        } else {
                            $this->retVal->message = "Mã lớp cho năm học này chưa tồn tại, nhưng đã có từ các năm học trước. Bạn có muốn bluebee lấy tài liệu của các năm trước về ?";
                        }
                    } else {
                        $class_new = new class_model;
                        $class_year = new ClassYear;

                        $class_new->class_code = $createClassFormData['classcode'];
                        $class_new->class_name = $createClassFormData['classname'];
                        $class_new->class_description = $createClassFormData['description'];

                        $class_new->save(FALSE);
                        $class_id = class_model::model()->findByAttributes(array('class_id' => $class_new->class_id));

                        $class_year->class_code = $createClassFormData['classcode'];
                        $class_year->class_name = $createClassFormData['classname'];
                        $class_year->class_code = $class_id->class_id;

                        $class_year->save(FALSE);

                        $this->retVal->message = "Tạo lớp thành công, chúc bạn học tập tốt với bluebee";
                        $this->retVal->success = 1;
                    }
                } else {
                    $this->retVal->message = "Mã lớp không được để trống";
                    $this->retVal->success = 0;
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
