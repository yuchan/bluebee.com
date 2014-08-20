<?php

class TermController extends Controller {
    public function actionIndex() {
        $this->actionTerm();
    }

    public function actionTerm() {
         $this->pageTitle = "Bluebee - UET | Điều khoản sử dụng";
        Yii::app()->clientScript->registerMetaTag("Bluebee - UET | Điều khoản sử dụng", null, null, array('property' => 'og:title'));
        $this->render('term');
    }
}
