<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

Route::get(config('glide.server_config')['base_url'] . '/{path}', function (Filesystem $filesystem, string $path) {
    $server = ServerFactory::create(array_merge([
        'response' => new LaravelResponseFactory(app('request')),
        'source' => $filesystem->getDriver(),
        'cache' => $filesystem->getDriver(),
    ], config('glide.server_config')));

    return $server->getImageResponse($path, request()->all());
})
    ->middleware('web')
    ->where('path', '.*')
    ->name('glide.image');
