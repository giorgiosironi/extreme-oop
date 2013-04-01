<?php
class RAM implements Memory
{

    public function read(Expression $expression)
    {
        if ($expression->isVariable()) {
            return new Expression(0);
        }
        return $expression;
    }
}
