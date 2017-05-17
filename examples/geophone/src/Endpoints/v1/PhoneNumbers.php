<?php
namespace GeoPhone\Endpoints\v1;

use GeoPhone\Models\GeoPhone;
use LunixREST\Server\APIRequest\APIRequest;
use LunixREST\Server\APIResponse\APIResponseData;
use LunixREST\Server\Router\Endpoint\DefaultEndpoint;
use LunixREST\Server\Router\Endpoint\Exceptions\ElementNotFoundException;
use LunixREST\Server\Router\Endpoint\Exceptions\EndpointExecutionException;
use LunixREST\Server\Router\Endpoint\Exceptions\InvalidRequestException;
use LunixREST\Server\Router\Endpoint\Exceptions\UnsupportedMethodException;

class PhoneNumbers extends DefaultEndpoint
{

    protected $geoPhone;

    /**
     * PhoneNumbers constructor.
     * @param GeoPhone $geoPhone
     */
    public function __construct(GeoPhone $geoPhone)
    {
        $this->geoPhone = $geoPhone;
    }

    /**
     * @param APIRequest $request
     * @return APIResponseData
     * @throws EndpointExecutionException
     * @throws UnsupportedMethodException
     * @throws ElementNotFoundException
     * @throws InvalidRequestException
     */
    public function get(APIRequest $request): APIResponseData
    {
        return $this->geoPhone->lookupNumber($request->getElement())->getAsResponseData();
    }
}
