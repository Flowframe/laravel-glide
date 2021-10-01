---
category: Getting started
title: Installation and setup
order: 3
---

You can install the package via composer:

```
composer require flowframe/laravel-glide
```

You can easily publish the config like so:

php artisan vendor:publish --tag=glide-config

## Usage

Once you've installed the package you can use the helper or Blade component. Be aware, we'll try to locate your image from the `storage/app` directory.

### Helper

```php
glide('my-image.png', [
    'w' => 1280,
    'h' => 640,
    'q' => 80,
]);
```

View all available params [here](https://glide.thephpleague.com/2.0/api/quick-reference/).

### Blade component

```php
<x-glide::image
    src="my-image.png"
    w="1280"
    h="640"
    q="80"
    alt="My image"
    fit="contain"
    format="webp"
    :params="[
        // ... glide params
    ]"
/>
```

By default, we don't set an explicit width and height on the image element. `w` & `h` is solely used for Glide.

View all available params [here](https://glide.thephpleague.com/2.0/api/quick-reference/).

## Config

The `server_config` follows the [regular config](https://glide.thephpleague.com/2.0/config/setup/) provided by `League\Glide\ServerFactory`. The only difference is that we've prepared it work with Laravel out of the box.

```php
return [

    'server_config' => [

        'cache_path_prefix' => '.glide-image-cache',

        'base_url' => 'glide-image',

    ],

];
```

## Clearing the cache

You can clear the cache by running:

```
php artisan laravel-glide:clear-image-cache
```

Keep in mind that rebuilding the cache will increase loading times.

## Cloudflare CDN best practice

When your application uses the Cloudflare Proxy, and you want your Glide files to be served via Cloudflare's CDN, your routes need to be stateless. Stateless route need to match their [Default Cache Behavior](https://developers.cloudflare.com/cache/about/default-cache-behavior). For example, the URL needs to have a [file extension](https://developers.cloudflare.com/cache/about/default-cache-behavior#default-cached-file-extensions) like `.png`.

Note: when your application sets a `session-id` on the response (for the specific URI), it won't be cached in Cloudflare Proxy.

By default, Cloudflare caches the response on their proxy-server ([Edge Cache TTL](https://developers.cloudflare.com/cache/about/edge-browser-cache-ttl)) for a maximum time. You can define in your Cloudflare Account a longer period.

When the requested URI doesn't match the Default Cache Behavior, you can make a custom rule to set `Cache Level = Cache Everything`.

Want to check if the response is cached via Cloudflare Proxy? Take a look at [their documentation](https://developers.cloudflare.com/cache/about/default-cache-behavior#cloudflare-cache-responses) how you can validate this.
