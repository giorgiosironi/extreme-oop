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
        if (!($statement instanceof Statement)) {
            $statement = new Statement($statement);
        }
        return new self(array($statement));
    }

    public static function multipleStatements(/*$statement, $statement, ...*/)
    {
        $statements = func_get_args();
        $statements = array($statements[0]);
        foreach ($statements as $statement) {
            if (!($statement instanceof Statement)) {
                $statement = new Statement($statement);
            }
        }
        return new self(array($statement));
    }

    public function execute(Command $command)
    {
        foreach ($this->statements as $statement) {
            if ($command->match($statement)) {
                return $command->execute($statement);
            }
        }
    }
}
