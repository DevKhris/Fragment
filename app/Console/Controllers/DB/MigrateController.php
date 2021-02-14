<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console\Controllers\DB;

use RubyNight\Kernel\Console\ShellController;

class MigrateController extends ShellController
{
    public function exec()
    {
         $this->getPrinter()->echo("Hold on man, this is not currently implemented");
    }
}