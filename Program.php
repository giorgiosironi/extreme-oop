<?php

class Program
{
    private $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public static function singleStatement($code)
    {
        return new self($code);
    }

    public function execute(Command $command)
    {
        $statement = $this->code;
        if (!($statement instanceof Statement)) {
            $statement = new Statement($statement);
        }
        if ($command->match($statement)) {
            return $command->execute($statement);
        }
    }
}
