<?php

namespace Flowframe\LaravelGlide\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class ResponsiveImage extends Component
{
    public function __construct(
        public string $src,
        public string $alt = ' ',
        public ?int $width = null,
        public ?int $height = null,
        public string $format = 'webp',
        public string $fit = 'contain',
        public int $quality = 85,
    ) {
    }

    public function sizes(): Collection
    {
        return collect(config('glide.sizes'));
    }

    public function fallbackImage(): string
    {
        return glide($this->src, array_filter([
            'w' => $this->width,
            'h' => $this->height,
            'q' => $this->quality,
            'fm' => $this->format,
        ]));
    }

    public function responsiveImages(): string
    {
        return $this->sizes()->map(function (int $size): string {
            $image = glide($this->src, array_filter([
                'w' => $size,
                'q' => $this->quality,
                'fm' => $this->format,
            ]));

            return "{$image} {$size}w";
        })->join(',');
    }

    public function render(): View
    {
        return view('glide::components.responsive-image');
    }
}
