<?php

class ViewDocumentController extends Controller {

//     public function beforeAction() {
//        if (Yii::app()->session['token'] == '')
//            $this->redirect('welcomePage');
//    }

    public function actionIndex() {
      //  if (Yii::app()->session['token'] == "")
        //    $this->redirect('welcomePage');
        $this->actionViewDocument();
    }

    public function actionViewDocument() {
        if(isset($_GET['doc_id'])){
            $detail_doc = Doc::model()->findAll(array("select" => "*", "condition" => "doc_id = ". $_GET["doc_id"]));
            
            $doc_subject = SubjectDoc::model()->findAll(array("select" => "*", "condition" => "doc_id =".$detail_doc->doc_id));
            
            $related_doc = SubjectDoc::model()->findAll(array("select" => "*", "condition" => "subject_id =".$doc_subject->subject_id));
            
            if(count($related_doc))
            
            $this->render('viewDocument', array('detail_doc' => $detail_doc));
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
