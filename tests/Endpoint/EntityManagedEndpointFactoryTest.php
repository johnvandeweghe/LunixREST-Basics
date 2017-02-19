<?php
namespace LunixRESTBasics\Endpoint;

use Psr\Log\NullLogger;

class EntityManagedFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsEntityManagerOnEndpoint(){
        $mockedEntityManager = $this->getMockBuilder('\Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();
        $mockedEndpoint = $this->getMockBuilder('\LunixRESTBasics\Endpoint\EntityManagedEndpoint')->getMock();
        $mockedFactory = $this->getMockForAbstractClass('\LunixRESTBasics\Endpoint\EntityManagedEndpointFactory', [$mockedEntityManager, new NullLogger()]);
        $mockedFactory->method('getEntityManagedEndpoint')->willReturn($mockedEndpoint);
        /**
         * @var $mockedFactory EntityManagedEndpointFactory
         */

        $mockedEndpoint->expects($this->once())->method('setEntityManager');

        $mockedFactory->getEndpoint('', '');
    }
}
