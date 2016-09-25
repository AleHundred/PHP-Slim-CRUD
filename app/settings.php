<?php

// Settings file with database configuration info

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'debug'          => false,
        'mode'           => 'test',
        'db' => [
            // PDO database configuration
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => '',
            'username'  => '',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];
