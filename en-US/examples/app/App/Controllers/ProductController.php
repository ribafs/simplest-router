<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class ProductController
{
    public function index()
    {
        $Product = new Product('products');
        $fetchAll = $Product->index();

        $view = new View();
        $view->render('products/index', $fetchAll);
    }
    
    public function create()
    {
        $Product = new Product('products');

        if (isset($_POST['submit_create_product'])) {
            $Product->create($_POST['name'], $_POST['price']);
	        header('location: ' . URL . 'product/index');	
        }

        $view = new View();
        $view->render('products/create');
    }

    public function edit($field_id)
    {
        if (isset($field_id)) {
            $Product = new Product('products');
            $regs = $Product->fetch($field_id);

            if ($regs === false) {
                $msg='Este registro não inexiste!';
                $error = new \Core\ErrorController();
                $error->index($msg);
            } else {
                $view = new View();
                $view->render('products/edit', '', $regs);
            }
        } else {
            header('location: ' . URL . 'product/index');
        }
    }
    // Observe que o render precisa do nome da tabela no plural e o location o nome da tabela no singular

    public function update()
    {
        if (isset($_POST['submit_update_product'])) {
          $Product = new Product('products');
          $Product->update($_POST['name'], $_POST['price'], $_POST['field_id']);
        }
        header('location: ' . URL . 'product/index');
    }

    public function delete($field_id)
    {
        if (isset($field_id)) {
            $Product = new Product('products');
            $Product->delete($field_id);
        }
        header('location: ' . URL . 'product/index');
    }
    
    public function search()
    {
        if (isset($_GET["submit_search_product"])) {
            $Product = new Product('products');
            $regs = $Product->search($_GET['keyword']);

            $view = new View();
            $view->render('products/search', '', $regs);
        }

        header('location: ' . URL . 'product/index');
    }    
}
