<?php 
declare(strict_types = 1);

namespace Core;

class Router
{
    protected $controller = DEFAULT_CONTROLLER;
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Take first section of URL as controller
        if ( !isset ( $url[0] )) {
            $url[0] = $this->controller;
        }

        if ( file_exists( APP . 'Controllers/' . ucfirst($url[0]) . 'Controller.php' )) {
            $this->controller = $url[0];
            unset ( $url[0] );

            // Load the accessed controller
            $this->controller = 'App\\Controllers\\' . ucfirst ( $this->controller ) . 'Controller';
            $this->controller = new $this->controller;

            // Take second section of URL as method
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->action = $url[1];
                    unset($url[1]);
                } else {
                    $msg ='Action not found';
                    $controller = new \Core\ErrorController();
                    $controller->index ( $msg );
                    exit;
                }
            }

            // Get any params sent on URL, 3rd section of URL and later
            if(!empty($url)){
                $this->params = array_values($url);
            }

            // Run controller & method, send any params if available
            // call_user_func_array([$this->controller, $this->action], $this->params);
            $this->controller->{$this->action}( ...$this->params); // Para a versão 5 do PHP comente esta linha e descomente a anterior
        } else {
            $msg = 'Controller not found';
            $controller = new \Core\ErrorController();
            $controller->index ( $msg );
        }   
    }

    // Format the URL as 3 section
    public function parseURL(){
        if ( isset ( $_GET['url'] )) {
            $url = rtrim ( $_GET['url'], '/' );
            $url = filter_var ( $url, FILTER_SANITIZE_URL );
            $url = explode ( '/', $url );
            
            return $url;
        }
    }  
}

