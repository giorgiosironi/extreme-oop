<?php

interface Command
{
    public function match(Statement $statement);
    public function execute(Statement $statement);
}
