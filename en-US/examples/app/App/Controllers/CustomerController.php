<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Customer;
use Core\View;

class CustomerController
{
    public function index()
    {
        $Customer = new Customer('customers');
        $fetchAll = $Customer->index();

        $view = new View();
        $view->render('customers/index', $fetchAll);
    }
    
    public function create()
    {
        $Customer = new Customer('customers');

        if (isset($_POST['submit_create_customer'])) {
            $Customer->create($_POST['name'], $_POST['age']);
	        header('location: ' . URL . 'customer/index');	
        }

        $view = new View();
        $view->render('customers/create');
    }

    public function edit($field_id)
    {
        if (isset($field_id)) {
            $Customer = new Customer('customers');
            $regs = $Customer->fetch($field_id);

            if ($regs === false) {
                $msg='Register not found!';
                $error = new \Core\ErrorController();
                $error->index($msg);
            } else {
                $view = new View();
                $view->render('customers/edit', '', $regs);
            }
        } else {
            header('location: ' . URL . 'customer/index');
        }
    }
    // Note that render needs the table name in the plural and the location needs the table name in the singular

    public function update()
    {
        if (isset($_POST['submit_update_customer'])) {
          $Customer = new Customer('customers');
          $Customer->update($_POST['name'], $_POST['age'], $_POST['field_id']);
        }
        header('location: ' . URL . 'customer/index');
    }

    public function delete($field_id)
    {
        if (isset($field_id)) {
            $Customer = new Customer('customers');
            $Customer->delete($field_id);
        }
        header('location: ' . URL . 'customer/index');
    }
    
    public function search()
    {
        if (isset($_GET["submit_search_customer"])) {
            $Customer = new Customer('customers');
            $regs = $Customer->search($_GET['keyword']);

            $view = new View();
            $view->render('customers/search', '', $regs);
        }

        header('location: ' . URL . 'customer/index');
    }    
}
