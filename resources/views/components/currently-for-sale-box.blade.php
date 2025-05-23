@props([
    'webpSmall' => '',
    'webpLarge' => '',
    'pngSmall' => '',
    'pngLarge' => '',
    'defaultSrc' => '',
    'alt' => 'Image description',
    'subtitle' => 'Location',
    'title' => 'Title',
    'link' => '#',
    'start' => '',
    'file_thumb' => '',
    'id' => ''
])

<div class="col-lg-6 position-relative">
    <div class="currently-for-sale-box" data-aos="fade">
        <div class="image position-relative">
            <img class="img-fluid currently-for-sale--img" src="{{asset('investment/thumbs/'. $file_thumb) }}" alt="{{ $title }}">
            @if($start)
                <div class="date-start">{{ $start }}</div>
            @endif
        </div>
        <div class="subtitle mt-3">{{ $subtitle }}</div>
        <div class="title-box d-flex justify-content-between align-items-center">
            <div class="title">{{ $title }}</div>
            <a href="{{ $link }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <g transform="translate(-1262.5 -3375)">
                        <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                              transform="translate(1290.373 3406.367) rotate(180)" fill="#d7007a" />
                        <g transform="translate(1310.5 3423) rotate(180)"
                           fill="none" stroke="#d7007a" stroke-width="1">
                            <circle cx="24" cy="24" r="24" stroke="none" />
                            <circle cx="24" cy="24" r="23.5" fill="none" />
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <a class="currently-for-sale--a" href="{{ $link }}"></a>
    </div>
</div>
