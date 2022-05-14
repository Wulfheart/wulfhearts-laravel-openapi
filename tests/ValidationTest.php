<?php

use cebe\openapi\Reader;
use Wulfheart\OpenAPI\Validation\ValidationMessage;
use Wulfheart\OpenAPI\Validation\ValidationMessageLevel;
use Wulfheart\OpenAPI\Validation\ValidationObject;
use Wulfheart\OpenAPI\Validation\Validators\UniqueOperationIdValidation;

it('can test', function () {

    $spec = Reader::readFromYamlFile(__DIR__ . DIRECTORY_SEPARATOR . 'openapi-with-messages.yaml');
    $validated = ValidationObject::validate($spec);

    expect($validated->containsErrors())->toBeTrue();

    $uniqueOperationIdValidationErrorCount = collect($validated->messages)->filter(fn(ValidationMessage $m) => $m->level === ValidationMessageLevel::Error && $m->origin === UniqueOperationIdValidation::class)->count();

    expect($uniqueOperationIdValidationErrorCount)->toBe(1);
});
