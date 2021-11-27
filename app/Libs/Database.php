<?php

declare(strict_types=1);

namespace RubyNight\Libs;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Fragment\Kernel\Helpers\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static Capsule $capsule;

    public function __construct()
    {
        self::$capsule = new Capsule;
        self::$capsule->addConnection(
            [
                'driver' => Config::get('DB_DRIVER'),
                'host'      => Config::get('DB_HOST'),
                'database'  => Config::get('DB_NAME'),
                'username'  => Config::get('DB_USER'),
                'password'  => Config::get('DB_PASS'),
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]
        );

        self::$capsule->setEventDispatcher(new Dispatcher(new Container));
        self::$capsule->setAsGlobal();
        self::$capsule->bootEloquent();
    }
}