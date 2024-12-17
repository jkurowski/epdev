@extends('layouts.page')
@section('meta_title', 'o EP Development')

@php
    $galleryItems = [
        [
            'webpSmall' => 'images/gallery/gallery-3.webp',
            'webpLarge' => 'images/gallery/gallery-3@2x.webp',
            'pngSmall' => 'images/gallery/gallery-3.png',
            'pngLarge' => 'images/gallery/gallery-3@2x.png',
            'defaultSrc' => 'images/gallery/gallery-3@2x.png',
            'date' => '6 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-4.webp',
            'webpLarge' => 'images/gallery/gallery-4@2x.webp',
            'pngSmall' => 'images/gallery/gallery-4.png',
            'pngLarge' => 'images/gallery/gallery-4@2x.png',
            'defaultSrc' => 'images/gallery/gallery-4@2x.png',
            'date' => '8 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-5.webp',
            'webpLarge' => 'images/gallery/gallery-5@2x.webp',
            'pngSmall' => 'images/gallery/gallery-5.png',
            'pngLarge' => 'images/gallery/gallery-5@2x.png',
            'defaultSrc' => 'images/gallery/gallery-5@2x.png',
            'date' => '9 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-6.webp',
            'webpLarge' => 'images/gallery/gallery-6@2x.webp',
            'pngSmall' => 'images/gallery/gallery-6.png',
            'pngLarge' => 'images/gallery/gallery-6@2x.png',
            'defaultSrc' => 'images/gallery/gallery-6@2x.png',
            'date' => '12 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-7.webp',
            'webpLarge' => 'images/gallery/gallery-7@2x.webp',
            'pngSmall' => 'images/gallery/gallery-7.png',
            'pngLarge' => 'images/gallery/gallery-7@2x.png',
            'defaultSrc' => 'images/gallery/gallery-7@2x.png',
            'date' => '23 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-5.webp',
            'webpLarge' => 'images/gallery/gallery-5@2x.webp',
            'pngSmall' => 'images/gallery/gallery-5.png',
            'pngLarge' => 'images/gallery/gallery-5@2x.png',
            'defaultSrc' => 'images/gallery/gallery-5@2x.png',
            'date' => '9 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-4.webp',
            'webpLarge' => 'images/gallery/gallery-4@2x.webp',
            'pngSmall' => 'images/gallery/gallery-4.png',
            'pngLarge' => 'images/gallery/gallery-4@2x.png',
            'defaultSrc' => 'images/gallery/gallery-4@2x.png',
            'date' => '12 października 2024',
        ],
        [
            'webpSmall' => 'images/gallery/gallery-3.webp',
            'webpLarge' => 'images/gallery/gallery-3@2x.webp',
            'pngSmall' => 'images/gallery/gallery-3.png',
            'pngLarge' => 'images/gallery/gallery-3@2x.png',
            'defaultSrc' => 'images/gallery/gallery-3@2x.png',
            'date' => '3 października 2024',
        ],
    ];
@endphp

@section('content')
    @include('components.breadcrumbs', [
        'items' => [['label' => 'o EP Development']],
        'backLink' => false,
    ])

    <section class="margin-below-vreadcrumb">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center">
                <div class=" col-12 col-lg-5 ">
                    <x-text-container title="O nas" titleTag="EP DEVELOPMENT" :paragraphs="[
                        '<strong>Jesteśmy dynamicznie rozwijającą się firmą developerską. Od 12 lat z powodzeniem realizujemy
                                        projekty mieszkaniowe na terenie Warszawy i okolic.</strong>',
                        'Stawiamy na innowacyjne rozwiązania architektoniczne, najwyższą jakość wykonania oraz
                                        zrównoważony rozwój, dbając o to, aby każda harmonijnie wpisywała się w otoczenie i spełniała
                                        oczekiwania naszych Klientów.',
                        'Dzięki wieloletniemu doświadczeniu oraz szerokiej wiedzy na temat rynku nieruchomości, zyskaliśmy
                    zaufanie wielu zadowolonych Klientów, dla których stworzyliśmy przestrzenie, w których codzienność
                    nabiera nowego wymiaru.',
                    ]"
                        link="{{ route('pages.about-ep-development') . '#ep-development' }}" buttonText="CZYTAJ WIĘCEJ" />
                </div>
                <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                    <div class="" data-aos="fade" data-aos-delay="200">
                        <x-picture webpSmall="images/reusable/about-ep.webp" webpLarge="images/reusable/about-ep@2x.webp"
                            pngSmall="images/reusable/about-ep.png" pngLarge="images/reusable/about-ep@2x.png"
                            defaultSrc="images/reusable/about-ep@2x.png" alt="o EP Development" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="margin-xs" id="ep-development">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-lg-center">
                    <div class="title-container mb-4">
                        <div class="title-tag-sm mb-2 " data-aos="fade" data-aos-delay="150">
                            EP DEVELOPMENT
                        </div>
                        <h2 class="header-1 px-0" data-aos="fade-up">
                            100% oddanych mieszkań w terminie
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="margin-below-breadcrumb">
        <x-gallery-static :items="$galleryItems" />
    </section>

    @if (0 == 1)
    <x-recommendation-section buttonLink="{{ route('pages.about-ep-development') }}" buttonText="ZOBACZ WIĘCEJ ">
        <x-recommendation-slider-item name="Weronika S." avatarSrc="images/reusable/avatar.png" :reviewTexts="[
            '<strong>Lorem ipsum dolor sit amet,</strong> consetetur sadipscing elitr.',
            'Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.',
        ]"
            buttonText="OPINIE GOOGLE" />
        <x-recommendation-slider-item name="Weronika S." avatarSrc="images/reusable/avatar.png" :reviewTexts="[
            '<strong>Lorem ipsum dolor sit amet,</strong> consetetur sadipscing elitr.',
            'Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.',
        ]"
            buttonText="OPINIE GOOGLE" />

    </x-recommendation-section>
    @endif
@endsection
