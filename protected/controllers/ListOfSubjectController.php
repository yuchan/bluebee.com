<?php

Yii::import('application.controllers.BaseController');

class ListOfSubjectController extends BaseController {

    public function actionIndex() {
        $this->actionListOfSubject();
    }

    public function listCategoryFather() {
        $category_father = Faculty::model()->findAll();
        return $category_father;
    }

    public function listSubjectType() {
        $subject_type = SubjectType::model()->findAll();
        return $subject_type;
    }

    public function actionListOfSubject() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->render('listOfSubject', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionInfo() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();

        $this->render('info', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionSubject() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->render('subject', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionCourseOfStudy() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->render('courseOfStudy', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionDeptInfo() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $listSubjectData = array(
                    'dept_id' => $_POST['dept_id'],
                    'faculty_id' => $_POST['faculty_id'],
                );
                $dept_data = Dept::model()->findAllByAttributes(array('dept_id' => $listSubjectData['dept_id'],
                    'dept_faculty' => $listSubjectData['faculty_id']));
                $this->retVal->dept_data = $dept_data;
                $this->retVal->message = 1;
                $html = $this->renderPartial('courseOfStudyhtml', array('dept_data' => $dept_data), FALSE);
                $this->retVal->html = $html;
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
    }

    public function actionListOfSubjectInfoView() {
        $this->retVal = new stdClass();
        $html = $this->renderPartial('listOfSubjecthtml', FALSE);
       
        echo $html;
        Yii::app()->end();
    }

    public function actionListOfSubjectInfo() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $listSubjectData = array(
                    'subject_dept' => $_POST['subject_dept'],
                    'subject_faculty' => $_POST['subject_faculty'],
                    'subject_type' => $_POST['subject_type'],
                    'dept_id' => $_POST['subject_dept'],
                    'faculty_id' => $_POST['subject_faculty'],
                );

                $subject_data = Subject::model()->findAllByAttributes(array('subject_dept' => $listSubjectData['subject_dept'],
                    'subject_faculty' => $listSubjectData['subject_faculty'],
                    'subject_type' => $listSubjectData['subject_type'],));
                $subject_type_group = SubjectGroupType::model()->findAllByAttributes(array('subject_type_id' => $listSubjectData['subject_type']));
                $this->retVal->subject_data = $subject_data;
                $this->retVal->subject_group_type = $subject_type_group;

                $dept_data = Dept::model()->findAllByAttributes(array('dept_id' => $listSubjectData['dept_id'],
                    'dept_faculty' => $listSubjectData['faculty_id']));
                $this->retVal->dept_data = $dept_data;

                $this->retVal->message = 1;
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
    }

}
