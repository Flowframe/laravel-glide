<?php

namespace Flowframe\LaravelGlide\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearGlideImageCache extends Command
{
    public $signature = 'laravel-glide:clear-image-cache';

    public $description = 'Clears the Laravel Glide image cache';

    public function handle()
    {
        $this->info('Clearing image cache');

        $cache = config('glide.cache_path_prefix');

        if (! Storage::exists($cache)) {
            $this->error('No cache present!');

            return;
        }

        Storage::deleteDirectory($cache);

        $this->info('Cleared image cache');
    }
}
