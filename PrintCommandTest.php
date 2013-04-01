<?php
class PrintCommandTest extends PHPUnit_Framework_TestCase
{
    public function testDoesNotMatchFooStatements()
    {
        $command = new PrintCommand();
        $this->assertFalse($command->match(new Statement('FOO')));
    }

    public function testMatchesEmptyPrintStatements()
    {
        $command = new PrintCommand();
        $this->assertTrue($command->match(new Statement('PRINT')));
    }

    public function testMatchesPrintStatementWithArguments()
    {
        $this->markTestIncomplete();
    }

    public function testExecutesEmptyPrintStatement()
    {
        $command = new PrintCommand();
        $this->assertEquals(new Output("\n"), $command->execute(new Statement('PRINT')));
    }

    public function testExecutesPrintStatementWithArguments()
    {
        $this->markTestIncomplete();
    }
}
