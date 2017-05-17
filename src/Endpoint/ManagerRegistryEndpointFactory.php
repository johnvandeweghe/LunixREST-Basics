<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\Common\Persistence\ManagerRegistry;
use LunixREST\Server\Router\Endpoint\LoggingEndpoint;
use LunixREST\Server\Router\EndpointFactory\LoggingEndpointFactory;
use Psr\Log\LoggerInterface;

/**
 * Class ManagerRegistryEndpointFactory
 * @package LunixRESTBasics\Endpoint
 */
abstract class ManagerRegistryEndpointFactory extends LoggingEndpointFactory
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * ManagerRegistryEndpointFactory constructor.
     * @param ManagerRegistry $managerRegistry
     * @param LoggerInterface $logger
     */
    public function __construct(ManagerRegistry $managerRegistry, LoggerInterface $logger)
    {
        $this->managerRegistry = $managerRegistry;
        parent::__construct($logger);
    }

    /**
     * @param string $name
     * @param string $version
     * @return LoggingEndpoint
     */
    protected function getLoggingEndpoint(string $name, string $version): LoggingEndpoint
    {
        $endpoint = $this->getManagerRegistryEndpoint($name, $version);
        $endpoint->setManagerRegistry($this->managerRegistry);
        return $endpoint;
    }

    /**
     * @param string $name
     * @param string $version
     * @return ManagerRegistryEndpoint
     */
    protected abstract function getManagerRegistryEndpoint(string $name, string $version): ManagerRegistryEndpoint;
}
