<?php

namespace RubyNight\Kernel\Http;

/**
 * Request class for request handling
 *
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Request
{
    public $params;
    public $method;
    public $contentType;
    /**
     * Constructor
     */
    function __construct($params = [])
    {
        $this->params = $this->getBody();
        $this->method = $this->getMethod();
        $this->contentType = $this->getType();
    }

    /**
     * Get the relative path
     * 
     * @return string uri path
     */
    public function getPath()
    {
        // get's the request uri or set's it to root
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // gets the position of the path at mark ?
        $pos = strpos($path, '?');
        // if position if false, return path
        if (!$pos) {
            return $path;
        }
        // substracts position mark from path
        $path = substr($path, 0, $pos);
        // returns the path wthout params
        return $path;
    }

    /**
     * Get method from server
     * 
     * @return string method
     */
    public function getMethod()
    {
        // get's the method and lowercases the value
        $method = trim($_SERVER['REQUEST_METHOD']);
        // returns method
        return $method;
    }

    /**
     * Get contentType from server
     *
     * @return void
     */
    public function getType()
    {
        $type = !empty($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : 'application/html';
        return $type;
    }
    /**
     * Get body function
     *
     * @return array
     */
    public function getBody()
    {
        $body = [];
        if ($this->getMethod() == 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    /**
     * Get JSON function
     *
     * @return array
     */
    public function getJson()
    {
        if ($this->getMethod() == 'POST') {
        } else {
            return [];
        }

        if (strcasecmp($this->contentType, 'application/json') !== 0) {
            return [];
        }
        $content = trim(file_get_contents("php://input"));
        $json = json_decode($content);

        return $json;
    }
}