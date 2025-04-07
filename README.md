# Calculator APP

## Description

Backend for calculator app using Laravel

## Assumptions / Product decisions

1. Assuming that app is public and no authentication was implemented


## TODOs

Things to improve
1. Implement better validation
2. For simplicity, all fees are stored as class properties. In production, it should be replaced with a persistent database or config files.
3. Better error and exception handling. E.g. register exception handler to handle all exceptions in one place.
4. Needs more tests and code coverage. Only a few tests are implemented.
5. Add logging to track user actions and errors.


## Project Setup

```sh
composer install
```

### Compile and Hot-Reload for Development

```sh
php artisan serve
```

### Run Unit Tests

```sh
./vendor/bin/phpunit
```

