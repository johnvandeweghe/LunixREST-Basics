<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\Common\Persistence\ManagerRegistry;
use LunixREST\Endpoint\CachingEndpoint;
use LunixREST\Endpoint\CachingEndpointFactory;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

abstract class ManagerRegistryCachingEndpointFactory extends CachingEndpointFactory
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry, CacheItemPoolInterface $cachePool, LoggerInterface $logger)
    {
        $this->managerRegistry = $managerRegistry;
        parent::__construct($cachePool,$logger);
    }

    protected function getCachingEndpoint(string $name, string $version): CachingEndpoint
    {
        $endpoint = $this->getManagerRegistryCachingEndpoint($name, $version);
        $endpoint->setManagerRegistry($this->managerRegistry);
        return $endpoint;
    }

    protected abstract function getManagerRegistryCachingEndpoint(string $name, string $version): ManagerRegistryCachingEndpoint;
}
