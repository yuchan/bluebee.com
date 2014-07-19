<?php

Yii::import('application.controllers.BaseController');

class ListOfSubjectController extends BaseController {

    public function actionIndex() {
        $this->actionListOfSubject();
    }

    public function actionListOfSubject() {
        $category_father = Faculty::model()->findAll();
        $subject_type = SubjectType::model()->findAll();
        $this->render('listOfSubject', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionInfo() {
        $category_father = Faculty::model()->findAll();
        $subject_type = SubjectType::model()->findAll();

        $this->render('info', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionSubject() {
        $category_father = Faculty::model()->findAll();
        $subject_type = SubjectType::model()->findAll();
        $this->render('subject', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionCourseOfStudy() {
        $category_father = Faculty::model()->findAll();
        $subject_type = SubjectType::model()->findAll();
        $this->render('courseOfStudy', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionListOfSubjectInfo() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $listSubjectData = array(
                    'subject_dept' => @$_POST['subject_dept'],
                    'subject_faculty' => @$_POST['subject_faculty'],
                    'subject_type' => $_POST['subject_type'],
                );

                $subject_data = Subject::model()->findAllByAttributes(array('subject_dept' => $listSubjectData['subject_dept'],
                    'subject_faculty' => $listSubjectData['subject_faculty'],
                    'subject_type' => $listSubjectData['subject_type'],));
                $this->retVal->data = $subject_data;
                $this->retVal->message = 1;
            } catch (exception $e) {
                // $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
    }

}
