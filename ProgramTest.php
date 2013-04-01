<?php
class ProgramTest extends PHPUnit_Framework_TestCase
{
    public function testExecutesAStatementIfItIsACommand()
    {
        $statement = new Statement('FOO');
        $program = Program::singleStatement($statement);
        $command = $this->getMock('Command');
        $command->expects($this->any())
            ->method('match')
            ->with($statement)
            ->will($this->returnValue(true));
        $command->expects($this->any())
            ->method('execute')
            ->with($statement)
            ->will($this->returnValue(new Output('dummy')));

        $output = $program->execute($command);
        $this->assertEquals(new Output('dummy'), $output);
    }
}
