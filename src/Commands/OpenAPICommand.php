<?php

namespace Wulfheart\OpenAPI\Commands;

use Illuminate\Console\Command;

class OpenAPICommand extends Command
{
    public $signature = 'openapi';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
