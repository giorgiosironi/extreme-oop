<?php

class PrintCommand implements Command
{
    public function match(Statement $statement)
    {
        return $statement->matches(new Regexp('/PRINT/'));
    }

    public function execute(Statement $statement)
    {
        $arguments = $statement->extract(new Regexp('/PRINT( "(.*)")*$/'));
        if (isset($arguments[2])) {
            $text = $arguments[2];
            return new Output("{$text}\n");
        }
        return new Output("\n");
    }
}
