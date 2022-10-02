# Simplest Router

Para aplicativos em PHPOO com MVC

## URL deste projeto

[https://github.com/ribafs/simplest-router](https://github.com/ribafs/simplest-router)

Caso tenha chegado aqui pela Gitihub page, clique no link abaixo para acessar o repositório

[https://github.com/ribafs/simplest-router/pt-BR](https://github.com/ribafs/simplest-router/pt-BR)

## Este bem simples, amigável e eficiente sistema de rotas foi criado partindo principalmente dos softwares:

- https://github.com/Izamzawi/blog-php-mvc
- https://github.com/panique/mini3
- https://github.com/nikic/FastRoute

Captura a URL e a divide nas parates: controller, action e parameters

http://localhost/aplicativo/controller/action/params

Exemple

http://localhost/crud-mvc/product/edit/5

## Testado com/Suporte

- Windows 10
    - Laragon - PHP 8.1
- Linux Mint 21
    - PHP 8.1
- Ubuntu
    - 22.04 - PHP 8.1
    - 20.04 - PHP 7.4
    - 14.04 - PHP 5.5
- Namespace
- Require
- Fixo
- MySQL/MariaDb
- PostgreSQL

## Lembre que PHP 5 não suporta

declare(strict_types = 1);

Nem também a sintaxe:

$this->controller->{$this->action}( ...$this->params);

## Requisitos

- Module mod_rewrite from Apache

- A respectiva versão do PHP: 5.5, 7.4 ou 8.1

## Dicas Extras 

## Funções  e constantes nativas do PHP para classes e objetos

if ( ! class_exists('App\\Controllers\\ProductController')) die('Class not found!');

die(__CLASS__);

get_class($this);

die(__NAMESPACE__);


## Licença

Este projeto está sob a licença MIT.

Isto significa que você pode usar e modificar ele livremente para projetos pessoais e comerciais, apenas preservando o crédito dos autores.


