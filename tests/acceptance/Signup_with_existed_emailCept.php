<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoalv1');
$I->fillField('contact_email','khoalevan94@gmail.com');
$I->fillField('Password1','123456');
$I->click('Signup');
$I->see('Email da duoc dang ky');
?>
