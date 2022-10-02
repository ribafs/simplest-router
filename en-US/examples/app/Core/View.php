<?php
declare(strict_types = 1);
namespace Core;

class View
{
    // Apenas $path é obrigatório, os demais são opcionais
    public function render($path, $fetchAll='', $regs='' ){ //folder/view, ex: products/index
        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/templates/menu.php';
        require_once APP . 'views/'.$path.'.php';
        require_once APP . 'views/templates/footer.php';
    }
}
