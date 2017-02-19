<?php
namespace LunixRESTBasics\Endpoint;

class ManagerRegistryAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testSetManagerRegistryDoesntExplode(){
        $mockedMR = $this->getMockBuilder('\Doctrine\Common\Persistence\ManagerRegistry')->disableOriginalConstructor()->getMock();

        /**
         * @var $mockedTrait ManagerRegistryAwareTrait
         */
        $mockedTrait = $this->getMockForTrait('\LunixRESTBasics\Endpoint\ManagerRegistryAwareTrait');

        $mockedTrait->setManagerRegistry($mockedMR);
    }
}
