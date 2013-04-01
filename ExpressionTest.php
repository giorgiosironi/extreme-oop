<?php
class ExpressionTest extends PHPUnit_Framework_TestCase
{
    public function testLettersAreVariables()
    {
        $expression = new Expression('A');
        $this->assertTrue($expression->isVariable());
    }

    public function testOtherSymbolsCannotBeVariables()
    {
        $expression = new Expression('!');
        $this->assertFalse($expression->isVariable());
        $expression = new Expression('0');
        $this->assertFalse($expression->isVariable());
    }
}
