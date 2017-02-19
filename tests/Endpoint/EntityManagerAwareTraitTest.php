<?php
namespace LunixRESTBasics\Endpoint;

class EntityManagerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testSetEntityManagerDoesntExplode(){
        $mockedEM = $this->getMockBuilder('\Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();

        /**
         * @var $mockedTrait EntityManagerAwareTrait
         */
        $mockedTrait = $this->getMockForTrait('\LunixRESTBasics\Endpoint\EntityManagerAwareTrait');

        $mockedTrait->setEntityManager($mockedEM);
    }
}
