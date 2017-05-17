<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Server\Router\Endpoint\LoggingEndpoint;

abstract class ManagerRegistryEndpoint extends LoggingEndpoint
{
    use ManagerRegistryAwareTrait;
}
