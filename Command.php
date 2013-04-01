<?php

interface Command
{
    /**
     * @return boolean
     */
    public function match(Statement $statement);

    /**
     * @return Output
     */
    public function execute(Statement $statement);
}
