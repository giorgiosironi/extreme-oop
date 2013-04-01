<?php

class ComputerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->computer = new Computer();
    }

    public function testEmptyProgramProducesNoOutput()
    {
        $program = new Program('');
        $this->assertEquals(new Output(''), $this->computer->execute($program));
    } 

    public function testABarePrintStatementProducesASingleNewline()
    {
        $program = new Program('PRINT');
        $this->assertEquals(new Output("\n"), $this->computer->execute($program));
    } 

    public function testAPrintStatementCanHaveAConstantStringAsArgument()
    {
        $program = new Program('PRINT "Hello, World!"');
        $this->assertEquals(new Output("Hello, World!\n"), $this->computer->execute($program));
    }
}
