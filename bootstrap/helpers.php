<?php

use Flowframe\LaravelGlide\GlideManager;

if (! function_exists('glide')) {
    function glide(string $image, array $params): string
    {
        return app(GlideManager::class)->buildUrl($image, $params);
    }
}
