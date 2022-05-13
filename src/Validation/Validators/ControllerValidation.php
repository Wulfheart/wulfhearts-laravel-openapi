<?php

namespace Wulfheart\OpenAPI\Validation\Validators;

use cebe\openapi\spec\OpenApi;
use Closure;
use Wulfheart\OpenAPI\Validation\IValidationPipe;
use Wulfheart\OpenAPI\Validation\ValidationObject;

/**
 * @internal
 */
class ControllerValidation implements IValidationPipe
{

    public function handle(ValidationObject $content, Closure $next)
    {
        $spec = $content->spec;
        foreach ($spec->paths as $path => $definition) {
            foreach ($definition->getOperations() as $method => $operation) {
                
            }
        }
        return $next($content);
    }
}