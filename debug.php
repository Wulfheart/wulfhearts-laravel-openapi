<?php

include "vendor/autoload.php";

$filepath = __DIR__ . DIRECTORY_SEPARATOR . 'openapi.yaml';

\Wulfheart\OpenAPI\OpenAPI::register($filepath);
