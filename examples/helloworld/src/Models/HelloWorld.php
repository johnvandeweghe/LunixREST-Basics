<?php
namespace HelloWorld\Models;

class HelloWorld
{

    protected $helloWorld = "HelloWorld";

    /**
     * @return array
     */
    public function getAsAssociativeArray(): array
    {
        return [
            "helloworld" => $this->helloWorld
        ];
    }
}
