<?php

namespace App\Providers;

use App\Repositories\Todo\EloquentTodo;
use App\Repositories\Todo\TodoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TodoRepository::class,EloquentTodo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
