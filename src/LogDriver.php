<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\Log;

class LogDriver implements DriverInterface
{
    protected $content = '';

    public function html($html)
    {
        $this->content = $html;

        return $this;
    }

    public function stream()
    {
        Log::info($this->content);

        return $this->content;
    }
}
