<?php
namespace LunixRESTBasics\APIResponse;

use LunixREST\APIResponse\APIResponse;
use LunixREST\APIResponse\Exceptions\NotAcceptableResponseTypeException;
use LunixREST\APIResponse\ResponseFactory;

/**
 * Class DefaultResponseFactory
 * @package LunixRESTBasics\APIResponse
 */
class DefaultResponseFactory implements ResponseFactory
{
    /**
     * @param null|object|array $data
     * @param array $acceptedMIMETypes
     * @return APIResponse
     * @throws NotAcceptableResponseTypeException
     */
    public function getResponse($data, array $acceptedMIMETypes): APIResponse
    {
        if (empty($acceptedMIMETypes)) {
            $acceptedMIMETypes = $this->getSupportedMIMETypes();
        }

        foreach ($acceptedMIMETypes as $acceptedMIMEType) {
            switch (strtolower($acceptedMIMEType)) {
                case "application/json":
                    return new JSONResponse($data);
            }
        }

        throw new NotAcceptableResponseTypeException("None of the accepted types are supported");
    }

    /**
     * @return string[]
     */
    public function getSupportedMIMETypes(): array
    {
        return [
            "application/json"
        ];
    }
}
