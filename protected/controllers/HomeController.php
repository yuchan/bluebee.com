<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HomeController extends Controller {

    public function actionIndex() {
        if (Yii::app()->session['token'] == "") {
            $redirect = $this->redirect('welcomePage');
        }
        $this->actionHome();
    }

    public function actionHome() {
        if (isset(Yii::app()->session['user_id'])) {
            $class_user_attend = ClassUser::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user_id']));
        }
       
        foreach ($class_user_attend as $class_id) {
            $class_activity = PostClass::model()->findAllByAttributes(array('class_id' => $class_id->class_id));
        }
        $this->render('home', array('class_user_attend' => $class_user_attend,
            'class_activity' => $class_activity));
    }


}
