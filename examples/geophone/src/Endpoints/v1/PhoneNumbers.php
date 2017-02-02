<?php
namespace GeoPhone\Endpoints\v1;

use GeoPhone\Models\GeoPhone;
use LunixREST\APIResponse\APIResponseData;
use LunixREST\Endpoint\DefaultEndpoint;
use LunixREST\APIRequest\APIRequest;

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


    public function get(APIRequest $request): APIResponseData
    {
        return $this->geoPhone->lookupNumber($request->getElement())->getAsResponseData();
    }
}
