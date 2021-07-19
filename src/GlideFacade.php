<?php

namespace Flowframe\LaravelGlide;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Flowframe\LaravelGlide\Glide
 * @method static string buildUrl(string $image, ?array $params)
 */
class GlideFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Glide::class;
    }
}
