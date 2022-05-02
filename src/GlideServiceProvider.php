<?php

namespace Flowframe\LaravelGlide;

use Flowframe\LaravelGlide\View\Components\Image;
use Flowframe\LaravelGlide\View\Components\ResponsiveImage;
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
            ->hasViewComponents('glide', ResponsiveImage::class, Image::class)
            ->hasViews();
    }
}
