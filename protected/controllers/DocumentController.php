<?php

Yii::import('application.controllers.BaseController');

class DocumentController extends BaseController {

//     public function beforeAction() {
//        if (Yii::app()->session['token'] == '')
//            $this->redirect('welcomePage');
//    }

    public function actionIndex() {
        if (Yii::app()->session['token'] == "")
        //    $this->redirect('welcomePage');

        $this->actionDocument();
    }

    public function actionDocument() {
        $Criteria = new CDbCriteria(); //represent for query such as conditions, ordering by, limit/offset.
        $Criteria->select = "*";
        $Criteria->order = "doc_id DESC";

        $this->render('document', array('document' => Doc::model()->findAll($Criteria)));
    }

    public function actionViewDocument() {
        $this->render('viewdocument');
    }

    public function actionUpload() {
        //$ds = DIRECTORY_SEPARATOR;  //1
        $api_key = "24cxjtv3vw69wu5p7pqd9";
        $secret = "sec-b2rlvg8kxwwpkz9fo3i02mo9vo";

        $this->retVal = new stdClass();

        $scribd = new Scribd($api_key, $secret);

        $storeFolder = Yii::app()->basePath . '/uploads/';   //2


        $tempFile = $_FILES['file']['tmp_name'];          //3
        $targetPath = $storeFolder;  //4
        $targetFile = $targetPath . $_FILES['file']['name'];  //5
        move_uploaded_file($tempFile, $targetFile); //6
        $upload_scribd = $scribd->upload($targetFile);
        //var_dump($upload_scribd);
        $thumbnail_info = array('doc_id' => $upload_scribd["doc_id"],
            'method' => NULL,
            'session_key' => NULL,
            'my_user_id' => NULL,
            'width' => '180',
            'height' => '220');
        $get_thumbnail = $scribd->postRequest('thumbnail.get', $thumbnail_info);
        // var_dump($get_thumbnail);
        $this->retVal->docid = $upload_scribd["doc_id"];
        $this->retVal->thumbnail = $get_thumbnail["thumbnail_url"];
        echo CJSON::encode($this->retVal);
        Yii::app()->end();
    }

    public function actionUpdateInfo() {
        //   $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'description' => @$_POST['description'],
                    'title' => @$_POST['title'],
                    'faculty' => @$_POST['faculty'],
                    'doc_id' => @$_POST['doc_id'],
                    'thumbnail_url' => @$_POST['thumbnail_url']
                );
                $doc_model = new Doc;
                $doc_model->doc_name = $loginFormData['title'];
                $doc_model->doc_description = $loginFormData['description'];
                $doc_model->doc_scribd_id = $loginFormData["doc_id"];
                $doc_model->doc_url = $loginFormData["thumbnail_url"];
                $doc_model->doc_faculty_id = $loginFormData['faculty'];
                $doc_model->doc_status = 1;
                $doc_model->save(FALSE);
            } catch (exception $e) {
                // $this->retVal->message = $e->getMessage();
            }
        }
        $this->retVal->docid = $loginFormData["doc_id"];
        $this->retVal->thumbnail = $loginFormData["thumbnail_url"];
        $this->retVal->title = $loginFormData["title"];
        $this->retVal->description = $loginFormData["description"];
        $this->retVal->faculty = $loginFormData["faculty"];
        echo CJSON::encode($this->retVal);
        Yii::app()->end();
    }

    public function actionComment() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'comment_doc_id' => $_POST['comment_doc_id'],
                    'comment_content' => $_POST['content'],
                );
                $comment_model = new Comment;
                $comment_model->comment_doc_id = $loginFormData['comment_doc_id'];
                $comment_model->comment_content = $loginFormData['comment_content'];

                $comment_model->save(FALSE);
                if ($comment_model->save(FALSE)) {
                    $this->retVal->success = TRUE;
                } else {
                    $this->retVal->success = FALSE;
                }
            } catch (exception $e) {
                // $this->retVal->message = $e->getMessage();
            }
        }
        $this->retVal->message = $loginFormData['comment_content'];
        echo CJSON::encode($this->retVal);
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
