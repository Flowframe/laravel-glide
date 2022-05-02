<?php

use Flowframe\LaravelGlide\Http\Controllers\GenerateGlideImageController;
use Illuminate\Support\Facades\Route;

Route::get(
    config('glide.server_config.base_url') . '/{path}',
    GenerateGlideImageController::class
)->where('path', '.*');
