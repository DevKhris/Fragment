<?php

namespace RubyNight\Kernel\Http;

/**
 * Response class for response handling
 * 
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
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