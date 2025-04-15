<div class="with-image-overlay-gradient">
    <div class="h-100 d-flex flex-column">
        <div class="box-name">
            <div class="avatar">
                <img src="{{ asset($avatarSrc) }}" alt="{{ $name }}" class="img-fluid gallery-img" width="46" height="46">
            </div>
            <div class="name fw-bolder">{{ $name }}</div>
        </div>
        <div class="box-text">
            @foreach ($reviewTexts as $text)
                <p class="text-pretty paragraph mt-4">{!! $text !!}</p>
            @endforeach
        </div>
        @if (isset($buttonLink) && isset($buttonText))
            <a href="{{ $buttonLink }}" class="btn btn-underline-white text-start text-black gap-3">
                {{ $buttonText }}
            </a>
        @endif
    </div>
</div>
