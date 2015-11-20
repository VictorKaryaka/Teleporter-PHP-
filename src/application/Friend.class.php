<?php

class Friend  extends Adults {

    public function __construct($name = '') {
        $this->setName($name);
    }
}