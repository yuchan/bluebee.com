<?php

class UserController extends Controller {

    public $retVal;

    public function actionIndex() {
        //echo "UserController.actionIndex";
        //return;
        $this->render('index');
    }

    public function actionListUser() {
        $user = User::model()->findAll();
        echo CJSON::encode($user);
    }

    public function actionEditUser() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'user_id' => @$_POST['user_id'],
                    'username' => @$_POST['username'],
                    'user_real_name' => @$_POST['user_real_name'],
                    'user_date_attend' => @$_POST['user_date_attend'],
                    'user_active' => @$_POST['user_active'],
                );
                
                
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            //     Yii::app()->end();
        }
    }

}
