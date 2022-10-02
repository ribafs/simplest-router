<?php
declare(strict_types = 1);

namespace App\Controllers;
use Core\View;

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
