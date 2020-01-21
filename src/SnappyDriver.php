<?php

namespace Artisan\Pdf;

use Barryvdh\Snappy\Facades\SnappyPdf;

class SnappyDriver implements DriverInterface
{
    protected $content;

    protected $data;

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
        return SnappyPdf::loadHTML($this->content)->stream();
    }
}
