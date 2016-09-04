<?php


class WorkspaceControllerAcceptCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function testShowAction(AcceptanceTester $I)
    {
        $I->wantTo("to see inside the \"Writing\" workspace");
        $I->amOnPage('/workspace/writing');
        $I->see('Symfony book');
        $I->wait(3);
    }
}
