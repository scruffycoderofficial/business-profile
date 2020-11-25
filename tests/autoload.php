<?php

define(
    'MODULE_NAMESPACE', 
    'DigitalClosuxe\\Business\\Extension\\Eloquent\\Models\\'
);

require_once __DIR__ . '/../vendor/autoload.php';

//instatiate a new ClassLoader instance
$loader = new \Composer\Autoload\ClassLoader();

// register classes with namespaces
$loader->addPsr4(MODULE_NAMESPACE, __DIR__ . '/fixtures/extensions/eloquent/models');

// activate the autoloader
$loader->register();