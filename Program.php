<?php

class Program
{
    private $statement;

    private function __construct($statement)
    {
        $this->statement = $statement;
    }

    public static function singleStatement($statement)
    {
        if (!($statement instanceof Statement)) {
            $statement = new Statement($statement);
        }
        return new self($statement);
    }

    public function execute(Command $command)
    {
        if ($command->match($this->statement)) {
            return $command->execute($this->statement);
        }
    }
}
