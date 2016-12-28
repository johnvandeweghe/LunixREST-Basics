<?php
namespace LunixRESTBasics\APIRequest\BodyParser;

use LunixRESTBasics\APIRequest\BodyParser\Exceptions\InvalidRequestDataException;
use LunixRESTBasics\APIRequest\RequestData\JSONRequestData;
use LunixRESTBasics\APIRequest\RequestData\RequestData;

class JSONBodyParser implements BodyParser
{

    /**
     * Parses API request data out of a json string
     * @param $rawBody
     * @return RequestData
     * @throws InvalidRequestDataException
     */
    public function parse(string $rawBody): RequestData
    {
        return new JSONRequestData($rawBody);
    }
}
