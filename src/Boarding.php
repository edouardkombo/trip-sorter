<?php

namespace src;

use src\Interfaces\BoardingInterface as BoardingInterface;

abstract class Boarding implements BoardingInterface {
    
    /**
     *
     * @var string
     */
    public $file;
    
    /**
     *
     * @var object
     */
    public $boardings;    
    
    /**
     * @inheritDoc
     */
    public function set($file) 
    {
        return $this->file = (string) file_get_contents($file);
    }
    
    /**
     * @inheritDoc
     */
    public function get() 
    {
        return $this->boardings = (array) json_decode($this->file, TRUE);
    }
}

