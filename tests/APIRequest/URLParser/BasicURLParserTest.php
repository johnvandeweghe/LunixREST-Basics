<?php
namespace LunixRESTBasics\APIRequest\URLParser;

class BasicURLParserTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateRequestWithInstanceFromURL()
    {
        $version = '1.0';
        $APIKey = 'public';
        $endpoint = 'helloworld';
        $extension = 'json';
        $MIMEType = 'application/json';
        $element = '1000';
        $queryString = "test=query";

        $urlParser = new BasicURLParser();

        $parsedURL = $urlParser->parse(\GuzzleHttp\Psr7\uri_for("/$version/$APIKey/$endpoint/$element.$extension?$queryString"));

        $this->assertEquals($version, $parsedURL->getVersion(), 'version should be parsed out of URLS');
        $this->assertEquals($APIKey, $parsedURL->getAPIKey(), 'api key should be parsed out of URLS');
        $this->assertEquals($endpoint, $parsedURL->getEndpoint(), 'endpoint should be parsed out of URLS');
        $this->assertEquals($element, $parsedURL->getElement(), 'element should be parsed out of URLS');
        $this->assertEquals([$MIMEType], $parsedURL->getAcceptableMIMETypes(),
            'acceptableMIMETypes should be parsed out of URLS');
    }

    public function testCreateRequestFromInvalidURL()
    {
        $urlParser = new BasicURLParser();

        $this->expectException('\LunixREST\RequestFactory\URLParser\Exceptions\InvalidRequestURLException');
        $urlParser->parse(\GuzzleHttp\Psr7\uri_for("/admin"));
    }

    public function testCreateRequestWithoutInstanceFromURL()
    {
        $version = '1.0';
        $APIKey = 'public';
        $endpoint = 'helloworld';
        $extension = 'json';
        $MIMEType = 'application/json';
        $element = null;
        $queryString = "test=query";

        $urlParser = new BasicURLParser();

        $parsedURL = $urlParser->parse(\GuzzleHttp\Psr7\uri_for("/$version/$APIKey/$endpoint.$extension?$queryString"));

        $this->assertEquals($version, $parsedURL->getVersion(), 'version should be parsed out of URLS');
        $this->assertEquals($APIKey, $parsedURL->getAPIKey(), 'api key should be parsed out of URLS');
        $this->assertEquals($endpoint, $parsedURL->getEndpoint(), 'endpoint should be parsed out of URLS');
        $this->assertEquals($element, $parsedURL->getElement(), 'element should be null if not in url');
        $this->assertEquals([$MIMEType], $parsedURL->getAcceptableMIMETypes(),
            'acceptableMIMETypes should be parsed out of URLS');
    }
}
