<section class="bg-white">
    @include('components.breadcrumbs', [
        'items' => [
            ['label' => 'Inwestycje zrealizowane', 'url' => route('pages.completed-investments')],
            ['label' => $investment->name],
        ],
        'title' => $investment->name,
        'backLink' => false,
        'image' => [
            'webpSmall' => 'images/reusable/breadcrumbs-2.webp',
            'webpLarge' => 'images/reusable/breadcrumbs-2@2x.webp',
            'pngSmall' => 'images/reusable/breadcrumbs-2.png',
            'pngLarge' => 'images/reusable/breadcrumbs-2@2x.png',
            'defaultSrc' => 'images/reusable/breadcrumbs-2@2x.png',
            'alt' => 'Osiedle Sprawne',
        ],
    ])
</section>

<section class="margin-below-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12 completed-investments">
                <div class="d-flex flex-column gap-4">
                    {{-- <div class="title-container">
                        <div class="header-1" data-aos="fade-up">
                            {{ $investment->name }}
                        </div>
                    </div> --}}
                    <div class="text-container d-flex flex-column gap-3">
                        {!! $investment->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($investment->gallery && $investment->gallery->photos && $investment->gallery->photos->count() > 0)
    @php
        $images = $investment->gallery->photos
            ->map(function ($photo) {
                return [
                    'defaultSrc' => '/uploads/gallery/images/' . $photo->file,
                    'alt' => $photo->alt,
                ];
            })
            ->toArray();

    @endphp
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center ">
                    <x-sliders.single-slider :images="$images" />
                </div>
            </div>
        </div>
    </section>
@endif
