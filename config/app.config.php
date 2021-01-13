<?php
/** 
 * Config
 * 
 * @category Framework
 * @package  RubyNight\Config;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */
define('BASE_PATH', realpath(dirname(__DIR__)));
define('VIEWS_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'resources/views/');
$dotenv = \Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();
define('APP_NAME', $_ENV['APP_NAME']);
define('VERSION', $_ENV['APP_VERSION']);