<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Server\Router\Endpoint\Endpoint;
use LunixREST\Server\Router\EndpointFactory\EndpointFactory;

class SingleEndpointFactory implements EndpointFactory
{

    /**
     * @var Endpoint
     */
    private $singleEndpoint;

    /**
     * SingleEndpointFactory constructor.
     * @param Endpoint $singleEndpoint
     */
    public function __construct(Endpoint $singleEndpoint)
    {
        $this->singleEndpoint = $singleEndpoint;
    }

    /**
     * @param string $name
     * @param string $version
     * @return Endpoint
     */
    public function getEndpoint(string $name, string $version): Endpoint
    {
        return $this->singleEndpoint;
    }

    /**
     * @param string $version
     * @return string[]
     */
    public function getSupportedEndpoints(string $version): array
    {
        return [];
    }
}
