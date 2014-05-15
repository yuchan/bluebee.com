<?php
$I = new WebGuy($scenario);
$I->wantTo('Sign up an account');
$I->amOnPage('/login');
$I->fillField('contact_name','khoalv1');
$I->fillField('contact_email','khoalevan1994');
$I->fillField('Password1','123');
$I->click('Signup');
$I->see('Sai dinh dang email');
?>
