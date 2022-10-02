<?php
declare(strict_types = 1);

class ErrorController
{
    public function index($msg='Este registro não inexiste!')
    {
        // load views
        require APP . 'views/templates/header.php';
        require APP . 'views/error/index.php';
        require APP . 'views/templates/footer.php';
    }
}

