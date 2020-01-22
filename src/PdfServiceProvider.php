<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\App;

class PdfServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-pdf.php', 'laravel-pdf');

        $this->app->bind(Pdf::class, function () {
            return new Manager;
        });
    }

    public function boot()
    {
        $configPath = __DIR__ . '/../config/laravel-pdf.php';

        $this->publishes([
            $configPath => App::configPath('semaphore.php')
        ], 'laravel-pdf-config');
    }
}
