<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DepartmentController extends Controller {

    public function actionIndex() {

        $this->actionDepartment();
    }

    public function listCategoryFather() {
        $category_father = Faculty::model()->findAll();
        return $category_father;
    }

    public function listSubjectType() {
        $subject_type = SubjectType::model()->findAll();
        return $subject_type;
    }

    public function actionDepartment() {
        $category_father = $this->listCategoryFather();
        $subject_type = $this->listSubjectType();
        $this->render('Department', array('category_father' => $category_father, 'subject_type' => $subject_type));
    }

}
