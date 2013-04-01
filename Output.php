<?php

class Output
{
    private $value;

    public static function multipleLines(/*$line, $line, ...*/)
    {
        $addLineFeed = function($line) {
            return $line . "\n";
        };
        return new self(implode(
            "",
            array_map($addLineFeed, func_get_args())
        ));
    }

    public function __construct($value = '')
    {
        $this->value = $value;
    }

    public function append(Output $additional)
    {
        return new self($this->value . $additional->value);
    }
}
