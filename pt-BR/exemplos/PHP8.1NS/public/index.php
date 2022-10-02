<?php
// FrontController, unique entry to the app

if(!file_exists('../vendor')) {
    die ('<h3 align="center">Run:<br><br>composer du</h3>');
}

require_once '../Core/CONSTANTS.php';

// Load application settings (error reporting etc.)
require_once ROOT . 'config.php';

// This is the auto-loader for the Composer dependencies (to update the namespace in your project run: composer dumpautoload).
require_once ROOT . 'vendor/autoload.php';

// Load Router class
use Core\Router;

// Launch the application through the Router
new Router();

