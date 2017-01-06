<?php
require("vendor/autoload.php");
//So we can use the namespace endpoint factory
require("src/Endpoints/v1_0/helloworld.php");

use LunixREST\Server\GenericRouter;
use LunixREST\Server\HTTPServer;
use LunixRESTBasics\AccessControl\PublicAccessControl;
use LunixRESTBasics\Endpoint\NamespaceEndpointFactory;
use LunixRESTBasics\APIRequest\RequestFactory\BasicRequestFactory;
use LunixRESTBasics\APIResponse\DefaultResponseFactory;
use LunixREST\Server\GenericServer;
use LunixRESTBasics\Throttle\NoThrottle;

//Ignore whatever key is passed and give access anyway
$accessControl = new PublicAccessControl();

//Don't throttle requests
$throttle = new NoThrottle();

//Lets support the default response types (JSON)
$responseFactory = new DefaultResponseFactory();

//Load any endpoints from the namespace listed
$endpointFactory = new NamespaceEndpointFactory("\\HelloWorld\\Endpoints");

$router = new GenericRouter($endpointFactory);

$server = new GenericServer($accessControl, $throttle, $responseFactory, $router);

//Build a basic request factory, which includes the basic url parser (which determines the url format)
$requestFactory = new BasicRequestFactory();

$httpServer = new HTTPServer($server, $requestFactory);

$serverRequest = GuzzleHttp\Psr7\ServerRequest::fromGlobals();

//Run to test: GET /1.0/public/helloworld.json
HTTPServer::dumpResponse($httpServer->handleRequest($serverRequest, new GuzzleHttp\Psr7\Response()));
