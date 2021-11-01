<?php

namespace LaravelResponder;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ResponderServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes(
            [__DIR__ . '/../config/responder.php' => config_path('responder.php')],
            'laravel-responder'
        );
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            Responder::class,
            fn(Application $app) => new Responder(
                ...array_map(
                    fn(string $class) => $app->make($class),
                    config('responder.processors')
                )
            )
        );
    }

    /**
     * @return string[]
     */
    public function provides(): array
    {
        return [
            Responder::class
        ];
    }
}
