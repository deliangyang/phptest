<?php

namespace Test\Helper;

use GuzzleHttp\Psr7\Response;
use TestApi\Api\RequestTestCase;

class YdlRequest extends RequestTestCase
{

    protected $prefixUrl = 'http://www.ydl.com:8080';

    protected $authToken;

    protected $data = [
        'headers' => [
            'X-Requested-With' => 'XMLHttpRequest',
        ],
        'form_params' => [
            'userId' => 0x1,
        ],
    ];

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->testAuth();
    }

    public function testAuth()
    {
        $this->request('/test/api/login', function (Response $response) {
            $this->authToken = $response->getBody()->getContents();
            //var_dump($this->authToken);
            $this->assertTrue(strlen($this->authToken) > 0);
        });
    }

}