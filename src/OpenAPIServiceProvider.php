<?php

namespace Wulfheart\OpenAPI;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wulfheart\OpenAPI\Commands\OpenAPICommand;

class OpenAPIServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('openapi')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_openapi_table')
            ->hasCommand(OpenAPICommand::class);
    }
}
