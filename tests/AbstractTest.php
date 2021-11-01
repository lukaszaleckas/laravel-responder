<?php

namespace Tests;

use Illuminate\Foundation\Testing\WithFaker;
use LaravelResponder\ResponderServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->register(ResponderServiceProvider::class);
    }
}
