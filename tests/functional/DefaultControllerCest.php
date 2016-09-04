<?php


class DefaultControllerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function indexActionTest(FunctionalTester $I)
    {
        $I->wantTo('to see the welcome message on homepage');
        $I->amOnPage('/');
        $I->see('Welcome');
    }
}
