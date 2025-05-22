# Martyn Generator

This repository contains the application which is responsible for:
- Managing subscriptions and transactions
- Allowing users to interface with the Node API, which generates the theme
- Interfacing with WordPress Sandbox, to deploy the theme for preview
- Interfacing with GitHub, to create the theme as a repository


## Environment setup

> [!TIP]
> For NIX based systems, it is recommended to use Laravel Valet for local development. On a Windows system, you can use the built-in `php artisan serve` command to run the application locally.

1. Clone the repository into your parked Valet directory, or into a directory of your choice if you're using windows. 
2. Run `composer install` to install the dependencies.
3. Run `npm install` to install the frontend dependencies.
4. Run `npm run build` to build the frontend assets.

### Database setup
1. Create a new database in your local environment.
2. Copy the `.env.example` file to `.env` and update the database connection details.
3. Run `php artisan migrate` to create the necessary tables in the database.
4. Run `php artisan db:seed` to seed the database with the necessary data.

### Development
The application uses larastan for static analysis, and Pest for testing. Upon deployment, the application will run the following commands:


#### Larastan & static analysis
We use Larastan to provide static analysis for our codebase. To run Larastan, you can use the following command:

```bash
./vendor/bin/phpstan analyse -l 6 app
```

Stan will alert you to dynamic properties from models. We use `barryvdh/laravel-ide-helper` to generate type docs for models, as well as ide helper files:

```php
php artisan ide-helper:generate
```

```php
php artisan ide-helper:models -RW
```


#### Pest & testing
We use Pest for testing our codebase. To run Pest, you can use the following command:
```bash
./vendor/bin/pest
```

This codebase is test-first. No feature will be released without test coverage. You can ensure component test coverage by running the following command:

```bash
./vendor/bin/pest --coverage
```
