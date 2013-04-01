<?php

class Output
{
    private $value;

    public static function multipleLines(/*$line, $line, ...*/)
    {
        // TODO: ugly to append yet another "\n"
        return new self(implode("\n", func_get_args()) . "\n");
    }

    public function __construct($value = '')
    {
        $this->value = $value;
    }

    /**
     * TODO: $other?
     */
    public function append(Output $other)
    {
        return new self($this->value . $other->value);
    }
}
