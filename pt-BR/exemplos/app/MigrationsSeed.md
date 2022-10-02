# Migrations e Seed

## Instalar os pacotes

composer require jzonta/faker-restaurant
composer require robmorgan/phinx

## Migrations

### Criar no raiz do aplicativo as pastas
```bash
mkdir -p db\migrations
mkdir db\seeds
```
### Configurações

php vendor/bin/phinx init

Com isso ele cria no raiz do aplicativo o arquivo de configuração

phinx.php

Devemos editar e ajustar os dados do banco.

Caso estejamos em desenvolvimento altere a seção development. Caso em produção a respectiva seção.

## Para criar uma nova migration para uma tabela

cd app

vendor/robmorgan/phinx/bin/phinx create Customers

Exemplo

vendor/robmorgan/phinx/bin/phinx create Products

Com isso ele cria um arquivo em

db/migrations

Edite o arquivo mais ou menos assim:

```php
<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Customers extends AbstractMigration
{
	// https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
    public function change(): void
    {
		$this->table('customers')
		    ->addColumn('name', 'string', ['limit' => 50])
		    ->addColumn('age', 'integer')
		    ->create();
    }
}
```

## Criar a tabela usando a migration acima

Execute o comando

php vendor/robmorgan/phinx/bin/phinx migrate -e development

Com isso ele cria a tabela products no banco configurado


## Seeds

Agora vamos popular a tabela customers com dados de teste/faker. Para isso usamos o seeds

Executar

php vendor/bin/phinx seed:create Customers

Com isso ele cria o arquivo

db/seeds/Products.php

Edite o arquivo acima e deixe assim:
```php
<?php
use Phinx\Seed\AbstractSeed;

class Customers extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'age'     => $faker->numberBetween($min = 5, $max = 150)
            ];
        }
        $this->insert('customers', $data);
    }
}
```
## Popular a tabela customers usando o seed

php vendor/bin/phinx seed:run -e development

Com o comando acima ele popula a tabela customers com 100 registros faker.


## Scripts

Para facilitar a nossa vida, evitando o trabalho repetitivo podemos criar quatro scripts usando o php-cli.

Eles obrigatoriamente desem ser executados estando no terminal e no raiz do aplicativo.
Outra alternativa é criar os arquivos não na pasta bin do aplicativo mas numa pasta que está no path. Assim poderá ser executado de qualquer pasta. Gosto de usar o /usr/local/bin

Criando na pasta bin do aplicativo:

bin/migrations_create - para criar uma nova migration para uma tabela. Após criar precisa editar o arquivo e adicionar os campos

bin/migrate_run - para executar uma migrate criando a respectiva tabela

bin/seeds_create - para criar um arquivo de seed para uma migration. Após criar deve editar o arquivo e inserir o código

bin/seed_run - para popular uma tabela com o respectivo arquivo de seed


Executar cada um do raiz com

php bin/migrations_create Products

php bin/seeds_create Products

Veja o padrão para memorizar: os arquivos com create são no plural e os com run são no singular.




