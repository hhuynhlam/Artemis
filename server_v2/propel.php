<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'aphio' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=aphio',
                    'user'       => 'aphio',
                    'password'   => 'Horton1925',
                    'attributes' => [],
                    'settings'  => [
                        'charset' => 'utf8',
                        'queries' => [
                            'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci'
                        ]
                    ]
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'aphio',
            'connections' => ['aphio']
        ],
        'generator' => [
            'defaultConnection' => 'aphio',
            'connections' => ['aphio']
        ]
    ]
];

?>