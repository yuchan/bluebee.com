<?php
Yii::import('application.controllers.BaseController');
class ListOfSubjectController extends BaseController {

    public function actionIndex() {
        $this->render('listOfSubject');
    }

    public function actionListOfSubject() {
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
