<?php
declare(strict_types = 1);

class View
{
    public function render($path){
        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/templates/menu.php';
        require_once APP . 'views/'.$path.'.php';
        require_once APP . 'views/templates/footer.php';
    }
}
