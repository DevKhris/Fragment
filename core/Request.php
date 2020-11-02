<?php

namespace app\core;

/**
 * Class Request
 */
class Request
{
    
    /**
     * getPath function
     *
     * @return void
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * getMethod function
     *
     * @return void
     */
    public function getMethod() 
    {

    }
}

