<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\LoggingEndpoint;

abstract class ManagerRegistryEndpoint extends LoggingEndpoint
{
    use ManagerRegistryAwareTrait;
}
