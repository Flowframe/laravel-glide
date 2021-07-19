<?php

namespace Flowframe\LaravelGlide;

class Glide
{
    public function buildUrl(string $image, array $params): string
    {
        $query = http_build_query($params);

        return route('glide.image', "{$image}?{$query}");
    }
}
