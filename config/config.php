<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'root',
        'password'   => '',
        'dbname'     => 'test',
    ),
    'application' => array(
        'baseUri'     => '/',
        'composerDir' => dirname(__DIR__) . '/vendor/',
        'logFile'     => dirname(__DIR__) . '/log/app.log',
    )
));
