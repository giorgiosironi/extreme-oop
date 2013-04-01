<?php
class RAMTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->ram = new RAM();
    }

    public function testLiteralExpressionAreNotModified()
    {
        $this->assertEquals(
            new Expression(123),
            $this->ram->read(new Expression(123))
        );
    }

    public function testSingleLettersDefaultToZero()
    {
        $this->assertEquals(
            new Expression(0),
            $this->ram->read(new Expression('A'))
        );
    }
}
