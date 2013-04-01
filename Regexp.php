<?php
class Regexp
{
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    public function matches(Statement $statement)
    {
        return $statement->snafucate(function($content) {
            return (bool) preg_match($this->pattern, $content);
        });
    }

    public function extract(Statement $statement)
    {
        return $statement->snafucate(function($content) {
            preg_match($this->pattern, $content, $matches);
            return $matches;
        });
    }
}
