<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\Common\Persistence\ManagerRegistry;
use LunixREST\Endpoint\LoggingEndpoint;
use LunixREST\Endpoint\LoggingEndpointFactory;
use Psr\Log\LoggerInterface;

abstract class ManagerRegistryEndpointFactory extends LoggingEndpointFactory
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry, LoggerInterface $logger)
    {
        $this->managerRegistry = $managerRegistry;
        parent::__construct($logger);
    }

    protected function getLoggingEndpoint(string $name, string $version): LoggingEndpoint
    {
        $endpoint = $this->getManagerRegistryEndpoint($name, $version);
        $endpoint->setManagerRegistry($this->managerRegistry);
        return $endpoint;
    }

    protected abstract function getManagerRegistryEndpoint(string $name, string $version): ManagerRegistryEndpoint;
}
