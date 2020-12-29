<?php

namespace RubyNight\Kernel\Http;

/**
 * Class Response for response handling
 * 
 * @package RubyNight\Kernel\Http;
 * 
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 */
class Response
{
    /**
     * Set status for http response
     * 
     * @param int $code response code
     */
    public function setStatus(int $code)
    {
        // sends response code from int
        http_response_code($code);
    }
}