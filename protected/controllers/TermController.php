<?php

class TermController extends Controller {
    public function actionIndex() {
        $this->actionTerm();
    }

    public function actionTerm() {
        $this->render('term');
    }
}
