// app/Providers/CustomExceptionServiceProvider.php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Renderer\Exception;

class CustomExceptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Override exception renderer
        $this->loadViewsFrom(resource_path('views/exceptions'), 'laravel-exceptions-renderer');
    }
}