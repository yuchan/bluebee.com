<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoalevan');
$I->fillField('contact_email','khoa@gmail.com');
$I->fillField('Password1','123456');
$I->click('Signup');
$I->see('Ten nguoi dung da duoc dang ky');
?>
