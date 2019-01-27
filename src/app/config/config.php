<?php

use Phalcon\Config;
use Phalcon\Logger;

return new Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'db',
        'username' => 'root',
        'password' => '123456',
        'dbname' => 'phonebook'
    ],
    'application' => [
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'libraryDir'     => APP_PATH . '/library/',
        'baseUri'        => '/',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ],
]);
