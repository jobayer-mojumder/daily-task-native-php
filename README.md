
# Daily task management with Laravel and Native php

This project is ideal for those looking to understand the integration of native PHP within a Laravel project, as well as for anyone needing a straightforward task management tool as a desktop application.

## Installation
Clone the repository locally
```bash
git clone https://github.com/jobayer-mojumder/daily-task-native-php.git
cd daily-task-native-php
```
Install PHP dependencies
```bash
composer install
```
Install node packages
```bash
npm install
```
Set up your environment variables. Copy the .env.example file to .env and update the environment settings to reflect your local configuration
```bash
cp .env.example .env
```
Generate an application key
```bash
php artisan key:generate
```
Run database migrations. You can completely refresh your app database using the native:migrate:fresh command:
```bash
php artisan native:migrate:fresh
```
Run the application
```bash
php artisan native:serve
```

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
