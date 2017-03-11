<?php
namespace LunixRESTBasics\Endpoint;

class SingleEndpointFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetSupportedEndpointsReturnsAnEmptyArray() {
        $mockedEndpoint = $this->getMockBuilder('\LunixREST\Endpoint\Endpoint')->getMock();

        $endpointFactory = new SingleEndpointFactory($mockedEndpoint);
        $supportedEndpoints = $endpointFactory->getSupportedEndpoints('');

        $this->assertEmpty($supportedEndpoints);
    }
    public function testGetEndpointReturnsConstructedEndpoint() {
        $mockedEndpoint = $this->getMockBuilder('\LunixREST\Endpoint\Endpoint')->getMock();

        $endpointFactory = new SingleEndpointFactory($mockedEndpoint);
        $endpoint = $endpointFactory->getEndpoint('', '');

        $this->assertEquals($mockedEndpoint, $endpoint);
    }
}
