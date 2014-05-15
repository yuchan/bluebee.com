<?php
$I = new WebGuy($scenario);
$I->amOnPage('/share');
$I->wantTo('view information about a subject');
$I->click('Đại số');
$I->see('Upload tài liệu về môn này')
?>
