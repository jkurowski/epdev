@extends('layouts.page')

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
                ['label' => 'Dziennik budowy', 'url' => route('pages.construction-diary')],
                ['label' => 'Osiedle Pogodne'],
            ],
            'title' => 'Osiedle Pogodne',
            'backLink' => true,
        ])
    </section>


    <section class="margin-below-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 offset-md-1">
                    <div class="diary-hero">
                        <div class="diary-hero-data fw-bold">07.10.2024 </div>
                        <div class="diary-hero-title mt-3">Konstrukcja:</div>
                        <ul class="diary-hero-ul">
                            <li class="diary-hero-li">
                                wykonano konstrukcję dla poziomu +6 wraz z rozpoczęcie zbrojenia dla stropu nad kondygnacją
                                +6,
                            </li>
                            <li class="diary-hero-li">rozpoczęcie prac murowych dla poziomu -1 oraz 0,</li>
                            <li class="diary-hero-li"> rozpoczęto wykończenie pomieszczenia wymiennikowni.</li>
                        </ul>
                        <div class="diary-hero-title">Instalacje:</div>
                        <ul class="diary-hero-ul">
                            <li class="diary-hero-li">
                                rozpoczęto montaż niezbędnego osprzętu dla wymiennikowni,
                            </li>
                            <li class="diary-hero-li"> planowany montaż wymiennikowni to 28.10.</li>
                        </ul>

                        <a href="#" class="btn btn-simple-big mt-5">
                            WIĘCEJ
                        </a>

                        <div class="mt-5 d-flex gap-3 flex-wrap">
                            <a href="#" class="btn btn-simple-big active">
                                ETAP 1
                            </a>
                            <a href="#" class="btn btn-simple-big">
                                ETAP 2
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--  <!-- Slider || Dziennik budowy  -->  --}}
    <section class="margin-xs overflow-x-hidden">
        <div class="container">
            <div class="header-1 mb-5">
                Postęp prac
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <x-estate-record-book :steps="[
                    ['number' => 'I', 'title' => 'Start budowy', 'label' => '', 'date' => ''],
                    ['number' => 'II', 'title' => 'Stan zero', 'label' => '', 'date' => ''],
                    ['number' => 'III', 'title' => 'Stan surowy otwarty', 'label' => '', 'date' => ''],
                    ['number' => 'IV', 'title' => 'Stan surowy zamknięty', 'label' => '', 'date' => ''],
                    [
                        'number' => 'V',
                        'title' => 'Pozwolenie na użytkowanie',
                        'label' => 'Data:',
                        'date' => '14.06.2024',
                    ],
                    [
                        'number' => 'VI',
                        'title' => 'Przekazanie kluczy',
                        'label' => 'Planowana data:',
                        'date' => 'Q3 2024',
                    ],
                ]" />
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="margin-xs">
        <x-gallery :items="$galleryItems" />
    </section>

    <!-- 3. CONTACT FORM -->
    <section class="margin-xs contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-lg-center">
                    <div class="title-container mb-4">
                        <div class="title-tag-sm mb-2" data-aos="fade" data-aos-delay="150">
                            EP DEVELOPMENT
                        </div>
                        <h2 class="header-1" data-aos="fade-up">
                            Skontaktuj się z nami
                        </h2>
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
