<?php

use Phalcon\Config;

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'db',
        'username' => 'root',
        'password' => '123456',
        'dbname' => 'phonebook'
    ],
    'redis' => [
        'host' => 'redis',
    ],
    'logger' => [
        'path' => '/var/log/phonebook/error_requests.log',
    ],
    'application' => [
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'libraryDir'     => APP_PATH . '/library/',
        'baseUri'        => '/',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ],
]);
