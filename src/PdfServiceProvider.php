<?php

namespace Artisan\Pdf;

class PdfServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/pdf.php', 'pdf');

        $this->app->bind(Pdf::class, function () {
            return new Manager;
        });
    }

    public function boot()
    {
    }
}
