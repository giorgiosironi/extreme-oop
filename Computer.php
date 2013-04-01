<?php

class Computer
{
    public function __construct()
    {
        $this->command = new PrintCommand();
    }

    public function execute(Program $program)
    {
        if ($output = $program->execute($this->command)) {
            return $output;
        }
        return new Output('');
    } 
}
