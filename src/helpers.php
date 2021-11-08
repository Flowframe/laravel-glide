<?php

use Flowframe\LaravelGlide\Glide;

if (! function_exists('glide')) {
    function glide(string $image, array $params): string
    {
        return Glide::buildUrl($image, $params);
    }
}
