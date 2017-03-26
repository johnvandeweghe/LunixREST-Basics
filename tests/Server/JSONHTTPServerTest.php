<?php
namespace LunixRESTBasics\Server;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Log\NullLogger;

class JSONHTTPServerTest extends \PHPUnit\Framework\TestCase
{
    public function testRequestFactoryGetsRequestWithParsedJSON()
    {
        $testData = [
            "key" => [
                1,
                2,
                3
            ],
            "value" => false
        ];
        $mockedServer = $this->getMockBuilder('\LunixREST\Server\Server')->getMock();
        $mockedRequestFactory = $this->getMockBuilder('\LunixREST\APIRequest\RequestFactory\RequestFactory')->getMock();
        $serverRequest = new ServerRequest('', '', [], json_encode($testData));
        $mockedAPIRequest = $this->getMockBuilder('\LunixREST\APIRequest\APIRequest')->disableOriginalConstructor()->getMock();
        $httpServer = new JSONHTTPServer($mockedServer, $mockedRequestFactory, new NullLogger());

        $expectedRequest = JSONHTTPServer::parseBodyAsJSON($serverRequest);

        $mockedRequestFactory->expects($this->once())->method('create')->with($expectedRequest)->willReturn($mockedAPIRequest);

        $httpServer->handleRequest($serverRequest, new Response());
    }

    public function testParseBodyAsJSONParsesJSON()
    {
        $testData = '{"key":[1,2,3],"0":{"bools":[true,false]},"1":null}';
        $expectedData = [
            "key" => [
                1,
                2,
                3
            ],
            [
                "bools" => [
                    true,
                    false
                ]
            ],
            null
        ];
        $serverRequest = new ServerRequest('', '', [], $testData);

        $parsedRequest = JSONHTTPServer::parseBodyAsJSON($serverRequest);

        $this->assertEquals($expectedData, $parsedRequest->getParsedBody());
    }
}
