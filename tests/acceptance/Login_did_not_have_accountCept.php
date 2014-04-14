<?php
$I = new WebGuy($scenario);
$I->wantTo('sign up');
$I->amOnPage('/login');
$I->click('Dang ky');
$I->see('Username khong duoc de trong');
?>
