<?php

class Router
{
    // Properties definition
    private $controller = null;
    private $action = null;
    private $params = [];

    public function __construct() 
    {
        // Store parseURL() method in local propertie $url
        $url = $this->parseURL();

        // Propereties initialization
        if ( !empty ( $url[0] )) $this->controller = $url[0];
        if ( !empty ( $url[1])) $this->action = $url[1];
        if ( !empty ( $url )) $this->params = array_values ( $url );

        if ( is_null ( $this->controller ) ) {
                require_once APP . 'Controllers/' . ucfirst ( DEFAULT_CONTROLLER ) . 'Controller.php';
                $this->controller = ucfirst ( DEFAULT_CONTROLLER ) . 'Controller';
                $this->controller = new $this->controller;
                $this->controller->index();
        } elseif ( file_exists(APP . 'Controllers/' . ucfirst ( $this->controller ) . 'Controller.php')) {
            require_once APP . 'Controllers/' . ucfirst ( $this->controller ) . 'Controller.php';
            $this->controller = ucfirst ( $this->controller ) . 'Controller';
            $this->controller = new $this->controller;

            if ( isset ( $this->action )) {
                if ( method_exists ( $this->controller, $this->action )) {
                    // Run controller & method, send any params if available
                    // call_user_func_array ( [$this->controller, $this->action ], $this->params );
                    $this->controller->{$this->action}( ...$this->params );
                } else {
                    require_once CORE . 'ErrorController.php';
                    $msg ='Action not found';
                    $controller = new ErrorController();
                    $controller->index ( $msg );
                }
            }
        } else {
            require_once CORE . 'ErrorController.php';
            $msg = 'Controller not found';
            $controller = new ErrorController();
            $controller->index ( $msg );

        }

    }

    // Format the URL as 3 section
    public function parseURL()
    {
        if ( isset ( $_GET['url'] )) {
            $url = rtrim ( $_GET['url'], '/' );
            $url = filter_var ( $url, FILTER_SANITIZE_URL );
            $url = explode ( '/', $url );

            return $url;
        }
    }
    // Adapted from https://github.com/Izamzawi/blog-php-mvc, with the help of Google and StackOverflow
}

