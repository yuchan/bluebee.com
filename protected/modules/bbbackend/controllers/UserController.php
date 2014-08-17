<?php

class UserController extends Controller
{
	public function actionIndex()
	{
            //echo "UserController.actionIndex";
            //return;
            $this->render('index');
	}
        
        public function actionListUser() {
            $user =  User::model()->findAll();
            echo CJSON::encode($user);
        }
}