<?php
namespace GeoPhone\Models;

use LunixREST\Server\APIResponse\APIResponseData;

/**
 * Class GeoPhone
 * @package GeoPhone\Models
 */
class LookupResponse
{
    protected $city;
    protected $state;

    /**
     * LookupResponse constructor.
     * @param string $city
     * @param string $state
     */
    public function __construct(string $city, string $state)
    {
        $this->city = $city;
        $this->state = $state;
    }


    /**
     * @return APIResponseData
     */
    public function getAsResponseData(): APIResponseData
    {
        return new APIResponseData([
            "location" => [
                'city' => $this->city,
                'state' => $this->state
            ]
        ]);
    }
}
