<?php

class ListOfSubjectController extends Controller {

    public function actionIndex() {
        $this->actionListOfSubject();
    }

    public function actionListOfSubject() {
        $this->render('listOfSubject');
    }
}