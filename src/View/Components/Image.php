<?php

namespace Flowframe\LaravelGlide\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Image extends Component
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

    public function image(): string
    {
        return glide($this->src, array_filter([
            'w' => $this->width,
            'h' => $this->height,
            'fm' => $this->format,
            'fit' => $this->fit,
            'q' => $this->quality,
        ]));
    }

    public function render(): View
    {
        return view('glide::components.image');
    }
}
