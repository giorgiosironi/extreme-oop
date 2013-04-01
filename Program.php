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
        $output = new Output();
        foreach ($this->statements as $statement) {
            $output = $output->append($this->tryWith($command, $statement));
        }
        return $output;
    }

    private function tryWith($command, $statement)
    {
        if ($command->match($statement)) {
            return $command->execute($statement);
        }
        return new Output();
    }
}
