# Laravel Responder

Simple package used to process responses before returning them to client.

## Installation

1. Run `composer require lukaszaleckas/laravel-responder`
2. Publish `responder.php` config: `php artisan vendor:publish --tag=laravel-responder`

## Usage

Just inject `LaravelResponder\Responder` and call `buildResponse` method.

Additional processors can be registered in `responder.php` config file.