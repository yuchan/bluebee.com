<?php
$I = new WebGuy($scenario);
$I->amOnPage('/share/subject');
$I->wantTo('view information about a teacher that teach this subject');
$I->click('Huy Nguyễn');
$I->see('Giáo viên');
?>
