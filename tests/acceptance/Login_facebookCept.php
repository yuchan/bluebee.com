<?php
$I = new WebGuy($scenario);
$I->wantTo('login via Facebook');
$I->amOnPage('/login');
$I->click('Dang nhap qua Facebook');
$I->see('Đăng nhập Facebook');
?>
