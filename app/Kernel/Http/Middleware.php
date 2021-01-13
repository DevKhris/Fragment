<?php

namespace RubyNight\Kernel\Http;

/**
 * Middleware class
 */
abstract class Middleware
{
    abstract function run();
}