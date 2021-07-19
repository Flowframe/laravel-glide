# Glide for Laravel

Optimize your images on the fly with [Glide](http://glide.thephpleague.com) for Laravel.

## Support us

[<img src="https://flowfra.me/github-ad.png" width="419px" />](https://flowfra.me/github-ad-click)

Like our work? You can support us by purchasing one of our products.

## Installation

You can install the package via composer:

```bash
composer require flowframe/laravel-glide
```

You can easily publish the config like so:

```bash
php artisan vendor:publish --tag=glide-config
```

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
    width="1280"
    height="640"
    quality="80"
    alt="My image"
    fit="contain"
    format="jpg"
    :params="[
        // ... glide params
    ]"
/>
```

We automatically transform the blade attributes to their respective Glide counterparts.

View all available params [here](https://glide.thephpleague.com/2.0/api/quick-reference/).

## Config

You may manually override the `base_url` and `cache_path_prefix`.

The `base_url` is used to create the route and identify images which have to be processed using Glide.

The `cache_path_prefix` will be used to store cached images.

We recommend to keep the defaults: `glide-image` & `.glide-image-cache`.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lars Klopstra](https://github.com/flowframe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
