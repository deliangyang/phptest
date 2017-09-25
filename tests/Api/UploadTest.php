<?php

namespace Test\Api;

use Faker\Factory;
use GuzzleHttp\Psr7\Response;
use Test\Helper\YdlRequest;

class UploadTest extends YdlRequest
{

    protected $prefixUrl = 'http://www.ydl.com:9090';

    protected $method = 'POST';

    public function testUpload()
    {
        $this->data['headers']['authorize-token'] = $this->authToken;
        $this->data['headers']['x-api-test'] = 1;
        $this->data['headers']['X-HTTP-Method-Override'] = $this->method;
        $this->data['headers']['xhprof'] = 0;

        $this->data['form_params'] = [
            'taskId' => 'xxxxx',
            'songName' => 'asdfasdfasdf',
            'createTime' => time(),
            'filesInfo' => \GuzzleHttp\json_encode([
                'song' => [
                    'fileName' => 'file.txt',
                    'md5' => md5('file.txt'),
                    'duration' => 1199,
                    'size' => 110,
                ],
            ]),

        ];
        $this->request('/api/upload/song', function (Response $response) {
            $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
            $this->assertArrayHasKey('token', $content['data']['filesInfo']['song']);
        });
    }


    protected function parseData()
    {
        $facker = Factory::create();



       /* $this->data['body'] = [
            'transactionId' => 'xxxxx',
            'taskId' => $facker->buildingNumber,
            'songName' => $facker->name,
            'createTime' => $facker->dateTime,
            'filesInfo' => [
                'song' => [
                    'fileName' => 'filename.txt',
                    'md5' => md5('hello'),
                    'duration' => 1,
                    'size' => strlen('hello'),
                ],
            ],
        ];*/

       /* $data = [
            'headers' => $this->data['headers'],
            /*'form_params' => [
                'transactionId' => 'xxxxx',
            ],*/
            //'body' => 'transactionId=asdfjalskdfjasf',
            /*'multipart' => [
                [

                    'name' => 'transactionId',
                    'contents' => 'xvfdasfdsaf',
                ]
            ],*/
        //];*/
    //    return $data;
        /*$this->data['multipart'] = [
            [
                'name' => 'transactionId',
                'contents' => 'xvfdasfdsaf',
            ]
        ];*/
        //$this->data['body'] = 'transactionId=xxxxx';
    }

}