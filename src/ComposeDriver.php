<?php

namespace Artisan\Pdf;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpClient\HttpClient;

class ComposeDriver implements DriverInterface
{
    protected $layout;

    protected $data = [];

    public function html($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    public function data($data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function stream()
    {
        $client = HttpClient::create([
            'base_uri' => Config::get('laravel-pdf.drivers.compose.url'),
            'headers' => [
                'X-Compose-Project-Token' => Config::get('laravel-pdf.drivers.compose.token'),
            ],
        ]);

        $response = $client->request('GET', "/layouts/{$this->layout}", [
            'query' => $this->data,
        ]);

        return Response::make(
            $response->getContent(),
            200,
            ['Content-Type' => 'application/pdf']
        );
    }
}
