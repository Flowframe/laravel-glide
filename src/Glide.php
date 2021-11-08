<?php

namespace Flowframe\LaravelGlide;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Flowframe\LaravelGlide\Glide
 * @method static string buildUrl(string $image, ?array $params)
 */
class Glide extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return GlideManager::class;
    }
}
