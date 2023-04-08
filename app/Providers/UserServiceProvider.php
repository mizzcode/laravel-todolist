<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public array $singletons = [
        UserService::class => UserService::class
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
