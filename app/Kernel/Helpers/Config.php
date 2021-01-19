<?php

namespace RubyNight\Kernel\Helpers;

/**
 * Config Helper class
 */
class Config
{
    /* 
     * @var $config Configuration array
     */
    private static $_config;

    /**
     * Get config helper function
     *
     * @param string $key     key to search in config array
     * @param string $default default value
     * 
     * @return void
     */
    public static function get($key, $default = null)
    {
        // check is config array is null
        if (is_null(self::$_config)) {
            // set _config array from config file
            self::$_config = include_once realpath(__DIR__ . '/../../../config/app.php');
            // check is keys exists and return value
            if (!empty(self::$_config[$key])) {
                return self::$_config[$key];
            } else {
                //returns default null
                return $default;
            }
        }
    }
}
