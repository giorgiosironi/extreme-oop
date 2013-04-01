<?php

class Computer
{
    public function execute(Program $program)
    {
        if ($program == new Program('PRINT')) {
            return new Output("\n");
        }
        return new Output('');
    } 
}
