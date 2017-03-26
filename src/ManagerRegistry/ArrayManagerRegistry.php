<?php
namespace LunixRESTBasics\ManagerRegistry;

use Doctrine\Common\Persistence\AbstractManagerRegistry;

/**
 * A basic implementation of Doctrine\Common\Persistence\AbstractManagerRegistry that uses an associative array as a container.
 * This class is so that we can use a more generic ManagerRegistry, but usually frameworks provide the implementation.
 * Only use this if your codebase doesn't have something more complete.
 * Class ArrayManagerRegistry
 * @package LunixRESTBasics\ManagerRegistry
 */
class ArrayManagerRegistry extends AbstractManagerRegistry
{
    /**
     * @var array
     */
    protected $container;

    /**
     * ArrayManagerRegistry constructor.
     * @param string $name
     * @param array $connections
     * @param array $managers
     * @param string $defaultConnection
     * @param string $defaultManager
     */
    public function __construct(
        $name,
        array $connections,
        array $managers,
        $defaultConnection,
        $defaultManager
    ) {
        $i = 0;
        foreach($connections as $name => $connection) {
            $this->container[$i] = $connection;
            $connections[$name] = $i;
            $i++;
        }
        foreach($managers as $name => $manager) {
            $this->container[$i] = $manager;
            $managers[$name] = $i;
            $i++;
        }

        parent::__construct($name, $connections, $managers, $defaultConnection, $defaultManager, null);
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function getService($name)
    {
        return $this->container[$name];
    }

    /**
     * @param string $name
     */
    protected function resetService($name)
    {
        $this->container[$name] = null;
        //TODO: This should recreate an object manager, however the abstract this is based off of doesn't really hint on how
    }

    /**
     * @param string $alias
     * @return mixed
     * @throws \Exception
     * Note that this probably should use ORMException, but that so far this class doesn't know about ORM (just persistence)
     */
    public function getAliasNamespace($alias)
    {
        foreach (array_keys($this->getManagers()) as $name) {
            try {
                return $this->getManager($name)->getConfiguration()->getEntityNamespace($alias);
            } catch (\Exception $e) {
            }
        }
        throw new \Exception("Unknown alias: $alias");
    }
}
