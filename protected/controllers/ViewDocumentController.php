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
            
            $subject = Subject::model()->with(array("subject_doc" => array(
                            "select" => false,
                            "condition" => "doc_id = " . $_GET["doc_id"]
                )))->findAll();
            
            $related_doc = Doc::model()->findAll(array("select" => "*", "limit" => "3", "order" => "RAND()"));
                       
            $this->render('viewDocument', array('detail_doc' => $detail_doc, 'related_doc' => $related_doc, 'subject' => $subject));
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
