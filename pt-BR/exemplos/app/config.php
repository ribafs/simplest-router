<?php

define('APP_TITTLE', 'Application using Simplest Router');
define('DEFAULT_CONTROLLER', 'customer');
define('DEBUG', true);

define('DB_TYPE', 'mysql'); // mysql or pgsql
define('DB_HOST', 'localhost');
define('DB_NAME', 'router');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', '3306');// 3306 or 5432
define('DB_CHARSET', 'utf8mb4');

use Spatie\Ignition\Ignition;

if ( DEBUG == true ) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    Ignition::make()->register();

    \Spatie\Ignition\Ignition::make()
        ->useDarkMode()
        ->register();

//    throw new Exception('Testando');
}else{
    error_reporting(0);
    ini_set('display_errors', 0);

    \Spatie\Ignition\Ignition::make()
        ->shouldDisplayException($inLocalEnvironment)
        ->register();
}


