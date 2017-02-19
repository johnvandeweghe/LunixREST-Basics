<?php
namespace LunixRESTBasics\Endpoint;

use Psr\Log\NullLogger;

class ManagerRegistryCachingFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsManagerRegistryOnEndpoint(){
        $mockedManagerRegistry = $this->getMockBuilder('\Doctrine\Common\Persistence\ManagerRegistry')->disableOriginalConstructor()->getMock();
        $mockedEndpoint = $this->getMockBuilder('\LunixRESTBasics\Endpoint\ManagerRegistryCachingEndpoint')->getMock();
        $mockedCachingPool = $this->getMockBuilder('\Psr\Cache\CacheItemPoolInterface')->getMock();
        $mockedFactory = $this->getMockForAbstractClass('\LunixRESTBasics\Endpoint\ManagerRegistryCachingEndpointFactory',
            [$mockedManagerRegistry, $mockedCachingPool, new NullLogger()]
        );
        $mockedFactory->method('getManagerRegistryCachingEndpoint')->willReturn($mockedEndpoint);
        /**
         * @var $mockedFactory ManagerRegistryCachingEndpointFactory
         */

        $mockedEndpoint->expects($this->once())->method('setManagerRegistry');

        $mockedFactory->getEndpoint('', '');
    }
}
