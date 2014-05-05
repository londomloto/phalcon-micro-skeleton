<?php

$composerDir = $config->application->composerDir . 'composer/';

/**
 * We're a registering a set of 3rd party libraries from composer.
 */
$loader = new \Phalcon\Loader();

// register namespaces
$loader->registerNamespaces(
    require($composerDir . 'autoload_namespaces.php')
);

// register classes
$loader->registerClasses(
    require($composerDir . 'autoload_classmap.php')
);
