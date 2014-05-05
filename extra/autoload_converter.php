#!/usr/bin/env php
<?php

$config = include __DIR__ . "/../config/config.php";

$psr0 = $config->application->composerDir . 'composer/autoload_namespaces.php';
$psr4 = $config->application->composerDir . 'composer/autoload_psr4.php';

$namespaces = array();

$map = array_merge(require($psr0), require($psr4));

foreach ($map as $key => $value) {
    $key = trim($key, '\\');
    $dir = '/' . str_replace('\\', '/', $key) . '/';
    $namespaces[$key] = implode($dir . ';', $value) . $dir;
}

$dest = $config->application->composerDir . 'composer/autoload_namespaces.php';
$fp = fopen($dest, 'w');

fwrite($fp, "<?php\nreturn array(\n");
foreach ($namespaces as $key => $value) {
    fwrite($fp, "    '$key' => '$value',\n");
}
fwrite($fp, ");\n");

fclose($fp);
