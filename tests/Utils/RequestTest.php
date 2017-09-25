<?php

namespace Test\Utils;

use GuzzleHttp\Psr7\Response;
use TestApi\Api\RequestTestCase;

class RequestTest extends RequestTestCase
{

    protected $prefixUrl = 'http://www.ydl.com:9090';

    public function testBaidu()
    {
        $this->request('/admin', function (Response $response) {
            $this->assertTrue($response->getStatusCode() === 200);
        });

    }

}