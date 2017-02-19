<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\LoggingEndpoint;

abstract class EntityManagedEndpoint extends LoggingEndpoint
{
    use EntityManagerAwareTrait;
}
