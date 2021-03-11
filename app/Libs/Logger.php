<?php


namespace RubyNight\Libs;

use Monolog\ErrorHandler;

use Monolog\Handler\StreamHandler;
use RubyNight\Kernel\Helpers\ConfigHandler as Config;

/**
 * Logger class
 * 
 * @category Framework
 * @package  RubyNight\Libs\Logger;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Logger extends \Monolog\Logger
{
    private static $_loggers = [];

    /**
     * Constructor function
     *
     * @param string $key    logger key
     * @param array  $config logger configuration
     */
    public function __construct($key = "app", $config = null)
    {
        // from parent construct key
        parent::__construct($key);

        // check is configuration is empty
        if (empty($config)) {
            // get logs path from configuration
            $LOGS_PATH = Config::get('LOGS_PATH');
            // set file from path and key and level to debug
            $config = [
                'file' => "$LOGS_PATH/{$key}.log",
                'level' => \Monolog\Logger::DEBUG
            ];
        }

        // push StreamHandler with file and level config
        $this->pushHandler(new StreamHandler($config['file'], $config['level']));
    }

    /**
     * Get Instance function
     *
     * @param string $key    logger key
     * @param array  $config logger configuration
     * 
     * @return void
     */
    public static function get($key = "app", $config = null)
    {
        if (empty(self::$_loggers[$key])) {
            self::$_loggers[$key] = new Logger($key, $config);
        }

        return self::$_loggers[$key];
    }

    /**
     * Enable System Logs function
     *
     * @return void
     */
    public static function enableSysLogs()
    {
        $LOGS_PATH = Config::get('LOGS_PATH');

        // Errors log

        //create new logger
        self::$_loggers['error'] = new Logger('errors');

        // push StreamHandler to logs path as errors
        self::$_loggers['error']->pushHandler(new StreamHandler("{$LOGS_PATH}/errors.log"));

        // Request log
        $request = [
            $_SERVER,
            $_REQUEST,
            trim(file_get_contents("php://input"))
        ];

        //create new logger
        self::$_loggers['request'] = new Logger('request');
        // push StreamHandler to logs path as request
        self::$_loggers['request']->pushHandler(new StreamHandler("{$LOGS_PATH}/request.log"));
        // put logger info from request
        self::$_loggers['request']->info("REQUEST", $request);
    }
}