<?php
class EmailHelper{
	public static function sendRecoveryInstructionPassword($user, $newPassword){
		$mail = new YiiMailer();
		$mail->setLayout('mail');
		$mail->setView('recoveryLink');
		$mail->setData(array('administrator' => $user, 'new_password' => $newPassword));
		
		$mail->setFrom('quocviet.cntt.bk@gmail.com', Yii::app()->params['SITE_NAME']);
		$mail->setTo($user->username);
		$mail->setSubject(Yii::t(Yii::app()->params['TRANSLATE_FILE'],'Instruction to recovery password from '.Yii::app()->params['SITE_NAME'].' system'));
		
		if ($mail->send()) {
			return null;
		} else {
			return $mail->getError();
		}
	}
        
        public static function sendInviteFriend($user, $newPassword){
		$mail = new YiiMailer();
		$mail->setLayout('mail');
		$mail->setView('recoveryLink');
		$mail->setData(array('administrator' => $user, 'new_password' => $newPassword));
		
		$mail->setFrom('huynt57@gmail.com', Yii::app()->params['SITE_NAME']);
		$mail->setTo($user->username);
		$mail->setSubject(Yii::t(Yii::app()->params['TRANSLATE_FILE'],'Instruction to recovery password from '.Yii::app()->params['SITE_NAME'].' system'));
		
		if ($mail->send()) {
			return null;
		} else {
			return $mail->getError();
		}
	}
        
        public static function sendRecoveryPasswordEmail($user, $newPassword){
		$mail = new YiiMailer();
		$mail->setLayout('mail');
		$mail->setView('recoveryPassword');
		$mail->setData(array('administrator' => $user, 'new_password' => $newPassword));
		
		$mail->setFrom('quocviet.cntt.bk@gmail.com', Yii::app()->params['SITE_NAME']);
		$mail->setTo($user->username);
		$mail->setSubject(Yii::t(Yii::app()->params['TRANSLATE_FILE'],'Instruction to recovery password from '.Yii::app()->params['SITE_NAME'].' system'));
		
		if ($mail->send()) {
			return null;
		} else {
			return $mail->getError();
		}
	}
}