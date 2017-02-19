<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\CachingEndpoint;

abstract class EntityManagedCachingEndpoint extends CachingEndpoint
{
    use EntityManagerAwareTrait;
}
