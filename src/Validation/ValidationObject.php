<?php

namespace Wulfheart\OpenAPI\Validation;

use cebe\openapi\spec\OpenApi;
use Illuminate\Pipeline\Pipeline;
use Wulfheart\OpenAPI\Validation\Validators\ControllerValidation;
use Wulfheart\OpenAPI\Validation\Validators\UniqueOperationIdValidation;

class ValidationObject
{
    /** @var array<\Wulfheart\OpenAPI\Validation\ValidationMessage> $messages */
    public array $messages = [];

    /** @var array<\Wulfheart\OpenAPI\Validation\IValidationPipe> $pipes */
    public array $pipes = [
        ControllerValidation::class,
        UniqueOperationIdValidation::class
    ];

    protected function __construct(
        public OpenApi $spec
    ){}

    public static function validate(OpenApi $spec): self{
        $validation = new self($spec);


        return app(Pipeline::class)
            ->send($validation)
            ->through($validation->pipes)
            ->thenReturn();
    }


    public function containsErrors(): bool {
        return collect($this->messages)
                ->filter(fn(ValidationMessage $m) => $m->level === ValidationMessageLevel::Error)
                ->count() > 0;
    }

}