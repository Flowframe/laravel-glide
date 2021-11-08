<?php

namespace Flowframe\LaravelGlide\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Response;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Responses\SymfonyResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;

class GenerateGlideImageController
{
    public function __invoke(Filesystem $filesystem, string $path): mixed
    {
        $this->validateSignature($path);

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(request()),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.glide-cache',
            'base_url' => 'glide',
        ]);

        return $server->getImageResponse($path, request()->all());
    }

    protected function validateSignature(string $path): void
    {
        try {
            $basePath = config('glide.server_config.base_url');

            $fullPath = "{$basePath}/{$path}";

            SignatureFactory::create(config('glide.sign_key'))->validateRequest($fullPath, request()->query());
        } catch (SignatureException $exception) {
            abort(Response::HTTP_UNAUTHORIZED, $exception->getMessage());
        }
    }
}
