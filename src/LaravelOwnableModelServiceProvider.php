<?php

namespace Kehet\LaravelOwnableModel;

use Kehet\LaravelOwnableModel\Commands\LaravelOwnableModelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelOwnableModelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ownable-model')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-ownable-model_table')
            ->hasCommand(LaravelOwnableModelCommand::class);
    }
}
