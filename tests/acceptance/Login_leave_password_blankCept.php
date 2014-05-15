<?php
$I = new WebGuy($scenario);
$I->wantTo('login');
$I->amOnPage('/login');
$I->fillField('username', 'khoalevan');
$I->fillField('Password','');
$I->click('Submit');
$I->see('Password khong duoc de trong');
?>
'<div class="g-form-row-field">' +
                                '<div id="error" class="g-alert type_error">' +
                                '<div class="g-alert-body" style="text-align: center">' +
                                '<p id="login-result"><b>' + result.message + '</b></p>' +
                                '</div>' +
                                '</div>' +
                                '</div>'