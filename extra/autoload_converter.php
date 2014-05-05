#!/usr/bin/env php
<?php

$config = include __DIR__ . "/../config/config.php";

$target = $config->application->composerDir . 'composer/autoload_namespaces.php';

$namespaces = array();

$map = require($target);

foreach ($map as $key => $value) {
    $key = trim($key, '\\');
    $dir = '/' . str_replace('\\', '/', $key) . '/';
    $namespaces[$key] = implode($dir . ';', $value) . $dir;
}

$fp = fopen($target, 'w');

fwrite($fp, "<?php\nreturn array(\n");
foreach ($namespaces as $key => $value) {
    fwrite($fp, "    '$key' => '$value',\n");
}
fwrite($fp, ");\n");

fclose($fp);
