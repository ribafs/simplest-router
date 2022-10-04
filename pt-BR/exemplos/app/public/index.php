<?php
// FrontController, única entrada para o aplicativo

if(!file_exists('../vendor')) {
    die ('<h3 align="center">Please run:<br>composer install</h3>');
}

define('DS', DIRECTORY_SEPARATOR);

// Capture the full path of the application. DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DS);

// Capture the project folder: path full plus src, like '/var/www/html/mini-mvc/App'.
define('APP', ROOT . 'App' . DS);
define('CORE', ROOT . 'Core' . DS);
define('URL_PUBLIC_FOLDER', 'public'); // public
define('URL_PROTOCOL', '//'); // //
define('URL_DOMAIN', $_SERVER['HTTP_HOST']); // localhost
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));// Root application - /appfolder
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);// /localhost/appfolder/

// This is the auto-loader for the Composer dependencies (to update the namespace in your project run: composer dumpautoload).
require_once ROOT . 'vendor/autoload.php';

require_once ROOT . 'config.php';

// Load Router class
use Core\Router;

// Launch the application through the Router
new Router();
