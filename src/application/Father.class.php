<?php

class Father extends Adults
{

    public function __construct($name = '')
    {
        $this->setName($name);
    }
}