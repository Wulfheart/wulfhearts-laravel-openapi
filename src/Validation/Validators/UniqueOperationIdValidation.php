<?php

namespace Wulfheart\OpenAPI\Validation\Validators;

use Closure;
use Wulfheart\OpenAPI\Validation\IValidationPipe;
use Wulfheart\OpenAPI\Validation\ValidationObject;

/**
 * @internal
 */
class UniqueOperationIdValidation implements IValidationPipe
{

    public function handle(ValidationObject $content, Closure $next)
    {

        return $next($content);
    }
}