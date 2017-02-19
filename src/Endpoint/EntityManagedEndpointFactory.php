<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\ORM\EntityManager;
use LunixREST\Endpoint\LoggingEndpoint;
use LunixREST\Endpoint\LoggingEndpointFactory;
use Psr\Log\LoggerInterface;

abstract class EntityManagedEndpointFactory extends LoggingEndpointFactory
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        parent::__construct($logger);
    }

    protected function getLoggingEndpoint(string $name, string $version): LoggingEndpoint
    {
        $endpoint = $this->getEntityManagedEndpoint($name, $version);
        $endpoint->setEntityManager($this->entityManager);
        return $endpoint;
    }

    protected abstract function getEntityManagedEndpoint(string $name, string $version): EntityManagedEndpoint;
}
