<?php
require("vendor/autoload.php");
//So we can use the namespace endpoint factory
require("src/Endpoints/v1_0/helloworld.php");

use LunixREST\AccessControl\PublicAccessControl;
use LunixREST\Server\GenericRouter;
use LunixREST\Server\HTTPServer;
use LunixREST\Throttle\NoThrottle;
use LunixRESTBasics\APIRequest\RequestFactory\BasicRequestFactory;
use LunixREST\Server\GenericServer;
use LunixRESTBasics\Endpoint\SingleEndpointFactory;
use Psr\Log\NullLogger;

//Ignore whatever key is passed and give access anyway
$accessControl = new PublicAccessControl();

//Don't throttle requests
$throttle = new NoThrottle();

//Lets support JSON requests by responding with JSON
$responseFactory = new \LunixREST\APIResponse\RegisteredResponseFactory([
    'application/json' => new \LunixRESTBasics\APIResponse\JSONResponseDataSerializer()
]);

$endpointFactory = new SingleEndpointFactory(new HelloWorld\Endpoints\v1_0\helloworld());

$router = new GenericRouter($endpointFactory);

$server = new GenericServer($accessControl, $throttle, $responseFactory, $router);

//Build a basic request factory, which includes the basic url parser (which determines the url format)
$requestFactory = new BasicRequestFactory();

$httpServer = new HTTPServer($server, $requestFactory, new NullLogger());

$serverRequest = GuzzleHttp\Psr7\ServerRequest::fromGlobals();

//Run to test: GET /1.0/public/helloworld.json
HTTPServer::dumpResponse($httpServer->handleRequest($serverRequest, new GuzzleHttp\Psr7\Response()));
