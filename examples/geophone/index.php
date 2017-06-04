<?php
require("vendor/autoload.php");

use GeoPhone\EndpointFactory\EndpointFactory;
use GeoPhone\Models\GeoPhone;
use LunixREST\Configuration\INIConfiguration;
use LunixREST\HTTPServer;
use LunixREST\Server\AccessControl\AllAccessKeyRepositoryAccessControl;
use LunixREST\Server\AccessControl\KeyRepository\ConfigurationKeyRepository;
use LunixREST\Server\GenericServer;
use LunixREST\Server\ResponseFactory\RegisteredResponseFactory;
use LunixREST\Server\Router\GenericRouter;
use LunixREST\Server\Throttle\NoThrottle;
use LunixRESTBasics\APIRequest\RequestFactory\BasicRequestFactory;

//Load an access control that gives full access to every key in config/api_keys.ini
$accessControl = new AllAccessKeyRepositoryAccessControl(
    new ConfigurationKeyRepository(new INIConfiguration("config/api_keys.ini"), "GeoPhone", 'keys')
);

//Don't throttle requests
$throttle = new NoThrottle();

//Lets support JSON requests by responding with JSON
$responseFactory = new RegisteredResponseFactory([
    'application/json' => new \LunixRESTBasics\APIResponse\JSONResponseDataSerializer()
]);

//Load in a global data model that we can use when handling requests (similar to connecting to a db)
$geoPhone = new GeoPhone("data.csv");

//Build an endpoint factory to find the requested endpoint, this is an example of a manually written one
$endpointFactory = new EndpointFactory($geoPhone);

$router = new GenericRouter($endpointFactory);

$server = new GenericServer($accessControl, $throttle, $responseFactory, $router);

//Build a basic request factory, which includes the basic url parser (which determines the url format)
$requestFactory = new BasicRequestFactory();

$httpServer = new HTTPServer($server, $requestFactory, new \Psr\Log\NullLogger());

$serverRequest = GuzzleHttp\Psr7\ServerRequest::fromGlobals();

//Run to test: GET /1/123456/phonenumbers/6517855237.json
HTTPServer::dumpResponse($httpServer->handleRequest($serverRequest, new GuzzleHttp\Psr7\Response()));
