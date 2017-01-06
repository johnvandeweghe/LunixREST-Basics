<?php
require("vendor/autoload.php");

use GeoPhone\EndpointFactory\EndpointFactory;
use GeoPhone\Models\GeoPhone;
use LunixREST\Server\GenericRouter;
use LunixREST\Server\GenericServer;
use LunixREST\Server\HTTPServer;
use LunixRESTBasics\AccessControl\AllAccessConfigurationListAccessControl;
use LunixRESTBasics\APIRequest\RequestFactory\BasicRequestFactory;
use LunixRESTBasics\APIResponse\DefaultResponseFactory;
use LunixRESTBasics\Configuration\INIConfiguration;
use LunixRESTBasics\Throttle\NoThrottle;

//Load an access control that gives full access to every key in config/api_keys.ini
$accessControl = new AllAccessConfigurationListAccessControl(new INIConfiguration("config/api_keys.ini"), "GeoPhone", 'keys');

//Don't throttle requests
$throttle = new NoThrottle();

//Lets support the default response types (JSON)
$responseFactory = new DefaultResponseFactory();

//Load in a global data model that we can use when handling requests (similar to connecting to a db)
$geoPhone = new GeoPhone("data.csv");

//Build an endpoint factory to find the requested endpoint
$endpointFactory = new EndpointFactory($geoPhone);

$router = new GenericRouter($endpointFactory);

$server = new GenericServer($accessControl, $throttle, $responseFactory, $router);

//Build a basic request factory, which includes the basic url parser (which determines the url format)
$requestFactory = new BasicRequestFactory();

$httpServer = new HTTPServer($server, $requestFactory);

$httpServer = new HTTPServer($server, $requestFactory);

$serverRequest = GuzzleHttp\Psr7\ServerRequest::fromGlobals();

//Run to test: GET /1/123456/phonenumbers/6517855237.json
HTTPServer::dumpResponse($httpServer->handleRequest($serverRequest, new GuzzleHttp\Psr7\Response()));
