<?php

namespace App\Providers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepositoryInterface::class => UserEloquent::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
