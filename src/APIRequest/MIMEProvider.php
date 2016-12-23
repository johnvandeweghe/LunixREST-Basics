<?php
namespace LunixRESTBasics\APIRequest;

/**
 * An interface for converting file extensions to a mime type.
 * Interface MIMEProvider
 * @package LunixRESTBasics\APIRequest
 */
interface MIMEProvider
{
    public function getAll(): array;

    public function getByFileExtension($extension): string;
}
