<?php

class PrintCommand implements Command
{
    private $regexp;

    public function __construct()
    {
        $this->regexp = new Regexp('/PRINT( (.*))*$/');
    }

    public function match(Statement $statement)
    {
        return $this->regexp->matches($statement);
    }

    public function execute(Statement $statement, Memory $memory)
    {
        $arguments = $this->regexp->extract($statement);
        if (isset($arguments[2])) {
            $text = str_replace('"', '', $arguments[2]);
            $text = $memory->read(new Expression($text));
            return new Output("{$text}\n");
        }
        return new Output("\n");
    }
}
