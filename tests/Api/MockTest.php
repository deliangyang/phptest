<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26
 * Time: 17:40
 */

namespace Test\Api;

use PHPUnit\Framework\TestCase;
use Test\Helper\MockInfo;

class MockTest extends TestCase
{

    public function testInfo()
    {
        $stub = $this->createMock(MockInfo::class);
        $stub->method('info')->willReturn('hello world');
        $this->assertEquals('hello world', $stub->info());
    }

}