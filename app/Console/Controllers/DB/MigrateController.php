<?php

declare(strict_types=1);

namespace RubyNight\Kernel\Console\Controllers\DB;

use RubyNight\Migrations;
use RubyNight\Libs\Database;
use RubyNight\Kernel\Helpers\Config;
use RubyNight\Kernel\Console\ShellController;

class MigrateController extends ShellController
{
    public function exec()
    {
        $mode = 'up';
        new Database();
        try {
            $migrations = [
                [\RubyNight\Migrations\create_users_table::class, $mode],
                [\RubyNight\Migrations\create_posts_table::class, $mode]
            ];
            
            foreach($migrations as $migration)
            {
                echo "[+] Executing migration..." . strtolower(basename($migration[0])) . "\n";
                call_user_func($migration);
            }
            
            $this->getPrinter()->echo("[+] All migrations where successfully executed");

        } catch (PDOException $ex) {
             $this->getPrinter()->echo("[Error]". $ex->getMessage());
        }
    }
}