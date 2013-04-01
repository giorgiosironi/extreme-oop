<?php

class PrintCommand implements Command
{
    public function __construct()
    {
        $this->regexp = new Regexp('/PRINT( "(.*)")*$/');
    }

    public function match(Statement $statement)
    {
        return $this->regexp->matches($statement);
    }

    public function execute(Statement $statement)
    {
        $arguments = $this->regexp->extract($statement);
        if (isset($arguments[2])) {
            $text = $arguments[2];
            return new Output("{$text}\n");
        }
        return new Output("\n");
    }
}
