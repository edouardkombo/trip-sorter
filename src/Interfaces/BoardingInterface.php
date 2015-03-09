<?php

namespace src\Interfaces;


interface BoardingInterface {   
    
    /**
     * Specify boardings file
     * 
     * @param  string $file
     * @return string
     */
    function set($file);
    
    /**
     * Load all boardings
     * 
     * @return array
     */
    function get();
}

