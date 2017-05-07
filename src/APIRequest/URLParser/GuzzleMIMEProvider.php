<?php
namespace LunixRESTBasics\APIRequest\URLParser;

use LunixREST\APIRequest\URLParser\Exceptions\UnableToProvideMIMEException;
use LunixREST\APIRequest\URLParser\MIMEProvider;

class GuzzleMIMEProvider implements MIMEProvider
{
    /**
     * @param string $fileExtension
     * @return string
     * @throws UnableToProvideMIMEException
     */
    public function provideMIME(string $fileExtension): string
    {
        return \GuzzleHttp\Psr7\mimetype_from_extension($fileExtension);
    }
}
