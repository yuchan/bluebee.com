<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoalv1');
$I->fillField('contact_email','khoalevan1994@gmail.com');
$I->fillField('Password1','123');
$I->click('Signup');
$I->see('Password phai nhieu hon 5 ky tu');
?>
