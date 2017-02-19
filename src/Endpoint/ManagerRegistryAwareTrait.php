<?php
namespace LunixRESTBasics\Endpoint;

use Doctrine\Common\Persistence\ManagerRegistry;

trait ManagerRegistryAwareTrait
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @param ManagerRegistry $managerRegistry
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry) {
        $this->managerRegistry = $managerRegistry;
    }
}
