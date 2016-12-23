<?php
namespace LunixRESTBasics\AccessControl;

use LunixREST\AccessControl\AccessControl;
use LunixREST\APIRequest\APIRequest;

/**
 * An access control policy that allows a single key full access to the API
 * Class OneKeyAccessControl
 * @package LunixRESTBasics\AccessControl
 */
class OneKeyAccessControl implements AccessControl
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param \LunixREST\APIRequest\APIRequest $request
     * @return bool true if key is valid
     */
    public function validateAccess(APIRequest $request)
    {
        return $this->validateKey($request->getApiKey());
    }

    /**
     * @param $apiKey
     * @return bool true if key is the key specified in the constructor
     */
    public function validateKey($apiKey)
    {
        return $apiKey === $this->key;
    }
}
