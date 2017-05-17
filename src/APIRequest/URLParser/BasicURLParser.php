<?php
namespace LunixRESTBasics\APIRequest\URLParser;

use LunixREST\RequestFactory\URLParser\RegexURLParser\RegexURLParser;

/**
 * A basic URL parser. Expects URLS in the format:
 * /VERSION/APIKEY/ENDPOINT_NAME[/INSTANCE_ID].EXTENSION[?QUERY_STRING]
 * Class BasicURLParser
 * @package LunixRESTBasics\APIRequest\URLParser
 */
class BasicURLParser extends RegexURLParser
{
    private const URL_PATTERN = "@/(?<version>[^/]*)/(?<apiKey>[^/]*)/(?<endpoint>[^/.]*)(?:/(?<element>[^.]*))?.(?<acceptableExtension>[^/]*)/?@";

    /**
     * BasicURLParser constructor.
     */
    public function __construct()
    {
        parent::__construct(self::URL_PATTERN, new GuzzleMIMEProvider());
    }
}
