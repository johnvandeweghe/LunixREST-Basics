<?php
namespace HelloWorld\Endpoints\v1_0;

use LunixREST\APIResponse\APIResponseData;
use LunixREST\Endpoint\DefaultEndpoint;
use LunixREST\Endpoint\Exceptions\UnsupportedMethodException;
use LunixREST\APIRequest\APIRequest;

class helloworld extends DefaultEndpoint
{

    /**
     * @param APIRequest $request
     * @return APIResponseData
     * @throws UnsupportedMethodException
     */
    public function getAll(APIRequest $request): APIResponseData
    {
        return new APIResponseData([
            "helloworld" => "HelloWorld"
        ]);
    }
}
