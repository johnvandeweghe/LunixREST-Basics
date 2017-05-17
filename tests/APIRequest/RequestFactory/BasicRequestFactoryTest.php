<?php
namespace LunixRESTBasics\APIRequest\RequestFactory;

class BasicRequestFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testUsesDefaultsAndBasic()
    {
        $requestFactory = new BasicRequestFactory();

        $this->assertInstanceOf('\LunixRESTBasics\APIRequest\URLParser\BasicURLParser', $requestFactory->getURLParser());
        $this->assertInstanceOf('\LunixREST\RequestFactory\HeaderParser\DefaultHeaderParser',
            $requestFactory->getHeaderParser());
    }
}
