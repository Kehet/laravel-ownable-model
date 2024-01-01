<?php

namespace Kehet\LaravelOwnableModel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelOwnableModelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *com
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('laravel-ownable-model');
    }
}
