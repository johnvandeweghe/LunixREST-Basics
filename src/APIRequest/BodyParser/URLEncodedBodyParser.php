<?php
namespace LunixRESTBasics\APIRequest\BodyParser;

use LunixRESTBasics\APIRequest\BodyParser\Exceptions\InvalidRequestDataException;
use LunixRESTBasics\APIRequest\RequestData\RequestData;
use LunixRESTBasics\APIRequest\RequestData\URLEncodedQueryStringRequestData;

class URLEncodedBodyParser implements BodyParser
{

    /**
     * Parses API request data out of a url
     * @param $rawBody
     * @return RequestData
     * @throws InvalidRequestDataException
     */
    public function parse(string $rawBody): RequestData
    {
        return new URLEncodedQueryStringRequestData($rawBody);
    }
}
