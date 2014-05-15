<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoalv');
$I->fillField('contact_email','khoalevan9493@gmail.com');
$I->fillField('Password1','123456');
$I->click('Signup');
$I->see('Dang ky thanh cong, hay dang nhap bang tai khoan cua ban');
?>
