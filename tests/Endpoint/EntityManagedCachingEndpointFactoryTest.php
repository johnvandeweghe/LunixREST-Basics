<?php
namespace LunixRESTBasics\Endpoint;

use Psr\Log\NullLogger;

class EntityManagedCachingFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsEntityManagerOnEndpoint(){
        $mockedEntityManager = $this->getMockBuilder('\Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();
        $mockedEndpoint = $this->getMockBuilder('\LunixRESTBasics\Endpoint\EntityManagedCachingEndpoint')->getMock();
        $mockedCachingPool = $this->getMockBuilder('\Psr\Cache\CacheItemPoolInterface')->getMock();
        $mockedFactory = $this->getMockForAbstractClass('\LunixRESTBasics\Endpoint\EntityManagedCachingEndpointFactory',
            [$mockedEntityManager, $mockedCachingPool, new NullLogger()]
        );
        $mockedFactory->method('getEntityManagedCachingEndpoint')->willReturn($mockedEndpoint);
        /**
         * @var $mockedFactory EntityManagedCachingEndpointFactory
         */

        $mockedEndpoint->expects($this->once())->method('setEntityManager');

        $mockedFactory->getEndpoint('', '');
    }
}
