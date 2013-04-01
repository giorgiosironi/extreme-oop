<?php

class ComputerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->computer = new Computer();
    }

    public function testEmptyProgramProducesNoOutput()
    {
        $program = Program::singleStatement('');
        $this->assertEquals(new Output(''), $this->computer->execute($program));
    } 

    public function testABarePrintStatementProducesASingleNewline()
    {
        $program = Program::singleStatement('PRINT');
        $this->assertEquals(new Output("\n"), $this->computer->execute($program));
    } 

    public function testAPrintStatementCanHaveAConstantStringAsArgument()
    {
        $program = Program::singleStatement('PRINT "Hello, World!"');
        $this->assertEquals(new Output("Hello, World!\n"), $this->computer->execute($program));
    }

    public function testTwoOrMoreStatementsAreExecutedOneAfterTheOther()
    {
        $program = Program::multipleStatements(
            'PRINT "Hi"', 
            'PRINT "There"',
            'PRINT "!"'
        );
        $this->assertEquals(
            Output::multipleLines("Hi", "There", "!"),
            $this->computer->execute($program)
        );
    }
}
