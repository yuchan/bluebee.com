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

            if ($teacher_current_id) {
                $this->render('teacher', array('teacher_detail_info' => Teacher::model()->findAll($spCriteria)));
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

    public function ListTeacherDeptFaculty() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $listSubjectData = array(
                    'dept_id' => $_POST['dept_id'],
                    'faculty_id' => $_POST['faculty_id'],
                );
                $dept_data = Dept::model()->findAllByAttributes(array('dept_id' => $listSubjectData['dept_id']));
                $teacher_data = Teacher::model()->findAllByAttributes(array('teacher_dept' => $listSubjectData['dept_id'],
                    'teacher_faculty' => $listSubjectData['faculty_id']));
                $this->retVal->teacher_data = $teacher_data;
                $this->retVal->dept_data = $dept_data;
                $this->retVal->message = 1;
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
    }

    public function ListTeacherFaculty() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $listSubjectData = array(
                    'faculty_id' => $_POST['faculty_id'],
                );
                $faculty_data = Faculty::model()->findAllByAttributes(array('faculty_id' => $listSubjectData['faculty_id']));
                $teacher_data = Teacher::model()->findAllByAttributes(array('teacher_faculty' => $listSubjectData['faculty_id']));
                $this->retVal->teacher_data = $teacher_data;
                $this->retVal->dept_data = $faculty_data;
                $this->retVal->message = 1;
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
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
