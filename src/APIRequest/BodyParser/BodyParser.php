<?php
namespace LunixRESTBasics\APIRequest\BodyParser;

use LunixRESTBasics\APIRequest\BodyParser\Exceptions\InvalidRequestDataException;
use LunixRESTBasics\APIRequest\RequestData\RequestData;

interface BodyParser
{
    /**
     * Parses API request data out of a url
     * @param $rawBody
     * @return RequestData
     * @throws InvalidRequestDataException
     */
    public function parse(string $rawBody): RequestData;
}
