<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../config/loader.php";
    $loader->register();

    /**
     * Read services
     */
    include __DIR__ . "/../config/services.php";

    /**
     * Starting the application
    */
    $app = new \Phalcon\Mvc\Micro();

    /**
     * Assign service locator to the application
     */
    $app->setDi($di);

    /**
     * Incude Application
     */
    include dirname(__DIR__) . '/config/app.php';

    /**
     * Handle the request
     */
    $app->handle();

} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
