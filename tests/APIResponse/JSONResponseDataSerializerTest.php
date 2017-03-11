<?php
namespace LunixRESTBasics\APIResponse;

use LunixREST\APIResponse\APIResponseData;

class JSONResponseTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAsStringReturnsExpectedJSON()
    {
        $data = [
            "Key" => "Value",
            1 => [
                1,
                2,
                3
            ]
        ];
        $expectedData = json_encode($data);
        $serializer = new JSONResponseDataSerializer();

        $JSONResponse = $serializer->serialize(new APIResponseData($data));

        $this->assertEquals($expectedData, $JSONResponse->getContents());
    }
}
