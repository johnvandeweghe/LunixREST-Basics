<?php
namespace LunixRESTBasics\APIRequest\RequestFactory;

use LunixREST\RequestFactory\DefaultRequestFactory;
use LunixRESTBasics\APIRequest\URLParser\BasicURLParser;

/**
 * A super basic RequestFactory. Uses a BasicURLParser, instantiated with a MIMEFileProvider
 * Class BasicRequestFactory
 * @package LunixRESTBasics\APIRequest\RequestFactory
 */
class BasicRequestFactory extends DefaultRequestFactory
{
    public function __construct()
    {
        parent::__construct(new BasicURLParser());
    }
}
