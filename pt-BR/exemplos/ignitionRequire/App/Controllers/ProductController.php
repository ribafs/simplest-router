<?php
declare(strict_types = 1);

require_once CORE . 'View.php';

class ProductController
{
    public function index()
    {
        $view = new View();
        $view->render('products/index');
    }

    public function create()
    {
        $view = new View();
        $view->render('products/create');
    }

}
