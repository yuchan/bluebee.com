<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
Yii::import('application.controllers.BaseController');

class ClassPageController extends BaseController {

    public function actionIndex() {
        $this->actionClassPage();
    }

    public function addClass($code, $name, $description) {
        $class_new = new class_model;
        $class_year = new ClassYear;

        $class_new->class_code = $code;
        $class_new->class_name = $name;
        $class_new->class_description = $description;

        $class_new->save(FALSE);
        $class_id = class_model::model()->findByAttributes(array('class_id' => $class_new->class_id));

        $class_year->class_code = $code;

        $class_year->class_id = $class_id->class_id;
        $class_year->class_year = date("Y");

        $class_year->save(FALSE);

        return $class_id->class_id;
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
                if (!empty($createClassFormData['classcode'])) {
                    $newclass = ClassYear::model()->findByAttributes(array('class_code' => $createClassFormData['classcode']));
                    if ($newclass) {
                        if ($newclass->class_year == date("Y")) {
                            $this->retVal->message = "Mã lớp cho năm học này đã tồn tại, bạn hãy tìm xem lớp mình ở đâu nhé";
                            $this->retVal->success = 0;
                        } else {
                            $this->retVal->message = "Mã lớp cho năm học này chưa tồn tại, nhưng đã có từ các năm học trước. Bạn có thể tải tài liệu của lớp học tương ứng của năm trước sau khi tạo class !";
                            $classid = $this->addClass($createClassFormData['classcode'], $createClassFormData['classname'], $createClassFormData['description']);
                            $this->retVal->url = Yii::app()->createUrl('classpage/classpage?classid=' . $classid);
                        }
                    } else {
                        $classid = $this->addClass($createClassFormData['classcode'], $createClassFormData['classname'], $createClassFormData['description']);

                        $this->retVal->message = "Tạo lớp thành công, chúc bạn học tập tốt với bluebee";
                        $this->retVal->success = 1;
                        $this->retVal->url = Yii::app()->createUrl('classpage/classpage?classid=' . $classid);
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

    public function actionClassPage() {

        if (isset($_GET["classid"])) {
            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "class_id = " . $_GET["classid"];

            $this->render('classpage', array('detail_classpage' => class_model::model()->findAll($spCriteria)));
        }
    }

    public function actionSuggestFriend() {
        $users = Yii::app()->db->createCommand()
                ->select('user_id, username')
                ->from('tbl_user u')
                ->queryAll();

        foreach ($users as $i => $user) {
            $users[$i]["id"] = $users[$i]["user_id"];
            $users[$i]["name"] = $users[$i]["username"];
        }
        echo CJSON::encode($users); // echo json o day
    }

    public function actionInvite() {
        $this->retVal->invalid_access_token = FALSE;
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $array_treatment_id = $_POST['friends'];
                //$array_treatment_id = array($_POST['event_id']);
                $array = explode(",", $array_treatment_id);
                //echo strlen($array);
                if (count($array) > 0) {

                    foreach ($array as $a) {
                        //echo $a;
                      
                    }

                    $this->retVal->message = 'Delete Success';
                    $this->retVal->success = TRUE;
                } else {
                    $this->retVal->message = 'Empty treatment_id';
                    $this->retVal->success = FALSE;
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
        $this->render('delete');
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
