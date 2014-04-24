<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HomeController extends Controller {

    public function beforeAction() {
        if (Yii::app()->user->isGuest)
            $this->redirect('welcomePage');
    }

    public function actionIndex() {
        $this->actionHome();
    }

    public function actionHome() {
        $this->render('home');
    }

}
