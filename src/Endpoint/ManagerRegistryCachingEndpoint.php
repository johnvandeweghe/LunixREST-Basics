<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\CachingEndpoint;

abstract class ManagerRegistryCachingEndpoint extends CachingEndpoint
{
    use ManagerRegistryAwareTrait;
}
