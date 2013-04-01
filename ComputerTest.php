<?php

class ComputerTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyProgramProducesNoOutput()
    {
        $computer = new Computer();
        $program = new Program('');
        $this->assertEquals(new Output(''), $computer->execute($program));
    } 

    public function testABarePrintStatementProducesASingleNewline()
    {
        $computer = new Computer();
        $program = new Program('PRINT');
        $this->assertEquals(new Output("\n"), $computer->execute($program));
    } 
}
