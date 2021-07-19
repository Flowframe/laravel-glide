<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

Route::get(config('glide.base_url') . '/{path}', function (Filesystem $filesystem, string $path) {
    $server = ServerFactory::create([
        'response' => new LaravelResponseFactory(app('request')),
        'source' => $filesystem->getDriver(),
        'cache' => $filesystem->getDriver(),
        'cache_path_prefix' => config('glide.cache_path_prefix'),
        'base_url' => config('glide.base_url'),
    ]);

    return $server->getImageResponse($path, request()->all());
})
    ->where('path', '.*')
    ->name('glide.image');
