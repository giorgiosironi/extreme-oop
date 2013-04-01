<?php
require_once 'Computer.php';
require_once 'Program.php';
require_once 'Output.php';

class ComputerTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyProgramProducesNoOutput()
    {
        $computer = new Computer();
        $program = new Program('');
        $this->assertEquals(new Output(''), $computer->execute($program));
    } 
}
