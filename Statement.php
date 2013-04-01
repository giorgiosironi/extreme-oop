<?php

class Statement
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function snafucate($callback)
    {
        return $callback($this->value);
    }
}
