<?php

class Expression
{
    public function __construct($text)
    {
        $this->text = (string) $text;
    }

    public function __toString()
    {
        return $this->text;
    }
}
