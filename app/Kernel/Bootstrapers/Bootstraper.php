<?php

namespace Fragment\Kernel\Bootstrapers;

use Fragment\Kernel\Helpers\Configuration;

class Bootstraper
{
    public function __invoke()
    {
        return [
            'Config' => Configuration::class,
        ]
    }
}