<?php


class WorkspaceControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testShowAction()
    {
        $givenWorkspaceName = 'Writing';
        $this->tester->amOnRoute('workspace_show', array('name' => $givenWorkspaceName));

        $expectedProjectTitle = "Symfony book";
        $this->tester->seeResponseContains($expectedProjectTitle);
    }


}