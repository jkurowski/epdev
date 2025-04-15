@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

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
                <div class=" col-12 col-lg-5">
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

    <div class="custom-container gallery-ap">
        <div class="row g-4">
            {{-- Iteruj przez elementy galerii --}}
            @foreach ($completed as $index => $i)
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="gallery-ap--box" data-aos="fade-right" data-aos-delay="{{ $index * 50 }}">
                        {{-- Picture component --}}
                        <a href="{{asset('investment/thumbs/'. $i->file_thumb) }}" data-gallery="gallery-gallery" class="glightbox ">
                            <img src="{{asset('investment/thumbs/'. $i->file_thumb) }}" loading="lazy" class="img-fluid gallery-ap--img" alt="{{ $i->name }}" />

                            {{-- Date overlay --}}
                            @if ($i->date_end)
                                <div class="gallery-ap--date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51.104" height="54.511" viewBox="0 0 51.104 54.511">
                                        <path id="Icon_metro-calendar" data-name="Icon metro-calendar"
                                              d="M19.605,22.37h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826Zm10.221,0h6.814v6.814H40.047ZM9.385,42.811H16.2v6.814H9.385Zm10.221,0h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826ZM19.605,32.59h6.814V39.4H19.605Zm10.221,0H36.64V39.4H29.826Zm10.221,0h6.814V39.4H40.047Zm-30.662,0H16.2V39.4H9.385ZM46.861,1.928V5.335H40.047V1.928H16.2V5.335H9.385V1.928H2.571V56.439h51.1V1.928H46.861Zm3.407,51.1H5.978V15.556h44.29Z"
                                              transform="translate(-2.571 -1.928)" fill="#fff" />
                                    </svg>
                                    <span>{{ $i->date_end }}</span>
                                </div>
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
