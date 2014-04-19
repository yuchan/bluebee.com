<?php

Yii::import('application.controllers.BaseController');

class WelcomePageController extends BaseController {

    public function init() {
        Yii::app()->theme = 'welcome';
        parent::init();
    }

    public function actionIndex() {
        $this->actionWelcomePage();
    }

    public function actionWelcomePage() {
        $this->render('welcomePage');
    }

    public function actionLogin() {

        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'user_name' => @$_POST['username'],
                    'user_password' => @$_POST['Password'],
                );
                if (!empty($loginFormData['user_name'])) {
                    if (Validator::validateEmail($loginFormData['user_name'])) {
                        if (!empty($loginFormData['user_password'])) {
                            $user = User::model()->findByAttributes(array('username' => $loginFormData['user_name']));
                            if ($user) {
                                //user existed, check password
                                if ($user->user_active == 1) {
                                    if ($user->password == $loginFormData['user_password']) {
                                        $this->retVal->message = "Dang nhap thanh cong";
                                        Yii::app()->session['user_id'] = $user->user_id;
                                        Yii::app()->session['user_real_name'] = $user->user_real_name;
                                        Yii::app()->session['user_email'] = $user->username;

                                        $this->retVal->success = 1;
                                        //token
                                        $token = StringHelper::generateToken(16, 36);
                                        $user->user_token = $token;
                                        $user->save(FALSE);
                                        $this->retVal->token = $token;
                                        $this->retVal->url = Yii::app()->createUrl("user?token=" . $token);
                                    } else {
                                        $this->retVal->message = "Sai tên người dùng hoặc mật khẩu";
                                        $this->retVal->success = 0;
                                    }
                                } else {

                                    $this->retVal->message = "Bạn chưa kích hoạt tài khoản. Hãy kiểm tra email của bạn để kích hoạt nhé";
                                    $this->retVal->success = 0;
                                }
                            } else {
                                $this->retVal->message = "Tên người dùng chưa được đăng ký";
                                $this->retVal->success = 0;
                            }
                        } else {
                            $this->retVal->message = "Password không được để trống";
                            $this->retVal->success = 0;
                        }
                    } else {
                        $this->retVal->message = "Sai định dạng email";
                        $this->retVal->success = 0;
                    }
                } else {
                    $this->retVal->message = "Email không được để trống";
                    $this->retVal->success = 0;
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            //     Yii::app()->end();
        }
    }

    public function actionSignUp() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $singupFormData = array(
                    'user_name' => $_POST['contact_name'],
                    'user_password' => $_POST['Password'],
                    'user_email' => $_POST['contact_email'],
                );

                if (!empty($singupFormData['user_email'])) {
                    if (!empty($singupFormData['user_password'])) {

                        if (Validator::validateEmail($singupFormData['user_email'])) {
                            if (Validator::validatePassword($singupFormData['user_password'])) {

                                $user = User::model()->findByAttributes(array('username' => $singupFormData['user_email']));
                                if ($user) {
                                    $this->retVal->message = "Email đã được đăng ký";
                                    $this->retVal->success = 0;
                                } else {
                                    $model = new User;
                                    if ($model) {
                                        $activator = md5($singupFormData['user_email']);
                                        $link_activate = Yii::app()->createUrl('activate?token=' . $activator);
                                        $model->user_real_name = $singupFormData['user_name'];
                                        $model->password = $singupFormData['user_password'];
                                        $model->username = $singupFormData['user_email'];
                                        $model->user_activator = $activator;
                                        EmailHelper::sendVerifyAccount($singupFormData['user_email'], $link_activate);
                                        $model->user_status = 1;
                                        $model->user_active = 0;
                                        $model->save(FALSE);
                                        if ($model->save(FALSE)) {
                                            $this->retVal->message = "Đăng ký thành công, hãy đăng nhập bằng tài khoản của bạn";
                                            $this->retVal->success = 1;
                                        } else {
                                            $this->retVal->message = "Không thể lưu user do lỗi server";
                                            $this->retVal->success = 0;
                                        }
                                    } else {
                                        $this->retVal->message = "Không thể lưu user do lỗi server ";
                                        $this->retVal->success = 0;
                                    }
                                }
                            } else {
                                $this->retVal->message = "Password phải nhiều hơn 5 kí tự";
                                $this->retVal->success = 0;
                            }
                        } else {
                            $this->retVal->message = "Sai định dạng email";
                            $this->retVal->success = 0;
                        }
                    } else {
                        $this->retVal->message = "Password không được để trống";
                        $this->retVal->success = 0;
                    }
                } else {
                    $this->retVal->message = "Email không được để trống";
                    $this->retVal->success = 0;
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            //  Yii::app()->end();
        }

        //  $this->render('welcomePage/signUp');
    }

    public function actionLogout() {
        Yii::app()->session['user_id'] = $user->user_id;
        Yii::app()->session['user_real_name'] = $user->user_real_name;
        Yii::app()->session['user_email'] = $user->username;
        $this->redirect(Yii::app()->createUrl('welcomepage'));
    }
    
    public function actionActivate() {
        if (isset($_GET["token"])) {
            $user_activate = User::model()->findByAttributes(array('user_activator' => $_GET["token"]));
            if ($user_activate) {
                $user_activate->user_active = 1;
                $user_activate->save(FALSE);
            }

            $this->render('activate');
        }
    }

    function getFb() {
        $app_id = "1428478800723370";
        $app_secret = "64b21e0ab23ec7db82979f9607065704";
        $site_url = "bluebee-uet.com";

        $facebook = new Facebook(array(
            'appId' => $app_id,
            'secret' => $app_secret,
            "cookie" => true
        ));
        return $facebook;
    }

    public function actionFb_login() {
        $facebook = $this->getFb();
        $loginUrl = $facebook->getLoginUrl(array(
            'scope' => '',
            'redirect_uri' => "http://bluebee-uet.com/discussion",
        ));
        $this->redirect($loginUrl);
    }

    public function actionFb_login_result() {
        $facebook = $this->getFb();
        $access_token = $facebook->getAccessToken();
        $user = $facebook->api("me", "get", array(
            "access_token" => $access_token
        ));
    }

    public function actionloginFacebook() {
        $app_id = "1428478800723370";
        $app_secret = "64b21e0ab23ec7db82979f9607065704";
        $site_url = "bluebee-uet.com";

        $facebook = new Facebook(array(
            'appId' => $app_id,
            'secret' => $app_secret,
        ));

        $user = $facebook->getUser();

        if ($user) {
            try {
                $user_profile = $facebook->api('/me');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = NULL;
            }
        }

        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl();
        } else {
            $loginUrl = $facebook->getLoginUrl(array(
                'scope' => 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
                'redirect_uri' => $site_url,
            ));
            $this->redirect($loginUrl);
        }

        if ($user) {
            $queries = array(
                array('method' => 'GET', 'relative_url' => '/' . $user),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/home?limit=50'),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/friends'),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/photos?limit=6'),
            );

            try {
                $batchResponse = $facebook->api('?batch=' . json_encode($queries), 'POST');
            } catch (Exception $o) {
                error_log($o);
            }

            $user_info = json_decode($batchResponse[0]['body'], TRUE);
            $feed = json_decode($batchResponse[1]['body'], TRUE);
            $friends_list = json_decode($batchResponse[2]['body'], TRUE);
            $photos = json_decode($batchResponse[3]['body'], TRUE);
        }
        $this->render('fb');
    }

//    public function actionWelcomePage() {
//        $this->render('index');
//    }
    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
