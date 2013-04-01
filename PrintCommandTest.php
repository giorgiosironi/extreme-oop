<?php
class PrintCommandTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->command = new PrintCommand();
        $this->memory = $this->getMock('Memory');
        $this->memory->expects($this->any())
            ->method('read')
            ->will($this->returnArgument(0));
    }

    public function testDoesNotMatchFooStatements()
    {
        $this->assertFalse($this->command->match(new Statement('FOO')));
    }

    public function testMatchesEmptyPrintStatements()
    {
        $this->assertTrue($this->command->match(new Statement('PRINT')));
    }

    public function testMatchesPrintStatementsWithStringArguments()
    {
        $this->assertTrue($this->command->match(new Statement('PRINT "Hello"')));
    }

    public function testExecutesEmptyPrintStatement()
    {
        $this->assertEquals(new Output("\n"), $this->command->execute(new Statement('PRINT'), $this->memory));
    }

    public function testExecutesPrintStatementsWithStringArguments()
    {
        $this->assertEquals(new Output("Hello\n"), $this->command->execute(new Statement('PRINT "Hello"'), $this->memory));
    }

    public function testExecutesPrintStatementsWithIntegerConstants()
    {
        $this->assertEquals(new Output("123\n"), $this->command->execute(new Statement('PRINT 123'), $this->memory));
        $this->assertEquals(new Output("-3\n"), $this->command->execute(new Statement('PRINT -3'), $this->memory));
    }

    public function testReadArgumentValuesFromMemory()
    {
        $memory = $this->getMock('Memory');
        $memory->expects($this->any())
            ->method('read')
            ->with(new Expression('A'))
            ->will($this->returnValue(new Expression(23)));
        $this->assertEquals(new Output("23\n"), $this->command->execute(new Statement('PRINT A'), $memory));
    }
}
