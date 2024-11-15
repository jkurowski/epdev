{{-- resources/views/components/slick-slider.blade.php --}}

@props([
    'images' => [],
    'position' => 'right',
])

<div class="slick-slider-{{ $position }}" @if ($position === 'left') dir="rtl" @endif>
    @foreach ($images as $image)
        <div class="with-image-overlay-gradient">
            <x-picture :webpSmall="$image['webpSmall']" :webpLarge="$image['webpLarge']" :pngSmall="$image['pngSmall']" :pngLarge="$image['pngLarge']" :defaultSrc="$image['defaultSrc']"
                :alt="$image['alt']" class="img-fluid" />
        </div>
    @endforeach
</div>

<div class="slick-slider-{{ $position }}-btns">
    <button type="button" class="slick-slider-{{ $position }}-prev slick-prev" aria-label="Poprzedni slajd">
        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979" viewBox="0 0 7.675 13.979">
            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                transform="translate(7.675 13.979) rotate(180)" fill="currentColor" />
        </svg>
    </button>
    <button type="button" class="slick-slider-{{ $position }}-next slick-next" aria-label="Następny slajd">
        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979" viewBox="0 0 7.675 13.979">
            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z" fill="currentColor" />
        </svg>
    </button>
</div>
