<?php

class Statement
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function matches(Regexp $regexp)
    {
        return $regexp->matches($this->value);
    }

    public function extract(Regexp $regexp)
    {
        return $regexp->extract($this->value);
    }
}
