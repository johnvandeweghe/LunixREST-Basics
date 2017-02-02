<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\Endpoint;
use LunixREST\Endpoint\EndpointFactory;
use LunixREST\Endpoint\Exceptions\UnknownEndpointException;

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
     * @throws UnknownEndpointException
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
