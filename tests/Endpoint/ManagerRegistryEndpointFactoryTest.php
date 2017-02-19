<?php
namespace LunixRESTBasics\Endpoint;

use Psr\Log\NullLogger;

class ManagerRegistryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsManagerRegistryOnEndpoint(){
        $mockedManagerRegistry = $this->getMockBuilder('\Doctrine\Common\Persistence\ManagerRegistry')->disableOriginalConstructor()->getMock();
        $mockedEndpoint = $this->getMockBuilder('\LunixRESTBasics\Endpoint\ManagerRegistryEndpoint')->getMock();
        $mockedFactory = $this->getMockForAbstractClass('\LunixRESTBasics\Endpoint\ManagerRegistryEndpointFactory', [$mockedManagerRegistry, new NullLogger()]);
        $mockedFactory->method('getManagerRegistryEndpoint')->willReturn($mockedEndpoint);
        /**
         * @var $mockedFactory ManagerRegistryEndpointFactory
         */

        $mockedEndpoint->expects($this->once())->method('setManagerRegistry');

        $mockedFactory->getEndpoint('', '');
    }
}
