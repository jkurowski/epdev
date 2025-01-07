@extends('layouts.page')
@section('meta_title', 'Kontakt')

@section('content')
    <x-breadcrumbs :items="[
        ['label' => 'Kontakt', 'url' => route('pages.contact')],
        ['label' => 'Biuro', 'url' => route('pages.contact-office')],
    ]" />


    {{--  --}}
    {{-- HERO  --}}
    {{--  --}}
    <section class="margin-below-breadcrumb">
        <div class="container">
            <div class="row align-items-center gy-5 gy-lg-0">
                <div class="col-12 col-lg-3 col-xl-2">
                    <x-text-container title="Kontakt" :paragraphs="[
                        'Szukasz mieszkania dla siebie lub swoich bliskich?',
                        'Odwiedź nasze biura sprzedaży w Warszawie i Nowym Dworze Mazowieckim',
                    ]"
                        link="{{ route('pages.contact-office') . '#kontakt' }}" buttonText="ZAPYTAJ O OFERTĘ" />
                </div>
                <div class="col-lg-8 col-xl-9 offset-lg-1">
                    <div class="" data-aos="fade" data-aos-delay="200">

                        <x-picture webpSmall="images/apartments/ap-7.webp" webpLarge="images/apartments/ap-7@2x.webp"
                            pngSmall="images/apartments/ap-7.png" pngLarge="images/apartments/ap-7@2x.png"
                            defaultSrc="images/apartments/ap-7@2x.png" alt="EP Development Blok mieszkalny"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  --}}
    {{-- OFFICES --}}
    {{--  --}}
    <section class="margin-xs d-none" id="biura">
        <div class="container">
            <x-contact.contact-office-boxes title="Warszawa" :offices="[
                [
                    'image' => [
                        'webpSmall' => 'images/offices/office-1.webp',
                        'webpLarge' => 'images/offices/office-1@2x.webp',
                        'pngSmall' => 'images/offices/office-1.png',
                        'pngLarge' => 'images/offices/office-1@2x.png',
                        'defaultSrc' => 'images/offices/office-1@2x.png',
                        'alt' => 'EP Development Blok mieszkalny',
                    ],
                    'listTitle' => 'Biuro sprzedaży Warszawa',
                    'location' => 'ul. Modlińska 201/32<br/> 03-122 Warszawa',
                    'phoneNumber' => '+48 531 329 392',
                    'email' => 'lead@epdevelopment.com.pl',
                ],
                [
                    'image' => [
                        'webpSmall' => 'images/offices/office-2.webp',
                        'webpLarge' => 'images/offices/office-2@2x.webp',
                        'pngSmall' => 'images/offices/office-2.png',
                        'pngLarge' => 'images/offices/office-2@2x.png',
                        'defaultSrc' => 'images/offices/office-2@2x.png',
                        'alt' => 'EP Development Blok mieszkalny',
                    ],
                    'listTitle' => 'Siedziba EP Development',
                    'location' => 'ul. Modlińska 201/32 <br/> 03-122 Warszawa',
                    'phoneNumber' => '+48 517 115 888',
                    'email' => 'sekretariat.waw@epdevelopment.com.pl',
                ],
            ]" />


        </div>
    </section>
    <section class="margin-below-breadcrumb d-none">
        <div class="container">
            <x-contact.contact-office-boxes title="Nowy Dwór Mazowiecki" :offices="[

                [
                    'image' => [
                        'webpSmall' => 'images/offices/office-3.webp',
                        'webpLarge' => 'images/offices/office-3@2x.webp',
                        'pngSmall' => 'images/offices/office-3.png',
                        'pngLarge' => 'images/offices/office-3@2x.png',
                        'defaultSrc' => 'images/offices/office-3@2x.png',
                        'alt' => 'EP Development Blok mieszkalny',
                    ],
                    'listTitle' => 'Biuro sprzedaży <br/> Nowy Dwór Mazowiecki',
                    'location' => 'ul. Jasna 15<br/>05-101 Nowy Dwór Mazowiecki',
                    'phoneNumber' => '+48 793 501 501',
                    'phoneNumberSecond' => '+48 513 231 231',
                    'email' => 'lead@epdevelopment.com.pl',
                ],
                [
                    'image' => [
                        'webpSmall' => 'images/offices/office-3.webp',
                        'webpLarge' => 'images/offices/office-3@2x.webp',
                        'pngSmall' => 'images/offices/office-3.png',
                        'pngLarge' => 'images/offices/office-3@2x.png',
                        'defaultSrc' => 'images/offices/office-3@2x.png',
                        'alt' => 'EP Development Blok mieszkalny',
                    ],
                    'listTitle' => 'Oddział<br/> EP Development',
                    'location' => 'ul. Jasna 15 <br/>05-101 Nowy Dwór Mazowiecki',
                    'phoneNumber' => '+48 517 115 777',
                    'email' => 'sekretariat.ndm@epdevelopment.com.pl',
                ],
            ]" />
        </div>
    </section>


    {{--  --}}
    {{-- CONTACT --}}
    {{--  --}}
    <section class="margin-xs contact-section d-none" id="kontakt">
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
