<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\ORM\EntityManager;
use LunixREST\Endpoint\DefaultEndpoint;

/**
 * A DoctrineEndpoint, for use with a EndpointFactory that can construct by passing in an EntityManager
 * Class DoctrineEndpoint
 * @package LunixRESTBasics\Endpoints
 */
class DoctrineEndpoint extends DefaultEndpoint
{
    protected $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }
}
