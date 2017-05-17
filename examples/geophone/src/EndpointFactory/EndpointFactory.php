<?php
namespace GeoPhone\EndpointFactory;

use GeoPhone\Endpoints\v1\PhoneNumbers;
use GeoPhone\Models\GeoPhone;
use LunixREST\Server\Router\Endpoint\Endpoint;
use LunixREST\Server\Router\EndpointFactory\Exceptions\UnableToCreateEndpointException;
use LunixREST\Server\Router\EndpointFactory\Exceptions\UnknownEndpointException;

class EndpointFactory implements \LunixREST\Server\Router\EndpointFactory\EndpointFactory
{

    protected $geoPhone;

    public function __construct(GeoPhone $geoPhone)
    {
        $this->geoPhone = $geoPhone;
    }

    /**
     * @param string $name
     * @param string $version
     * @return Endpoint
     * @throws UnableToCreateEndpointException
     * @throws UnknownEndpointException
     */
    public function getEndpoint(string $name, string $version): Endpoint
    {
        switch ($version) {
            case "1":
                switch (strtolower($name)) {
                    case "phonenumbers":
                        return new PhoneNumbers($this->geoPhone);
                    default:
                        throw new UnknownEndpointException("Endpoint: $name not supported");
                }
            default:
                throw new UnknownEndpointException("Version: $version not support");
        }
    }

    /**
     * @param string $version
     * @return string[]
     */
    public function getSupportedEndpoints(string $version): array
    {
        return ["phonenumbers"];
    }
}
