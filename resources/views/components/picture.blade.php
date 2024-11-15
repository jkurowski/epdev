@if ($webpSmall || $webpLarge || $pngSmall || $pngLarge || $defaultSrc)
    <picture>
        @if ($webpSmall)
            <source srcset="{{ asset($webpSmall) }}" media="(max-width: 992px)" type="image/webp" />
        @endif

        @if ($webpLarge)
            <source srcset="{{ asset($webpLarge) }}" media="(min-width: 992px)" type="image/webp" />
        @endif

        @if ($pngSmall)
            <source srcset="{{ asset($pngSmall) }}" media="(max-width: 992px)" type="image/png" />
        @endif

        @if ($pngLarge)
            <source srcset="{{ asset($pngLarge) }}" media="(min-width: 992px)" type="image/png" />
        @endif

        @if ($jpgSmall)
            <source srcset="{{ asset($jpgSmall) }}" media="(max-width: 992px)" type="image/jpeg" />
        @endif

        @if ($jpgLarge)
            <source srcset="{{ asset($jpgLarge) }}" media="(min-width: 992px)" type="image/jpeg" />
        @endif

        @if ($defaultSrc)
            <img loading="lazy" class="{{ $class }}" src="{{ asset($defaultSrc) }}"
                @if ($width) width="{{ $width }}" @endif
                @if ($height) height="{{ $height }}" @endif alt="{{ $alt }}" />
        @endif
    </picture>
@endif
