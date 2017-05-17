<?php
namespace HelloWorld\Endpoints\v1_0;

use LunixREST\Server\APIRequest\APIRequest;
use LunixREST\Server\APIResponse\APIResponseData;
use LunixREST\Server\Router\Endpoint\DefaultEndpoint;
use LunixREST\Server\Router\Endpoint\Exceptions\EndpointExecutionException;
use LunixREST\Server\Router\Endpoint\Exceptions\InvalidRequestException;
use LunixREST\Server\Router\Endpoint\Exceptions\UnsupportedMethodException;

class helloworld extends DefaultEndpoint
{

    /**
     * @param APIRequest $request
     * @return APIResponseData
     * @throws EndpointExecutionException
     * @throws UnsupportedMethodException
     * @throws InvalidRequestException
     */
    public function getAll(APIRequest $request): APIResponseData
    {
        return new APIResponseData([
            "helloworld" => "HelloWorld"
        ]);
    }
}
