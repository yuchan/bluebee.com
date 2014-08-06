<?php

class ShareController extends Controller {

//    public function beforeAction() {
//        if (Yii::app()->session['token'] == '')
//            $this->redirect('welcomePage');
//    }

    public function actionIndex() {
//        if (Yii::app()->session['token'] == "")
//            $this->redirect('welcomePage');
        $this->actionShare();
    }

    public function listCategoryFather() {
        $category_father = Faculty::model()->findAll();
        return $category_father;
    }

    public function listSubjectType() {
        $subject_type = SubjectType::model()->findAll();
        return $subject_type;
    }

    public function actionShare() {
        $this->render('share');
    }

    public function actionTeacher() {
        if (isset($_GET["id"])) {

            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "teacher_id = '" . $_GET["id"] . "'";

            $teacher_current_id = Teacher::model()->findByAttributes(array('teacher_id' => $_GET["id"]));

            $subject_teacher = Subject::model()->with(array('subject_teacher'=>array(
                'select' => false,
                'condition' => 'teacher_id = '.$_GET['id']
            )))->findAll();
//            $teachers = Teacher::model()->with(array("subject_teacher" => array(
//                            "select" => false,
//                            "condition" => "subject_id = " . $_GET["subject_id"]
//                )))->findAll();
            if ($teacher_current_id) {
                $this->render('teacher', array('teacher_detail_info' => Teacher::model()->findAll($spCriteria),
                    'subject_teacher' => $subject_teacher));
            }
        }
    }

    public function actionTeacherListPage() {
        $teacher_list = Teacher::model()->findAll();
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->render('teacherListPage', array('teacher_list' => $teacher_list, 'category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionSubject() {
        $this->render('subject');
    }

    public  function actionRating(){
        $this->retval = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            $this->retval->score = 1;
        }
        echo CJSON::endcode($this->retval);
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
