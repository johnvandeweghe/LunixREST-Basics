<?php
namespace LunixRESTBasics\Throttle;

use LunixREST\APIRequest\APIRequest;
use LunixREST\Throttle\Throttle;

class NoThrottle implements Throttle
{
    /**
     * Never throttle
     * @param \LunixREST\APIRequest\APIRequest $request
     * @return bool
     */
    public function shouldThrottle(APIRequest $request): bool
    {
        return false;
    }

    /**
     * Log that a request took place
     * @param \LunixREST\APIRequest\APIRequest $request
     */
    public function logRequest(APIRequest $request)
    {
        //Do nothing
    }
}