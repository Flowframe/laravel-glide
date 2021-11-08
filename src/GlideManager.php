<?php

namespace Flowframe\LaravelGlide;

use League\Glide\Urls\UrlBuilderFactory;

class GlideManager
{
    public function buildUrl(string $path, array $params): string
    {
        $urlBuilder = UrlBuilderFactory::create(
            config('glide.server_config.base_url'),
            config('glide.sign_key'),
        );

        return url($urlBuilder->getUrl($path, $params));
    }
}
