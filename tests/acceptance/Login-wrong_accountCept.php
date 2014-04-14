<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'nguyen');
$I->fillField('Password','123');
$I->click('Submit');
$I->see('Ten nguoi dung chua duoc danh ky');
?>
