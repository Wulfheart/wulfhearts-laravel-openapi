<?php

namespace Wulfheart\OpenAPI\Validation;

use Closure;

/**
 * @internal
 */
interface IValidationPipe
{
    public function handle(ValidationObject $content, Closure $next);
}