<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'khoalevan');
$I->fillField('Password','');
$I->click('Submit');
$I->see('Password khong duoc de trong');
?>
