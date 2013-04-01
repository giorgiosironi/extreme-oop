<?php
class Regexp
{
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    public function matches($content)
    {
        return (bool) preg_match($this->pattern, $content);
    }

    public function extract($content)
    {
        preg_match($this->pattern, $content, $matches);
        return $matches;
    }
}
