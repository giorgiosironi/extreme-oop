<?php

class PrintCommand implements Command
{
    public function match(Statement $statement)
    {
        return $statement->matches(new Regexp('/PRINT/'));
    }

    public function execute(Statement $statement)
    {
        return new Output("\n");
    }
}
