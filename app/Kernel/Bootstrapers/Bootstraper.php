<?php

namespace RubyNight\Kernel\Bootstrapers;

use RubyNight\Kernel\Helpers\Config;

class Bootstraper
{
    public function __invoke()
    {
        return [
            'Config' => Config::class,
        ]
    }
}