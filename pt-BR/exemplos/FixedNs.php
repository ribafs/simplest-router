<?php

namespace Core

class Router{
    // Properties definition
    private $controller = null;
    private $action = null;
    private $params = [];

    public function __construct(){
        // Store parseURL() método in local propertie $url
        $url = $this->parseURL();

        // Propereties initialization
        if ( !is_null ( $url[0] )) $this->controller = $url[0];
        if ( !empty($url[1]) ) $this->action = $url[1];
        if ( !empty ( $url )) $this->params = array_values($url);

        if ( is_null($this->controller) ) {
                $this->controller = 'App\\Controllers\\ProductController';
                $this->controller = new $this->controller;
                $this->controller->index();
        }elseif (file_exists(APP . 'Controllers/ProductController.php')) {
            $this->controller = 'App\\Controllers\\ProfuctController';
            $this->controller = new $this->controller;

            if(isset($this->action)){
                if(method_exists($this->controller, $this->action)){
                    // Run controller & method, send any params if available
                    // call_user_func_array([$this->controller, $this->action], $this->params);
                    $this->controller->{$this->action}(...$this->params);
                }else{
                    $msg ='Esta action não existe';
                    $controller = new \Core\ErrorController();
                    $controller->index($msg);
                }
            }
        }else{
            $msg = 'Este controller não existe';
            $controller = new \Core\ErrorController();
            $controller->index($msg);
        }
    }

    // Format the URL as 3 section
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
    // Adaptação de https://github.com/Izamzawi/blog-php-mvc, com ajuda do Google e StackOverflow
}

