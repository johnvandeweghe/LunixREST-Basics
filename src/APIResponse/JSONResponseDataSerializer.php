<?php
namespace LunixRESTBasics\APIResponse;

use LunixREST\Server\APIResponse\APIResponseData;
use LunixREST\Server\ResponseFactory\APIResponseDataSerializer;
use Psr\Http\Message\StreamInterface;

/**
 * Class JSONResponse
 * @package LunixRESTBasics\APIResponse
 */
class JSONResponseDataSerializer implements APIResponseDataSerializer
{

    /**
     * @param APIResponseData $responseData
     * @return StreamInterface
     */
    public function serialize(APIResponseData $responseData): StreamInterface
    {
        return \GuzzleHttp\Psr7\Stream_for(json_encode($responseData->getData()));
    }
}
