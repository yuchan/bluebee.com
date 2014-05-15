<?php
$I = new WebGuy($scenario);
$I->wantTo('make a post and see result');
$I->amOnPage('/discussion');
$I->fillField('post_content', 'khoa');
$I->click('Submit');
$I->see('khoa');
?>
