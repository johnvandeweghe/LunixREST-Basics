<?php
namespace LunixRESTBasics\APIRequest\URLParser;

use LunixREST\RequestFactory\URLParser\Exceptions\UnableToProvideMIMEException;
use LunixREST\RequestFactory\URLParser\MIMEProvider;

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
