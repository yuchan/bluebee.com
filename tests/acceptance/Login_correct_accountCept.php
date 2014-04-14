<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'khoalevan');
$I->fillField('Password','123456');
$I->click('Submit');
$I->see('Dang nhap thanh cong');
?>
