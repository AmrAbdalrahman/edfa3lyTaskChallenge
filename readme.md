This task was build using [lumen](https://lumen.laravel.com/docs/5.8) 5.8 (laravel micro framework)
# Steps to run The project

- git clone of the master branch
- run composer install
- renaming .env.example to .env which contains json catalog file path at key(Catalog_FILE_PATH)
- run composer dump-autoload
- run php -S localhost:8000
- you can find json file at \storage\json\catalog.json.

# Endpoints

- user checkout (http://localhost:8000/api/order/checkout)

# Testing

- for windows run vendor\bin\phpunit
- for mac run vendor/bin/phpunit

# Notes
- for API [documentation](https://documenter.getpostman.com/view/5140236/TVYAi2b8) that contains examples for success and failures endpoints
- I assume that 1$ equal 16 EGP at this time


# License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
