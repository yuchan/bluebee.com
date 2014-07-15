<?php

class CourseOfStudyController extends Controller {

    public function actionIndex() {
        $this->actionCourseOfStudy();
    }

    public function actionCourseOfStudy() {
        $this->render('courseOfStudy');
    }
}