<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\Facade;

class Pdf extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Pdf::class;
    }
}
