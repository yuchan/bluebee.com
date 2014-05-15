<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', '');
$I->fillField('Password','123456');
$I->click('Submit');
$I->see('User name khong duoc de trong');
?>
