<?php
Yii::import('application.controllers.BaseController');
class ListOfSubjectController extends BaseController {

    public function actionIndex() {
        $this->actionListOfSubject();
    }
    
//    public function actionListSubject() {
////       $subject_data_first = Subject::model()->findAllByAttributes(array('subject_dept' => 1,
////                    1,
////                    'subject_type' => 1)) ;
////        
////       $this->render('listOfSubject');  
//    }
    
    public function actionListOfSubject() {
        $category_father = Faculty::model()->findAll();
        $subject_type = SubjectType::model()->findAll();
        $this->render('listOfSubject', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

    public function actionListOfSubject1() {
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
        } else {
            $this->retVal->message = 0;
        }

        echo CJSON::encode($this->retVal);
        $this->render('listOfSubject', array('subject_data'=>$subject_data));
        Yii::app()->end();
    }

}
