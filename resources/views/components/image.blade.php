@props(['src', 'w', 'h', 'alt' => ' ', 'q' => 100, 'fit' => 'contain', 'format' => 'webp', 'params' => []])

@php
$image = glide(
    $src,
    array_merge($params, [
        'w' => $w,
        'h' => $h,
        'q' => $quality,
        'fit' => $fit,
        'fm' => $format,
    ]),
);
@endphp

<img
    {{ $attributes }}
    src="{{ $image }}"
    alt="{{ $alt }}"
>
