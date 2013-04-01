<?php
interface Memory
{
    /**
     * @param string
     * @return string
     */
    public function read(Expression $expression);
}
