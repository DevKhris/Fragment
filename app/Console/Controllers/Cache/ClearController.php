<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console\Controllers\Cache;

use RubyNight\Kernel\Console\ShellController;

class ClearController extends ShellController
{
    public function exec()
    {
         $this->getPrinter()->echo("Stop it, this need's to stop now, this is cancer");
    }
}