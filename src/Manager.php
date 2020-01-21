<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\Config;

class Manager
{
    protected $drivers = [];

    public function driver($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->makeDriver($name);
    }

    protected function makeDriver($name)
    {
        switch($name) {
            case 'log':
                return new LogDriver;
            case 'snappy':
                return new SnappyDriver;
            case 'compose':
                return new ComposeDriver;
        }
    }

    public function extend($name, $resolver = null)
    {
        $this->drivers[$name] = $resolver;
    }

    public function getDefaultDriver()
    {
        return Config::get('pdf.default');
    }

    public function __call($method, array $parameters = [])
    {
        return $this->driver()->{$method}(...$parameters);
    }
}
