<?php

namespace RubyNight\Kernel\Helpers;

/**
 * Config Handler class
 * 
 * @category Framework
 * @package  RubyNight\Helpers\ConfigHandler;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
class Config
{

    /**
     * Path from config file
     *
     * @var string
     */
    protected static $path;

    /** 
     * Configuration array
     * 
     * @var array|string
     */
    private static $config;

    /**
     * COnfigurations array
     *
     * @var array
     */
    private static $configs;

    /**
     * Constructor function
     */
    public function __construct()
    {
        // Set path from config file
        self::$path = realpath(__DIR__ . '../../../../config/app.php');
    }

    /**
     * Get key from config function
     *
     * @param string $key value to search
     * @param string $default default value
     * @return void
     */
    public static function get($key, $default = null)
    {
        // Check if store array is null
        if (is_null(self::$config)) {
            // Require config vars from config dir
            self::$config = include_once realpath(__DIR__ . '../../../../config/app.php');
            if (!empty(self::$config[$key])) {
                // Return key value
                return self::$config[$key];
            } else {
                // Return default
                return $default;
            }
        }
        // Return key value
        return self::$config[$key];
    }

    /**
     * Get value as array from various config keys
     *
     * @param array $keys array of keys to search
     * @param array $default array with default values
     * 
     * @return void
     */
    public static function getArrayOf(array $keys, $default = [])
    {
        foreach ($keys as $key) {
            // get value and set every key to array
            self::$configs[$key] = self::get($key);
        }
        if (!is_null(self::$configs[$key] && is_array(self::$configs))) {
            // return array of values
            return self::$configs;
        } else {
            // return array of default values
            return $default;
        }
    }

    /**
     * Get path from config key
     * Get realpath from the given key value
     * 
     * @param string $key key to search
     * @param string $default default value
     * @return void
     */
    public static function getPath($key, $default = null)
    {
        // Get value from key search
        $result = self::get($key);

        if (!is_null($result)) {
            // return path from value
            return realpath(self::get($key));
        } else {
            // return default
            return $default;
        }
    }
}