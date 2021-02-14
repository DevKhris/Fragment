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
    public $status = 200;
    /**
     * Set status for http response
     * 
     * @param int $code response code
     */
    public function setStatus(int $code)
    {
        // sends response code from int
        $this->status = http_response_code($code);
        return $this;
    }

    /**
     * Send json as response
     * 
     * @param array|object $data data to encode
     */
    public function JSON($data = [])
    {
        http_response_code($this->status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
