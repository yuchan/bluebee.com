<?php

class UserController extends Controller
{
	public function actionIndex()
	{
            //echo "UserController.actionIndex";
            //return;
            $this->render('application.modules.bbbackend.views.user.index');
	}
}