@props(['items' => [], 'title' => '', 'backLink' => false, 'image' => []])

<div class="container ">
    <nav aria-label="Breadcrumb" class="pt-4">
        <div class="row">
            <div class="{{ !empty($image) ? 'col-12 col-md-6' : 'col-12' }}">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item">
                        <a href="{{ route('pages.homepage') }}">Strona główna</a>
                    </li>
                    @foreach ($items as $item)
                        @if ($loop->last)
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $item['label'] }}
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $item['url'] ?? '' }}">{{ $item['label'] }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($backLink && empty($image))
                        <li class="breadcrumb-item breadcrumb-item-back">
                            <a href="{{ url()->previous() }}">Wstecz</a>
                        </li>
                    @endif
                </ol>
                <h1 class="breadcrumb-title mb-0" data-aos="fade-right">{{ !empty($title) ? $title : '' }}</h1>
            </div>

            @if (!empty($image))
                <div class="d-none d-md-block col-md-6">
                    <x-picture :webpSmall="$image['webpSmall']" :webpLarge="$image['webpLarge']" :pngSmall="$image['pngSmall']" :pngLarge="$image['pngLarge']" :defaultSrc="$image['defaultSrc']"
                        :alt="$image['alt']" class="img-breadcrumbs" />
                </div>
            @endif
        </div>
    </nav>
</div>
