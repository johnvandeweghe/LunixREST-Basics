<?php
namespace LunixRESTBasics\APIRequest\BodyParser\BodyParserFactory;

use LunixRESTBasics\APIRequest\BodyParser\BodyParser;
use LunixRESTBasics\APIRequest\BodyParser\JSONBodyParser;
use LunixRESTBasics\APIRequest\BodyParser\URLEncodedBodyParser;

/**
 * A BodyParserFactory that understands url encoded and json encoded content-types.
 * Class DefaultBodyParserFactory
 * @package LunixRESTBasics\Request\BodyParser
 */
class DefaultBodyParserFactory implements BodyParserFactory
{

    protected $registeredBodyParserFactory;

    public function __construct()
    {
        $this->registeredBodyParserFactory = new RegisteredBodyParserFactory([
            'application/json' => new JSONBodyParser(),
            'application/x-www-form-urlencoded' => new URLEncodedBodyParser()
        ]);
    }

    public function add($contentType, BodyParser $bodyParser)
    {
        $this->registeredBodyParserFactory->add($contentType, $bodyParser);
    }

    /**
     * Parses API request data out of a url
     * @param string $contentType
     * @return BodyParser
     */
    public function create(string $contentType): BodyParser
    {
        return $this->registeredBodyParserFactory->create($contentType);
    }
}