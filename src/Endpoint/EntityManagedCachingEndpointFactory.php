<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\ORM\EntityManager;
use LunixREST\Endpoint\CachingEndpoint;
use LunixREST\Endpoint\CachingEndpointFactory;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

abstract class EntityManagedCachingEndpointFactory extends CachingEndpointFactory
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager, CacheItemPoolInterface $cachePool, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        parent::__construct($cachePool,$logger);
    }

    protected function getCachingEndpoint(string $name, string $version): CachingEndpoint
    {
        $endpoint = $this->getEntityManagedCachingEndpoint($name, $version);
        $endpoint->setEntityManager($this->entityManager);
        return $endpoint;
    }

    protected abstract function getEntityManagedCachingEndpoint(string $name, string $version): EntityManagedCachingEndpoint;
}
