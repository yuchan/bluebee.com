<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'PHPMailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'PHPMailer' . DIRECTORY_SEPARATOR . 'class.pop3.php');
Yii::import('application.controllers.BaseController');

class ClassPageController extends BaseController {

    public function actionIndex() {
        $this->actionClassPage();
    }

    public function addClass($code, $name, $description) {
        $class_new = new class_model;
        $class_year = new ClassYear;
        $class_user = new ClassUser;



        $class_new->class_code = $code;
        $class_new->class_name = $name;
        $class_new->class_description = $description;

        $class_new->save(FALSE);
        $class_id = class_model::model()->findByAttributes(array('class_id' => $class_new->class_id));

        $class_year->class_code = $code;
        $class_year->is_active = 1;

        $class_year->class_id = $class_id->class_id;
        $class_year->class_year = date("Y");

        $class_year->save(FALSE);

        $class_user->user_id = Yii::app()->session['user_id'];
        $class_user->admin_id = Yii::app()->session['user_id'];
        $class_user->class_id = $class_id->class_id;
        $class_user->is_active = 1;

        $class_user->save(FALSE);

        return $class_id->class_id;
    }

    public function actionCreateClass() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $createClassFormData = array(
                    'classcode' => @$_POST['classcode'],
                    'classname' => @$_POST['classname'],
                    'description' => @$_POST['description'],
                );
                if (!empty($createClassFormData['classcode'])) {
                    if (!empty($createClassFormData['classname'])) {
                        if (!empty($createClassFormData['description'])) {

                            $newclass = ClassYear::model()->findByAttributes(array('class_code' => $createClassFormData['classcode']));
                            if ($newclass) {
                                if ($newclass->class_year == date("Y")) {
                                    $this->retVal->message = "Mã lớp cho năm học này đã tồn tại, bạn có thể tham gia lớp học tại ";
                                    $class_id = $newclass->class_id;
                                    $this->retVal->url_class_exist = Yii::app()->createUrl('classPage?classid=' . $class_id);
                                    $this->retVal->success = 2;
                                } else {
                                    $this->retVal->message = "Mã lớp cho năm học này chưa tồn tại, nhưng đã có từ các năm học trước. Bạn có thể tải tài liệu của lớp học tương ứng của năm trước sau khi tạo class !";
                                    $classid = $this->addClass($createClassFormData['classcode'], $createClassFormData['classname'], $createClassFormData['description']);
                                    $this->retVal->url = Yii::app()->createUrl('classPage?classid=' . $classid);
                                    $this->retVal->success = 1;
                                }
                            } else {
                                $classid = $this->addClass($createClassFormData['classcode'], $createClassFormData['classname'], $createClassFormData['description']);

                                $this->retVal->message = "Tạo lớp thành công, chúc bạn học tập tốt với bluebee";
                                $this->retVal->success = 1;
                                $this->retVal->url = Yii::app()->createUrl('classPage?classid=' . $classid);
                            }
                        } else {
                            $this->retVal->message = "Miêu tả không được để trống";
                            $this->retVal->success = 0;
                        }
                    } else {
                        $this->retVal->message = "Tên lớp không được để trống";
                        $this->retVal->success = 0;
                    }
                } else {
                    $this->retVal->message = "Mã lớp không được để trống";
                    $this->retVal->success = 0;
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            //     Yii::app()->end();
        }
    }

    public function actionClassPage() {

        if (isset($_GET["classid"])) {
            $spCriteria = new CDbCriteria();
            $spCriteria->select = "*";
            $spCriteria->condition = "class_id = " . $_GET["classid"];

            $userCriteria = new CDbCriteria();
            $userCriteria->select = "*";
            $userCriteria->condition = "class_id = " . $_GET["classid"];
            $user = ClassUser::model()->findAll($userCriteria);
            $number_of_user = count($user);

            $this->render('classPage', array('detail_classpage' => class_model::model()->findAll($spCriteria),
                'number_of_user' => $number_of_user));
        }
    }

    public function actionSuggestFriend() {
        $users = Yii::app()->db->createCommand()
                ->select('user_id, username')
                ->from('tbl_user u')
                ->queryAll();

        foreach ($users as $i => $user) {
            $users[$i]["id"] = $users[$i]["user_id"];
            $users[$i]["name"] = $users[$i]["username"];
        }
        echo CJSON::encode($users); // echo json o day
    }

    public function smtpmailer($to, $from, $from_name, $subject, $body) {

        $mail = new PHPMailer();      // tạo một đối tượng mới từ class PHPMailer
        $mail->IsSMTP();       // bật chức năng SMTP
        $mail->CharSet = "UTF-8";
        $mail->IsHTML(true);
        //     $mail->SMTPDebug = 1;       // kiểm tra ỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->SMTPAuth = true;      // bật chức năng đăng nhập vào SMTP này
        //$mail->SMTPSecure = 'ssl'; 				// sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'localhost';   // smtp của gmail
        $mail->Port = 25;       // port của smpt gmail
        $mail->Username = "accept@bluebee-uet.com";
        $mail->Password = "123456789";
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if (!$mail->Send()) {
            $message = 'Gửi thư mời bị lỗi: ' . $mail->ErrorInfo;
            return false;
        } else {
            $message = 'Thư mời của bạn đã được gửi đi ';
            return true;
        }
    }

    public function actionInvite() {
        $this->retVal = new stdClass();
        if (isset($_GET["classid"])) {
            $request = Yii::app()->request;
            $token = md5($_GET["classid"]);
            if ($request->isPostRequest && isset($_POST)) {
                try {
                    $array_treatment_id = $_POST['friends'];
                    //$array_treatment_id = array($_POST['event_id']);
                    $array = explode(",", $array_treatment_id);
                    //echo strlen($array);
                    if (count($array) > 0) {
                        $class = class_model::model()->find('class_id=:class_id',array(':class_id' => $_GET["classid"]));                      
                        $class->class_token = $token;
                        $class->save(FALSE);
                        $countSuccess = count($array);
                        foreach ($array as $useremail) {
                            //echo $a;
                            $user = User::model()->find('username=:username',array(':username' => $useremail));
                            $user_id = $user->user_id;
                            $link = $this->createAbsoluteUrl('classPage/accept?token=' . $token . '$user=' . $user_id);
                            $this->smtpmailer($useremail, "accept@bluebee-uet.com", "Accept", "Chấp nhận thư mời vào lớp " . $class->class_name, "Chào bạn " . $user->user_real_name . "<br/>Đây là đường link chấp nhận thư mời vào lớp " . $class->class_name . "<br/>" . $link);
                            $countSuccess--;
                        }
                        if ($countSuccess === 0) {
                            $this->retVal->success = 1;
                            $this->retVal->message = 'Email mời đã được gửi đi, đang đợi phản hồi';
                        } else {
                            $this->retVal->message = 'Thư mời gửi lỗi! Chưa gửi hết lời mời';
                            $this->retVal->success = 1;
                        }
                    } else {
                        $this->retVal->message = 'Bạn phải nhập người cần mời';
                        $this->retVal->success = 0;
                    }
                } catch (exception $e) {
                    $this->retVal->message = $e->getMessage();
                }
                echo CJSON::encode($this->retVal);
            }
        }
    }

    public function actionAccept() {
        if (isset($_GET["token"])) {
            if (isset($_GET["user"])) {
                $token = class_model::model()->findAllByAttributes(array('class_token' => $_GET["class_token"]));
                if ($token) {
                    $user = User::model()->findAllByAttributes(array('user_id' => $_GET["user"]));
                    if ($user) {
                        $user_class = new ClassUser;
                        $user_class->class_id = $token->class_id;
                        $user_class->user_id = $user->user_id;
                        $user_class->is_active = 1;

                        $user_class->save(FALSE);
                        $message = "Bạn đã chấp nhận lời mời vào lớp" . $token->class_name;
                        $success = 1;
                        $link = Yii::app()->createUrl('classpage?classid= ' . $token->class_id);
                    } else {
                        $message = "Bạn chưa là thành viên bluebee. Hãy đăng ký để gia nhập bluebee";
                        $success = 0;
                        $link = "";
                    }
                } else {
                    $message = "Thư mời đã xảy ra lỗi. Không thể xác nhận lời mời!";
                    $success = 0;
                    $link = "";
                }
            }
        }
        $this->render('accept', array($message => $message, $success => $success, $link => $link));
    }

    public function actionChangeClassInformation() {
        if (isset($_GET["classid"])) {
            $this->retVal = new stdClass();
            $request = Yii::app()->request;
            if ($request->isPostRequest && isset($_POST)) {
                try {
                    $changeInformationData = array(
                        'classcode' => @$_POST['classcode'],
                        'classname' => @$_POST['classname'],
                        'classCredit' => @$_POST['classCredit'],
                        'classWebsite' => @$_POST['classWebsite'],
                    );
                    if (!empty($changeInformationData['classcode'])) {
                        if (!empty($changeInformationData['classname'])) {
                            if (!empty($changeInformationData['classCredit'])) {
                                if (!empty($changeInformationData['classWebsite'])) {
                                    $class = class_model::model()->findByAttributes(array('class_id' => $_GET["classid"]));
                                    if ($class) {
                                        $class->class_code = $changeInformationData['classcode'];
                                        $class->class_name = $changeInformationData['classname'];
                                        $class->class_credit_number = $changeInformationData['classCredit'];
                                        $class->class_website = $changeInformationData['classWebsite'];
                                        if ($class->save(FALSE)) {
                                            $this->retVal->success = 1;
                                            $this->retVal->message = "Thay doi thanh cong";
                                            $this->retVal->url = Yii::app()->createUrl('classPage?classid=' . $class->class_id);
                                        } else {
                                            $this->retVal->message = "class khong thanh cong";
                                        }
                                    }
                                } else {
                                    $this->retVal->message = "Website mon hoc khong duoc de trong";
                                    $this->retVal->success = 0;
                                }
                            } else {
                                $this->retVal->message = "So tin chi khong duoc de trong";
                                $this->retVal->success = 0;
                            }
                        } else {
                            $this->retVal->message = "Ten lop khong duoc de trong";
                            $this->retVal->success = 0;
                        }
                    } else {
                        $this->retVal->message = "Ma lop khong duoc de trong";
                        $this->retVal->success = 0;
                    }
                } catch (exception $e) {
                    $this->retVal->message = $e->getMessage();
                }
                echo CJSON::encode($this->retVal);
                //     Yii::app()->end();
            }
        }
    }

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

