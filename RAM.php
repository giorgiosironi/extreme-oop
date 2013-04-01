<?php
class RAM implements Memory
{

    public function read(Expression $expression)
    {
        return $expression;
    }
}
