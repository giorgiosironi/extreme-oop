<?php

class Computer
{
    private $command;

    public function __construct()
    {
        $this->command = new PrintCommand();
    }

    public function execute(Program $program)
    {
        return $program->execute($this->command);
    } 
}
