<?php
// FrontController, única entrada para o aplicativo

require_once '../Core/CONSTANTS.php';

// composer require spatie/ignition
require_once '../vendor/autoload.php';

require_once ROOT . 'config.php';

require_once CORE . 'Router.php';

new Router;

