@props(['src', 'w', 'h', 'alt' => ' ', 'q' => 100, 'fit' => 'contain', 'fm' => 'webp', 'params' => []])

@php
$image = glide(
    $src,
    array_merge($params, [
        'w' => $w,
        'h' => $h,
        'q' => $q,
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
