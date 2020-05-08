9<?php

//
#error_reporting(E_ALL);
#ini_set('display_errors', 1);


//
set_include_path('/var/www/html');
require_once 'config.php';
$dbconfigTemp = $dbconfig;
global $dbconfig;
$dbconfig = $dbconfigTemp;

require_once 'include/database/PearDatabase.php';

//
require_once __DIR__.'/../vendor/autoload.php';4
7
