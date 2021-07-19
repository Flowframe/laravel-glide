<?php

namespace Flowframe\LaravelGlide;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GlideServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-glide')
            ->hasCommand(Commands\ClearGlideImageCache::class)
            ->hasConfigFile('glide')
            ->hasRoute('web')
            ->hasViews();
    }
}
