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

return [
    'BASE_PATH' => $PATH,
    'VIEWS_PATH' => $PATH . '/resources/views/',
    'MIGRATIONS_PATH' => $PATH . '/schema/Migrations/',
    'LOGS_PATH' => $PATH . '/logs/',
    'APP_NAME' => $_ENV['APP_NAME'],
    'APP_VERSION' => $_ENV['APP_VERSION'],
    'APP_DEBUG' => $_ENV['APP_DEBUG'],
    'DB_DRIVER' => $_ENV['DB_DRIVER'],
    'DB_HOST' => $_ENV['DB_HOST'],
    'DB_NAME' => $_ENV['DB_NAME'],
    'DB_USER' => $_ENV['DB_USER'],
    'DB_PASS' => $_ENV['DB_PASS'],
];