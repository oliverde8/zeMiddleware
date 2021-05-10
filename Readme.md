# Ze Middleware

This is a project initiator to create a middleware. It comes preinstalled with;

- EasyAdmin
- FOS User Bundle (to be installed yet)
- Comfy Configuration  Bundle 
- PHP Etl Bundle

## Installation

```sh
composer install

./bin/console doctrine:migrations:migrate
./bin/console doctrine:fixtures:load
./bin/console assets:install
```

Work in progress.
