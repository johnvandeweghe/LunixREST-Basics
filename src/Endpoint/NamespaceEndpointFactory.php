<?php
namespace LunixRESTBasics\Endpoint;

use LunixREST\Endpoint\Endpoint;
use LunixREST\Endpoint\EndpointFactory;
use LunixREST\Endpoint\Exceptions\UnknownEndpointException;

class NamespaceEndpointFactory implements EndpointFactory
{

    protected $endpointNamespace;

    /**
     * NamespaceEndpointFactory constructor.
     * @param string $endpointNamespace
     */
    public function __construct(string $endpointNamespace)
    {
        $this->endpointNamespace = $endpointNamespace;
    }

    /**
     * @param string $name
     * @param string $version
     * @return Endpoint
     * @throws UnknownEndpointException
     */
    public function getEndpoint(string $name, string $version): Endpoint
    {
        $className = $this->buildVersionedEndpointNamespace($version) . $name;
        if (!class_exists($className)) {
            throw new UnknownEndpointException("Could not find $className");
        }

        return new $className();
    }

    /**
     * WARNING: Only will find already loaded classes (Won't work with autoloaders). Meant as a basic example.
     * @param string $version
     * @return string[]
     */
    public function getSupportedEndpoints(string $version): array
    {
        $classesInNamespace = [];

        $namespace = $this->buildVersionedEndpointNamespace($version);
        foreach (get_declared_classes() as $name) {
            if (strpos($name, $namespace) === 0) {
                $classesInNamespace[] = $name;
            }
        }

        return $classesInNamespace;
    }

    protected function buildVersionedEndpointNamespace(string $version): string
    {
        return $this->endpointNamespace . '\v' . str_replace('.', '_', $version) . '\\';
    }
}