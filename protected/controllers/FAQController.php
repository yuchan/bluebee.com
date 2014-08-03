<?php

class FAQController extends Controller {
    public function actionIndex() {
        $this->actionFAQ();
    }

    public function actionFAQ() {
        $this->render('faq');
    }
}
