<?php

namespace Wulfheart\OpenAPI\Validation\Validators;

use cebe\openapi\spec\Operation;
use cebe\openapi\spec\PathItem;
use Closure;
use Wulfheart\OpenAPI\Validation\IValidationPipe;
use Wulfheart\OpenAPI\Validation\ValidationMessage;
use Wulfheart\OpenAPI\Validation\ValidationMessageLevel;
use Wulfheart\OpenAPI\Validation\ValidationObject;

/**
 * @internal
 */
class UniqueOperationIdValidation implements IValidationPipe
{

    public function handle(ValidationObject $content, Closure $next)
    {
        $spec = $content->spec;

        $operation = collect($spec->paths)
            ->flatten()
            ->map(fn(PathItem $p) => $p->getOperations())
            ->flatten();

        $duplicates = $operation->collect()
            ->map(fn(Operation $o) => $o->operationId)
            ->duplicates();

        $duplicates->each(fn(string $id) => $content->addMessage(
            new ValidationMessage(
                ValidationMessageLevel::Error,
                "Duplicate operationId {$id} found",
                self::class
            )
        ));

        return $next($content);
    }
}