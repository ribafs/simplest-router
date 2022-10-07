<?php

if (isset($_GET['url'])) {
    // split URL
    $url = trim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
}

$controller = isset($url[0]) ? $url[0] : null;

$action = isset($url[1]) ? $url[1] : '';
$param = isset($url[2]) ? $url[2] : 0; // Criando a $this->urlParams com array_values($url)
$param = (array)$param; // Convertendo em array para ser usado na linha do ...$param

if ($controller == 'product'){
    // index é o action default, assumido caso não seja digitado nenhum
    if(strlen($action) == 0){
        $controller = new \App\Controllers\ProductController();
        $controller->index();
    }elseif($action == 'index' || $action == 'create' || $action == ''){
        $controller = new \App\Controllers\ProductController();
        $controller->$action();
    } elseif($action == 'edit' || $action == 'delete') {
        $controller = new \App\Controllers\ProductController();
//          call_user_func_array(array($controller, $action), $param);
        $controller->{$action}(...$param);
    } else {
        $msg ='Esta action não existe';
        $controller = new \Core\ErrorController();
        $controller->index($msg);
    }
}elseif(is_null($controller)){
        $controller = new \App\Controllers\ProductController();
        $controller->index();
}else{
    $msg = 'Este controller não existe';
    $controller = new \Core\ErrorController();
    $controller->index($msg);
}
