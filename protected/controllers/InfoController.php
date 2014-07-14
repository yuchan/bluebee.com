<?php

class InfoController extends Controller {

    public function actionIndex() {
        $this->actionInfo();
    }

    public function actionInfo() {
        $this->render('info');
    }
}