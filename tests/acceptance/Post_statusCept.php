<?php
$I = new WebGuy($scenario);
$I->wantTo('post a status');
$I->fillField('what do you want to post?', 'nguyen the huy');
$I->see('nguyen the huy');
?>
