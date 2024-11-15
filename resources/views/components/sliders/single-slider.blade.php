@props(['images' => []])

<div class="single-slider">
    @foreach ($images as $image)
        <div class="slide">
            <x-picture :webpSmall="$image['webpSmall']" :webpLarge="$image['webpLarge']" :pngSmall="$image['pngSmall']" :pngLarge="$image['pngLarge']" :defaultSrc="$image['defaultSrc']"
                :alt="$image['alt']" class="img-fluid" />
        </div>
    @endforeach
</div>

<div class="slick-slider-single-btns">
    <button type="button" class="slick-slider-single-prev slick-prev" aria-label="Poprzedni slajd">
        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979" viewBox="0 0 7.675 13.979">
            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                transform="translate(7.675 13.979) rotate(180)" fill="currentColor" />
        </svg>
    </button>
    <button type="button" class="slick-slider-single-next slick-next" aria-label="Następny slajd">
        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979" viewBox="0 0 7.675 13.979">
            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z" fill="currentColor" />
        </svg>
    </button>
</div>
