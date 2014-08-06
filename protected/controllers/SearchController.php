<?php

class SearchController extends Controller {

    public function actionIndex() {
        $this->actionSearch();
    }

    public function actionSearch() {
        if (isset($_GET['query'])) {
            $subject_result = $this->searchSubject($_GET['query']);
            $teacher_result = $this->searchTeacher($_GET['query']);
            $doc_result = $this->searchDocument($_GET['query']);
            $this->render('Search', array('subject_result' => $subject_result, 'teacher_result' => $teacher_result, 'doc_result' => $doc_result,
                'subject_count' => count($subject_result), 'teacher_count' => count($teacher_result), 'doc_count' => count($doc_result)));
        }
    }

    public function searchSubject($subject_name) {
        $subCriteria = new CDbCriteria;
        $subCriteria->select('*');
        $subCriteria->addSearchCondition('s.subject_name', $subject_name);
        $subject_result = Subject::model()->findAll($subCriteria);
        return $subject_result;
    }

    public function searchTeacher($teacher_name) {
        $teacherCriteria = new CDbCriteria;
        $teacherCriteria->select('*');
        $teacherCriteria->addSearchCondition('t.teacher_name', $teacher_name);
        $teacher_result = Subject::model()->findAll($teacherCriteria);
        return $teacher_result;
    }

    public function searchDocument($doc_name) {
        $docCriteria = new CDbCriteria;
        $docCriteria->select('*');
        $docCriteria->addSearchCondition('d.doc_name', $doc_name);
        $doc_result = Subject::model()->findAll($docCriteria);
        return $doc_result;
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
