<?php

require_once('core/app/ClassLoader.php');

$loader = new ClassLoader();
$loader->registerDir(dirname(__FILE__) . '/core/app');
$loader->registerDir(dirname(__FILE__) . '/core/http');
$loader->registerDir(dirname(__FILE__) . '/core/database');
$loader->registerDir(dirname(__FILE__) . '/core/exception');
$loader->registerDir(dirname(__FILE__) . '/model');
$loader->register();
