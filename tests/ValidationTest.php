<?php

use cebe\openapi\Reader;
use Wulfheart\OpenAPI\Validation\ValidationMessage;
use Wulfheart\OpenAPI\Validation\ValidationMessageLevel;
use Wulfheart\OpenAPI\Validation\ValidationObject;
use Wulfheart\OpenAPI\Validation\Validators\ControllerValidation;

it('can test', function () {

    $spec = Reader::readFromYamlFile(__DIR__ . DIRECTORY_SEPARATOR . 'openapi-with-messages.yaml');
    $validated = ValidationObject::validate($spec);

    expect($validated->containsErrors())->toBeTrue();

    $controllerValidationErrorCount = collect($validated->messages)->filter(fn(ValidationMessage $m) => $m->level === ValidationMessageLevel::Error && $m->origin === ControllerValidation::class)->count();

    expect($controllerValidationErrorCount)->toBe(2);

});
