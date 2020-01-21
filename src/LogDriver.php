<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\Log;

class LogDriver implements DriverInterface
{
    protected $content = '';

    protected $data = [];

    public function html($html)
    {
        $this->content = $html;

        return $this;
    }

    public function data($data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function stream()
    {
        Log::info($this->content);

        return $this->content;
    }
}
