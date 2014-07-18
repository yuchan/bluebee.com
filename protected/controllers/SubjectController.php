<?php

class SubjectController extends Controller {

    public function actionIndex() {
        $this->actionSubject();
    }

    public function actionSubject() {
        $this->render('subject');
    }
}