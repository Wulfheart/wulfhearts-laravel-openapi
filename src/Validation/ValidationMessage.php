<?php

namespace Wulfheart\OpenAPI\Validation;

class ValidationMessage
{
    public function __construct(
        public ValidationMessageLevel $level,
        public string $message,
        /** @var class-string $origin */
        public string $origin
    ){}
}