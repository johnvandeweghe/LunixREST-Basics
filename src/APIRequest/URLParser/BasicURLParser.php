<?php
namespace LunixRESTBasics\APIRequest\URLParser;

use LunixREST\APIRequest\URLParser\Exceptions\InvalidRequestURLException;
use LunixREST\APIRequest\URLParser\ParsedURL;
use LunixREST\APIRequest\URLParser\URLParser;
use Psr\Http\Message\UriInterface;

/**
 * A basic URL parser. Expects URLS in the format:
 * /VERSION/APIKEY/ENDPOINT_NAME[/INSTANCE_ID].EXTENSION[?QUERY_STRING]
 * Class BasicURLParser
 * @package LunixRESTBasics\APIRequest\URLParser
 */
class BasicURLParser implements URLParser
{
    /**
     * BasicURLParser constructor.
     */
    public function __construct()
    {
    }

    /**
     * Parses API request data out of a url
     * @param UriInterface $uri
     * @return ParsedURL
     * @throws InvalidRequestURLException
     */
    public function parse(UriInterface $uri): ParsedURL
    {
        $url = $uri->getPath();
        $splitURL = explode('/', trim($url, '/'));
        if (count($splitURL) < 3) {
            throw new InvalidRequestURLException();
        }
        //Find endpoint
        $version = $splitURL[0];
        $apiKey = $splitURL[1];
        $endpoint = $splitURL[2];

        $splitExtension = explode('.', $splitURL[count($splitURL) - 1]);
        $extension = array_pop($splitExtension);

        $element = null;

        if (count($splitURL) == 4) {
            $element = implode('.', $splitExtension);
        } else {
            $endpoint = implode('.', $splitExtension);
        }

        $queryString = $uri->getQuery();

        $mime = \GuzzleHttp\Psr7\mimetype_from_extension($extension);

        return new ParsedURL($endpoint, $element, $version, $apiKey, $mime ? [$mime] : [], $queryString);
    }
}
