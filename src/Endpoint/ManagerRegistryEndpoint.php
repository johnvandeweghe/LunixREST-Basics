<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Server\Router\Endpoint\LoggingEndpoint;

/**
 * Class ManagerRegistryEndpoint
 * @package LunixRESTBasics\Endpoint
 * @deprecated in favor of just using the trait directly.
 */
abstract class ManagerRegistryEndpoint extends LoggingEndpoint
{
    use ManagerRegistryAwareTrait;
}
