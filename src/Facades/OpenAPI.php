<?php

namespace Wulfheart\OpenAPI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wulfheart\OpenAPI\OpenAPI
 */
class OpenAPI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'openapi';
    }
}
