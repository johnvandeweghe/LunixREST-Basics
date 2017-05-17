<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Server\Router\Endpoint\CachingEndpoint;

abstract class ManagerRegistryCachingEndpoint extends CachingEndpoint
{
    use ManagerRegistryAwareTrait;
}
