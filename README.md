## Ice Cream Manager

"Ice Cream Manager" é um sistema de gerenciamento de empréstimo de carrinhos de sorvete, sendo desenvolvido na disciplina de Backend do curso de Sistemas para Internet na UTFPR Câmpus Guarapuava.

### Dependências

- Docker
- Docker Compose

### Para rodar

#### Clone o repositório

```
$ git clone git@github.com:ederzin13/ice-cream-manager.git
$ cd ice-cream-manager
```

#### Defina as variáveis env

```
$ cp .env.example .env
```

#### Instalar as dependências

```
$ ./run composer install
```

#### Subir os containers

```
$ docker compose up -d
```

ou

```
$ ./run up -d
```

#### Criar o banco de dados e as tabelas

```
$ ./run db:reset
```

#### Popular o banco de dados

```
$ ./run db:populate
```

### Corrigir permissão da pasta uploads

```
sudo chown www-data:www-data public/assets/uploads
```

#### Rodar os testes

```
$ docker compose run --rm php ./vendor/bin/phpunit tests --color
```

ou

```
$ ./run test
```

#### Rodar os linters

[PHPCS](https://github.com/PHPCSStandards/PHP_CodeSniffer/)

```
$ ./run phpcs
```

[PHPStan](https://phpstan.org/)

```
$ ./run phpstan
```

Acesso [localhost](http://localhost)

### Teste de API

#### Rota não autenticada

```shell
curl -H "Accept: application/json" localhost/problems
```

#### Rota autenticada

Neste caso precisa alterar o valor do PHPSESSID de acordo com a o id da sua sessão.

```shell
curl -H "Accept: application/json" -b "PHPSESSID=5f55f364a48d87fb7ef9f18425a8ae88" localhost/problems
```
