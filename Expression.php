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

    /**
     * @return bool
     */
    public function isVariable()
    {
        return (bool) preg_match('/^[A-Z]{1,1}$/', $this->text);
    }
}
