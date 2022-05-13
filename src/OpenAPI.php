<?php

namespace Wulfheart\OpenAPI;

use cebe\openapi\Reader;
use Illuminate\Support\Facades\Route;

class OpenAPI
{
    public static function register(string $path): void {
        $spec = Reader::readFromYamlFile($path);
        foreach ($spec->paths as $path => $definition) {
            foreach ($definition->getOperations() as $method => $operation) {
                $route = Route::match($method, $path);
                if($operation->operationId) {
                    $route->name($operation->operationId);
                }
            }
        }
    }


}
