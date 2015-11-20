<?php

class Adults extends Persons
{
    //occupied space in the time machine
    private $capacity = 1;

    public function __construct($name = '')
    {
        $this->setName($name);
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
}
