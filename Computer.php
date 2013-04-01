<?php

class Computer
{
    public function __construct()
    {
        $this->command = new PrintCommand();
    }

    public function execute(Program $program)
    {
        return $program->execute($this->command);
    } 
}
