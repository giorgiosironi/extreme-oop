<?php
class PrintCommandTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->command = new PrintCommand();
    }

    public function testDoesNotMatchFooStatements()
    {
        $this->assertFalse($this->command->match(new Statement('FOO')));
    }

    public function testMatchesEmptyPrintStatements()
    {
        $this->assertTrue($this->command->match(new Statement('PRINT')));
    }

    public function testMatchesPrintStatementsWithArguments()
    {
        $this->assertTrue($this->command->match(new Statement('PRINT "Hello"')));
    }

    public function testExecutesEmptyPrintStatement()
    {
        $this->assertEquals(new Output("\n"), $this->command->execute(new Statement('PRINT')));
    }

    public function testExecutesPrintStatementsWithArguments()
    {
        $this->assertEquals(new Output("Hello\n"), $this->command->execute(new Statement('PRINT "Hello"')));
    }
}
