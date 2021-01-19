<?php

/** 
 * Application Configuration Keys
 * 
 * @category Framework
 * @package  RubyNight\Config;
 * @author   Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @license  MIT https://github.com/DevKhris/rubynight/blob/main/LICENSE
 * @link     Repository https://github.com/DevKhris/rubynight
 */

$PATH = realpath(dirname(__DIR__));
$dotenv = \Dotenv\Dotenv::createImmutable($PATH);
$dotenv->load();

return $config = [
    'BASE_PATH' => $PATH,
    'VIEWS_PATH' => realpath('resources/views/'),
    'LOGS_PATH' => realpath('logs'),
    'APP_NAME' => $_ENV['APP_NAME'],
    'APP_VERSION' => $_ENV['APP_VERSION'],

];
