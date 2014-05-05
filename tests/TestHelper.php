<?php

use \Phalcon\DI;
use \Phalcon\DI\FactoryDefault;

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);

set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

// load config
$config = include __DIR__ . "/../config/config.php";

// use the application autoloader to autoload the classes
// autoload the dependencies found in composer
include __DIR__ . "/../config/loader.php";
$loader->registerDirs(array(
    ROOT_PATH
));
$loader->register();

$di = new FactoryDefault();
DI::reset();

// add any needed services to the DI here

DI::setDefault($di);
