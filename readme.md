# Laravel PDF

Laravel PDF is a factory for different PDF packages. Here are the drivers supported as of now:
- Log
- Laravel Snappy
- Compose (To be released)

## Installation and Usage
```
composer require artisan/laravel-pdf
```

This uses package discovery, but if you've disabled package discovery, make sure to add the provider
to your `config/app.php`.

```php
'providers' => [
    Artisan\Pdf\PdfServiceProvider::class,
],
```

### Log Driver
The log driver passes in all of the execution commands to the log files with the parameters necessary
to render the document.

This is a pretty good stand in if you'd rather not mock your commands for this or you're working offline.

### Snappy Driver
To use the Snappy driver, the `barryvdh/laravel-snappy` package is required.

```php
composer require barryvdh/laravel-snappy
```

### Compose Driver
Compose is an API for building PDFs so projects don't really need any overhead for setting it all up.

To use the Compose driver, the `symfony/http-client` package is required.

```php
composer require symfony/http-client
```

## Extending the driver

```php
Pdf::extend('customdriver', function ($app) {
  return new CustomerDriver;
});
```

## Mocking
To mock this in your testing, you can use the facade helpers, or use mockery in your tests.

### Facades

```php
use Artisan\Pdf\Pdf;

Pdf::shouldReceive('html->stream')->once()->andReturn('Some content for the PDF.');
```

### Mockery

```php
use Artisan\Pdf\Manager as PdfManager;
use Artisan\Pdf\Pdf;

$pdf = Mockery::mock(PdfManager::class);
$pdf->shouldReceive('html->stream')->once()->andReturn('Some content for the PDF.');

$this->instance(Pdf::class, $pdf);
```