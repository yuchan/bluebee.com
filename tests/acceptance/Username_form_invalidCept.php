<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoa le');
$I->fillField('contact_email','khoalevan1994');
$I->fillField('Password1','123456');
$I->click('Signup');
$I->see('username khong duoc co khoang trang va phai nhieu hon 5 ky tu');
?>
