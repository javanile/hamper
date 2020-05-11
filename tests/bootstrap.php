<?php

//
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

//
set_include_path('/var/www/html');

require_once 'config.php';
set_global_var('dbconfig', $dbconfig);

require_once 'include/database/PearDatabase.php';
set_global_var('log', $log);

require_once 'include/utils/utils.php';

require_once __DIR__.'/../vendor/autoload.php';
