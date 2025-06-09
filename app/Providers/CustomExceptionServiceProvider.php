<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use App\Exceptions\Handler;

class CustomExceptionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Register custom exception handler if needed
        // $this->app->singleton(ExceptionHandler::class, Handler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load custom exception views
        $this->loadViewsFrom(resource_path('views/exceptions'), 'exceptions');
        
        // Publish views if needed
        $this->publishes([
            resource_path('views/exceptions') => resource_path('views/vendor/exceptions'),
        ], 'exception-views');
    }
}