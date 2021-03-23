<?php

declare(strict_types=1);

namespace RubyNight\Test;

use PHPUnit\Framework\TestCase;
use RubyNight\Application;

use function PHPUnit\Framework\assertTrue;

class AppTest extends TestCase
{
    public function testApp()
    {
        $app = new Application(__DIR__);
        $this->assertFalse($app->run());
    }
}