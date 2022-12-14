# Simplest Router

To applications in PHPOO with MVC

## URL of thie project

[https://github.com/ribafs/simplest-router](https://github.com/ribafs/simplest-router)

### This routing system was created mainly from the software:

- https://github.com/Izamzawi/blog-php-mvc
- https://github.com/panique/mini3
- https://github.com/nikic/FastRoute

This little routing system works well with PHPOO applications with MVC

Capture the URL and split it into parts: controller, action and parameter

http://localhost/application/controller/action/param

Example

http://localhost/crud-mvc/product/edit/5

## Try with/Support

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
- Fixed
- MySQL/MariaDb
- PostgreSQL

## Demo

http://ribamar.net.br/router/

## Micro Framework

In the example **app** we have the structure of a micro framework in PHP, with MVC and routes, like those created from scratch.

## Tips

PHP 5 does not support:

declare(strict_types = 1);

Nor is the syntax:

$this->controller->{$this->action}( ...$this->params);

## Requirements

- Module mod_rewrite from Apache

## Extra Tips

## Native PHP functions and constants for classes and objects

if ( ! class_exists('App\\Controllers\\ProductController')) die('Class not found!');

die(__CLASS__);

get_class($this);

die(__NAMESPACE__);


## Licence

MIT

This means that you can freely use and modify it for personal and commercial projects, only with the credit of the authors.


