<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'khoalevan');
$I->fillField('Password','123');
$I->click('Submit');
$I->see('Sai ten nguoi dung hoac mat khau');
?>
