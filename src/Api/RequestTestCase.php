<?php

namespace TestApi\Api;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RequestTestCase extends TestCase
{

    protected $prefixUrl = 'http://127.0.0.1/';

    protected $method = 'GET';

    protected $data = [];


    public function data(array $data): self
    {
       $this->data = $data;
        return $this;
    }

    public function handle()
    {
        $client = new Client();
        return $client;
    }

    public function request($api, callable $callback)
    {
        $url = $this->prefixUrl . $api;

        try {
            $client = $this->handle();
            $response = $client->request($this->method, $url, $this->data);
        } catch (\Exception $exception) {
            $this->assertTrue(false, $exception->getMessage());
        }

        $callback($response);
    }

}