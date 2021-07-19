@props(['src', 'width', 'height', 'alt' => ' ', 'quality' => 100, 'fit' => 'contain', 'format' => 'jpg', 'params' => []])

@php
$image = glide(
    $src,
    array_merge($params, [
        'w' => $width,
        'h' => $height,
        'q' => $quality,
        'fit' => $fit,
        'fm' => $format,
    ]),
);
@endphp

<img {{ $attributes }}
    src="{{ $image }}"
    alt="{{ $alt }}"
    width="{{ $width }}"
    height="{{ $height }}">
