<?php
namespace HelloWorld\Endpoints\v1_0;

use LunixREST\Endpoint\DefaultEndpoint;
use LunixREST\Endpoint\Exceptions\UnsupportedMethodException;
use LunixREST\APIRequest\APIRequest;

class helloworld extends DefaultEndpoint
{

    /**
     * @param APIRequest $request
     * @return object|array|null
     * @throws UnsupportedMethodException
     */
    public function getAll(APIRequest $request)
    {
        $helloWorld = new \HelloWorld\Models\HelloWorld();

        return $helloWorld->getAsAssociativeArray();
    }
}
