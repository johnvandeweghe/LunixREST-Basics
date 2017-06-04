<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Server\Router\Endpoint\CachingEndpoint;

/**
 * Class ManagerRegistryCachingEndpoint
 * @package LunixRESTBasics\Endpoint
 * @deprecated in favor of just using the trait directly.
 */
abstract class ManagerRegistryCachingEndpoint extends CachingEndpoint
{
    use ManagerRegistryAwareTrait;
}
