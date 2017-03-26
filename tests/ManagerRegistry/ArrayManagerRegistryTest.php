<?php
namespace LunixRESTBasics\ManagerRegistry;

/**
 * Note: This class uses assertSame instead of assertEquals intentionally. This way we can be sure that it's not because
 * we're using stdClass or non different mocks that things are "equal".
 * Class ArrayManagerRegistryTest
 * @package LunixRESTBasics\ManagerRegistry
 */
class ArrayManagerRegistryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetConnectionWithNoOtherServicesByName()
    {
        $connectionName = 'testCon';
        $connections = [
            $connectionName => new \stdClass() // Because Connection isn't an actual thing outside of ORM
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, [], '', '');

        $connection = $managerRegistry->getConnection($connectionName);

        $this->assertSame($connections[$connectionName], $connection);
    }

    public function testGetDefaultConnectionWithNoOtherServices()
    {
        $connectionName = 'testCon';
        $connections = [
            $connectionName => new \stdClass() // Because Connection isn't an actual thing outside of ORM
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, [], $connectionName, '');

        $connection = $managerRegistry->getConnection();

        $this->assertSame($connections[$connectionName], $connection);
    }

    public function testGetManagerWithNoOtherServicesByName()
    {
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', [], $managers, '', '');

        $manager = $managerRegistry->getManager($managerName);

        $this->assertSame($managers[$managerName], $manager);
    }

    public function testGetDefaultManagerWithNoOtherServices()
    {
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', [], $managers, '', $managerName);

        $manager = $managerRegistry->getManager();

        $this->assertSame($managers[$managerName], $manager);
    }

    public function testGetConnectionWithMultipleConnectionsByName()
    {
        $connectionName = 'testCon';
        $connections = [
            $connectionName => new \stdClass(), // Because Connection isn't an actual thing outside of ORM
            "notConnectionName" => new \stdClass()
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, [], '', '');

        $connection = $managerRegistry->getConnection($connectionName);

        $this->assertSame($connections[$connectionName], $connection);
    }

    public function testGetDefaultConnectionWithMultipleConnections()
    {
        $connectionName = 'testCon';
        $connections = [
            $connectionName => new \stdClass(), // Because Connection isn't an actual thing outside of ORM
            "notConnectionName" => new \stdClass()
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, [], $connectionName, '');

        $connection = $managerRegistry->getConnection();

        $this->assertSame($connections[$connectionName], $connection);
    }

    public function testGetManagerWithMultipleManagersByName()
    {
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock(),
            "notManagerName" => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', [], $managers, '', '');

        $manager = $managerRegistry->getManager($managerName);

        $this->assertSame($managers[$managerName], $manager);
    }

    public function testGetDefaultManagerWithMultipleManagers()
    {
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock(),
            "notManagerName" => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', [], $managers, '', $managerName);

        $manager = $managerRegistry->getManager();

        $this->assertSame($managers[$managerName], $manager);
    }

    public function testGetManagerWithManagerAndConnectionByName()
    {
        $connections = [
            "con" => new \stdClass() // Because Connection isn't an actual thing outside of ORM
        ];
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, $managers, '', '');

        $manager = $managerRegistry->getManager($managerName);

        $this->assertSame($managers[$managerName], $manager);
    }

    public function testGetConnectionWithManagerAndConnectionByName()
    {
        $connectionName = 'testCon';
        $connections = [
            $connectionName => new \stdClass() // Because Connection isn't an actual thing outside of ORM
        ];
        $managerName = 'testMan';
        $managers = [
            $managerName => $this->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')->getMock()
        ];
        $managerRegistry = new ArrayManagerRegistry('', $connections, $managers, '', '');

        $connection = $managerRegistry->getConnection($connectionName);

        $this->assertSame($connections[$connectionName], $connection);
    }
}
