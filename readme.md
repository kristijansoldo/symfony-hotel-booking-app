# Symfony hotel booking app
Simple hotel booking app in PHP MVC framework called Symfony. :) 

## Built on
- Symfony 4.3.1
- MySQL 5.6.3
- PHP 7.1.25 - fpm

## Development

- Firstly, connect your Symfony app with DB in `.env file.

- Install dependencies:

```shell
$ composer install
```

- Start server:

```shell
$ symfony server:start
```

- Run migrations

```shell
$ php bin/console doctrine:migrations:migrate
```

- Load fixtures

```shell
$ php bin/console doctrine:fixtures:load
```


### Admin

- **Path:** `{SERVER}/admin/login`
- **Username:** `admin`
- **Password:** `admin`