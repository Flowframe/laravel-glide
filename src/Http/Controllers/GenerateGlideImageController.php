<?php

namespace Flowframe\LaravelGlide\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;

class GenerateGlideImageController
{
    public function __invoke(
        Filesystem $filesystem,
        Request $request,
        string $path,
    ): mixed {
        $this->validateSignature($request, $path);

        $server = ServerFactory::create(array_merge([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
        ], config('glide.server_config')));

        return $server->getImageResponse($path, $request->all());
    }

    protected function validateSignature(Request $request, string $path): void
    {
        try {
            $basePath = config('glide.server_config.base_url');

            $fullPath = "{$basePath}/{$path}";

            SignatureFactory::create(config('glide.sign_key'))->validateRequest(
                $fullPath,
                $request->query(),
            );
        } catch (SignatureException $exception) {
            abort(Response::HTTP_UNAUTHORIZED, $exception->getMessage());
        }
    }
}
