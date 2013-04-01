<?php

class Program
{
    private $statements;

    private function __construct($statements)
    {
        $this->statements = $statements;
    }

    public static function singleStatement($statement)
    {
        return new self(array(Statement::wrap($statement)));
    }

    public static function multipleStatements(/*$statement, $statement, ...*/)
    {
        $statements = func_get_args();
        $wrapped = array();
        foreach ($statements as $statement) {
            $wrapped[] = Statement::wrap($statement);
        }
        return new self($wrapped);
    }

    public function execute(Command $command)
    {
        foreach ($this->statements as $statement) {
            return $this->tryWith($command, $statement);
        }
    }

    private function tryWith($command, $statement)
    {
        if ($command->match($statement)) {
            return $command->execute($statement);
        }
    }
}
