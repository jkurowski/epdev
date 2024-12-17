@extends('layouts.page')
@section('meta_title', 'Dziennik budowy - ' . $article->title)


@php
    $galleryItems = [
        [
            'webpSmall' => 'images/gallery/gallery-1.webp',
            'webpLarge' => 'images/gallery/gallery-1@2x.webp',
            'pngSmall' => 'images/gallery/gallery-1.png',
            'pngLarge' => 'images/gallery/gallery-1@2x.png',
            'defaultSrc' => 'images/gallery/gallery-1@2x.png',
            'date' => '6 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-2.webp',
            'webpLarge' => 'images/gallery/gallery-2@2x.webp',
            'pngSmall' => 'images/gallery/gallery-2.png',
            'pngLarge' => 'images/gallery/gallery-2@2x.png',
            'defaultSrc' => 'images/gallery/gallery-2@2x.png',
            'date' => '8 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-1.webp',
            'webpLarge' => 'images/gallery/gallery-1@2x.webp',
            'pngSmall' => 'images/gallery/gallery-1.png',
            'pngLarge' => 'images/gallery/gallery-1@2x.png',
            'defaultSrc' => 'images/gallery/gallery-1@2x.png',
            'date' => '9 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-2.webp',
            'webpLarge' => 'images/gallery/gallery-2@2x.webp',
            'pngSmall' => 'images/gallery/gallery-2.png',
            'pngLarge' => 'images/gallery/gallery-2@2x.png',
            'defaultSrc' => 'images/gallery/gallery-2@2x.png',
            'date' => '12 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-1.webp',
            'webpLarge' => 'images/gallery/gallery-1@2x.webp',
            'pngSmall' => 'images/gallery/gallery-1.png',
            'pngLarge' => 'images/gallery/gallery-1@2x.png',
            'defaultSrc' => 'images/gallery/gallery-1@2x.png',
            'date' => '23 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-2.webp',
            'webpLarge' => 'images/gallery/gallery-2@2x.webp',
            'pngSmall' => 'images/gallery/gallery-2.png',
            'pngLarge' => 'images/gallery/gallery-2@2x.png',
            'defaultSrc' => 'images/gallery/gallery-2@2x.png',
            'date' => '12 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-1.webp',
            'webpLarge' => 'images/gallery/gallery-1@2x.webp',
            'pngSmall' => 'images/gallery/gallery-1.png',
            'pngLarge' => 'images/gallery/gallery-1@2x.png',
            'defaultSrc' => 'images/gallery/gallery-1@2x.png',
            'date' => '9 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-2.webp',
            'webpLarge' => 'images/gallery/gallery-2@2x.webp',
            'pngSmall' => 'images/gallery/gallery-2.png',
            'pngLarge' => 'images/gallery/gallery-2@2x.png',
            'defaultSrc' => 'images/gallery/gallery-2@2x.png',
            'date' => '3 października 2024',
        ],
    ];
@endphp

@section('title', 'Osiedle Pogodne')

@section('content')


    <section class="bg-white">
        @include('components.breadcrumbs', [
            'items' => [
                ['label' => 'Dziennik budowy', 'url' => route('front.investment.news')],
                ['label' => $article->title],
            ],
            'title' => $article->title,
            'backLink' => true,
        ])
    </section>

    @if($progressData->count() > 0)
    <section class="margin-xs overflow-x-hidden mt-5">
        <div class="row">
            <div class="col-12">
                <div class="site-record-book-slider mt-3">
                    @foreach ($progressData as $progress)
                        <div>
                            <div class="site-record-book-box {{ $progress['highlight'] ? 'highlight' : '' }}">
                                <div class="number">{{ $progress['number'] }}</div>
                                <div class="date-box">
                                    <div class="date">{{ $progress['date'] ?? '&nbsp;' }}</div>
                                </div>
                                <div class="dot">&nbsp;</div>
                                <div class="lane">&nbsp;</div>
                                <div class="title">{{ $progress['title'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="margin-xs overflow-x-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12 investment-news">
                    {!! parse_text($article->content) !!}
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CONTACT FORM -->
    <section class="margin-xs contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-lg-center">
                    <div class="title-container mb-4">
                        <div class="title-tag-sm mb-2" data-aos="fade" data-aos-delay="150">EP DEVELOPMENT</div>
                        <h2 class="header-1" data-aos="fade-up">Skontaktuj się z nami</h2>
                    </div>
                </div>
                <div class="col col-lg-8 offset-lg-2 col-xxl-6 offset-xxl-3">
                    <x-contact-form :terms="[
                        [
                            'id' => 'terms-1',
                            'label' =>
                                'Wyrażam zgodę na przetwarzanie moich danych osobowych w celu obsługi zapytania.',
                            'description' => 'Treść zgody na przetwarzanie danych osobowych.',
                        ],
                        [
                            'id' => 'terms-2',
                            'label' =>
                                'Wyrażam zgodę na wykorzystywanie przez EP Development Sp. z o.o. telekomunikacyjnych urządzeń',
                            'description' => 'Treść akceptacji regulaminu.',
                        ],
                        [
                            'id' => 'terms-3',
                            'label' =>
                                'Wyrażam zgodę na przetwarzanie moich danych osobowych przez EP Development Sp. z o.o. w celach',
                            'description' => 'Treść zgody na newsletter.',
                        ],
                        [
                            'id' => 'terms-4',
                            'label' =>
                                'Wyrażam zgodę na otrzymywanie drogą elektroniczną informacji handlowych od EP Development Sp.',
                            'description' => 'Treść zgody na newsletter.',
                        ],
                    ]" />
                </div>
            </div>
        </div>
    </section>

@endsection
