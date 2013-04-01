<?php

class Statement
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function wrap($code)
    {
        if ($code instanceof self) {
            return $code;
        }
        return new self($code);
    }

    public function parse(callable $callback)
    {
        return $callback($this->value);
    }
}
