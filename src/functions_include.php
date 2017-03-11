<?php
namespace LunixRESTBasics;

use Psr\Http\Message\ServerRequestInterface;

function parseBodyAsJSON(ServerRequestInterface $serverRequest): ServerRequestInterface
{
    $jsonBody = json_decode($serverRequest->getBody()->getContents(), true);
    return $serverRequest->withParsedBody($jsonBody);
}
