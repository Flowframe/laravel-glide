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

The `server_config` follows the [regular config](https://glide.thephpleague.com/2.0/config/setup/) provided by `League\Glide\ServerFactory`. The only difference is that we've prepared it work with Laravel out of the box.

```php
return [

    'server_config' => [

        'cache_path_prefix' => '.glide-image-cache',

        'base_url' => 'glide-image',

    ],
];
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lars Klopstra](https://github.com/flowframe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
