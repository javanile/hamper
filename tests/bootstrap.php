<?php

//
#error_reporting(E_ALL);
#ini_set('display_errors', 1);

//
require_once __DIR__.'/../vendor/autoload.php';

//
set_include_path('/var/www/html');
require_once 'vtlib/Vtiger/Cron.php';
require_once __DIR__.'/config.inc.php';
require_once 'modules/Emails/mail.php';
require_once 'includes/Loader.php';
