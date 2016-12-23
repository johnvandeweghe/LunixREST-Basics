<?php
namespace LunixRESTBasics\AccessControl;

use LunixREST\AccessControl\AccessControl;

/**
 * Abstractly allow multiple access controls. Checking of them depends on implementation
 * Class MultiAccessControl
 * @package LunixRESTBasics\AccessControl
 */
abstract class MultiAccessControl implements AccessControl
{
    /**
     * @var AccessControl[]
     */
    protected $accessControls;

    /**
     * @param AccessControl[] $accessControls array of access controls
     */
    public function __construct(array $accessControls)
    {
        $this->accessControls = $accessControls;
    }
}