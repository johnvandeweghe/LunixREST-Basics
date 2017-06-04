<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\Common\Persistence\ManagerRegistry;
use LunixREST\Server\Router\Endpoint\CachingEndpoint;
use LunixREST\Server\Router\EndpointFactory\CachingEndpointFactory;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

/**
 * Class ManagerRegistryCachingEndpointFactory
 * @package LunixRESTBasics\Endpoint
 * @deprecated in favor of the actual EndpointFactory injecting the ManagerRegistry.
 */
abstract class ManagerRegistryCachingEndpointFactory extends CachingEndpointFactory
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * ManagerRegistryCachingEndpointFactory constructor.
     * @param ManagerRegistry $managerRegistry
     * @param CacheItemPoolInterface $cachePool
     * @param LoggerInterface $logger
     */
    public function __construct(ManagerRegistry $managerRegistry, CacheItemPoolInterface $cachePool, LoggerInterface $logger)
    {
        $this->managerRegistry = $managerRegistry;
        parent::__construct($cachePool,$logger);
    }

    /**
     * @param string $name
     * @param string $version
     * @return CachingEndpoint
     */
    protected function getCachingEndpoint(string $name, string $version): CachingEndpoint
    {
        $endpoint = $this->getManagerRegistryCachingEndpoint($name, $version);
        $endpoint->setManagerRegistry($this->managerRegistry);
        return $endpoint;
    }

    /**
     * @param string $name
     * @param string $version
     * @return ManagerRegistryCachingEndpoint
     */
    protected abstract function getManagerRegistryCachingEndpoint(string $name, string $version): ManagerRegistryCachingEndpoint;
}
