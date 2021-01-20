<?php

namespace RubyNight\Kernel\Http;

/**
 * Middleware abstract class
 *
 * @category Framework
 * @package  RubyNight\Kernel\Http;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
abstract class Middleware
{
    /**
     * Run function from middleware
     *
     * @return void
     */
    abstract function run();
}
