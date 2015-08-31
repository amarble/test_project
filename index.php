<?php

ini_set('error_reporting', E_ALL);

session_start();

$conf = dirname(__FILE__) . '/conf/conf.php';

require('core/Application.php');

spl_autoload_register(array('testProject', 'autoload'));

testProject::create($conf)->run();
