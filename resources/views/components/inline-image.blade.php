@props(['array', 'id', 'class'])

@php
    $image = getInline($array, $id, 'file');
@endphp

@if($image)
    <img
            src="{{ asset($image['src']) }}"
            alt="{{ $image['file_alt'] }}"
            width="{{ $image['width'] }}"
            height="{{ $image['height'] }}"
            data-img="{{ $id }}"
            class="{{ $class }}"
    >
@endif