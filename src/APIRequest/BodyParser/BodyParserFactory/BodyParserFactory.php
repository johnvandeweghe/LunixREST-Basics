<?php
namespace LunixRESTBasics\APIRequest\BodyParser\BodyParserFactory;

use LunixRESTBasics\APIRequest\BodyParser\BodyParser;
use LunixRESTBasics\APIRequest\BodyParser\BodyParserFactory\Exceptions\UnknownContentTypeException;

/**
 * UNUSED. Will be migrated to a higher level HTTP parsing area. This namespace is for APIRequest handling, which should
 * already have the http body parsed.
 * Interface BodyParserFactory
 * @package LunixRESTBasics\APIRequest\BodyParser\BodyParserFactory
 */
interface BodyParserFactory
{
    /**
     * Parses API request data out of a url
     * @param string $contentType
     * @return BodyParser
     * @throws UnknownContentTypeException
     */
    public function create(string $contentType): BodyParser;
}
