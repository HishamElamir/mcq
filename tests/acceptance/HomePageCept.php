<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('verify that the home page works well');
$I->amOnPage('/');
$I->see('Welcome');
