<?php
class Regexp
{
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    public function matches(Statement $statement)
    {
        return $statement->parse(function($content) {
            return (bool) preg_match($this->pattern, $content);
        });
    }

    public function extract(Statement $statement)
    {
        return $statement->parse(function($content) {
            preg_match($this->pattern, $content, $matches);
            return $matches;
        });
    }
}
