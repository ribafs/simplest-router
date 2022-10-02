<?php

define('URL_PUBLIC_FOLDER', 'public'); // public
define('URL_PROTOCOL', '//'); // //
define('URL_DOMAIN', $_SERVER['HTTP_HOST']); // localhost
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));// Root application - /appfolder
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);// /localhost/appfolder/
define('APP_TITTLE', 'Aplicativo usando o Simplest Router');
define('DEFAULT_CONTROLLER', 'customer');
define('DEBUG', true);

define('DB_TYPE', 'mysql'); // mysql or pgsql
define('DB_HOST', '127.0.0.1');
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


