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

@section('title', 'Apartamenty Talarowa 3')
@section('content')
    <x-breadcrumbs :items="[
        ['label' => 'Mieszkania', 'url' => route('pages.homepage')],
        ['label' => 'Warszawa', 'url' => route('pages.homepage')],
        ['label' => 'Apartamenty Talarowa 3', 'url' => route('pages.estate', ['slug' => 'apartamenty-talarowa-3'])],
    ]" />

    {{-- 1 --}}
    <section class="margin-below-breadcrumb">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center" data-aos="fade" data-aos-delay="200">
                <div class=" col-12 col-lg-5 ">
                    <x-text-container titleTag="WARSZAWA, BIAŁOŁĘKA" title="Apartamenty <br/> Talarowa" :paragraphs="[
                        '<strong>Apartamenty Talarowa to projekt o ciekawej minimalistycznej architekturze, zlokalizowany na warszawskim Tarchominie. Miejsce pełne wygód ze znakomitą komunikacją. Bogata infrastruktura miejska w okolicy oraz łatwy i szybki dostęp do centrum sprawiają, że Apartamenty Talarowa to znakomita propozycja dla ceniących komfort codziennego życia. </strong>',
                        'Obiekt zaprojektowano z ogromną troską o detale, komfort mieszkańców oraz w oparciu o wysokiej klasy materiały wykończeniowe. Wszystkie kondygnacje są dostępne bezpośrednio z poziomu parkingu podziemnego. Zaplanowano tu 52 mieszkania o metrażach od 38 m2 do 63 m2, w rozkładach od 1 do 4 pokojowych',
                    ]"
                        link="{{ route('pages.estate') . '#znajdz-swoje-mieszkanie' }}" buttonText="DOSTĘPNE MIESZKANIE" />

                </div>
                <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                    <x-picture webpSmall="images/apartments/ap-4.webp" webpLarge="images/apartments/ap-4@2x.webp"
                        pngSmall="images/apartments/ap-4.png" pngLarge="images/apartments/ap-4@2x.png"
                        defaultSrc="images/apartments/ap-4@2x.png" alt="EP Development Blok mieszkalny" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    {{-- 2 --}}
    <section class="margin-xs">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center" data-aos="fade" data-aos-delay="200">
                <div class="order-2 order-lg-0 col-12 col-lg-6 d-flex ">
                    <x-picture webpSmall="images/apartments/ap-5.webp" webpLarge="images/apartments/ap-5@2x.webp"
                        pngSmall="images/apartments/ap-5.png" pngLarge="images/apartments/ap-5@2x.png"
                        defaultSrc="images/apartments/ap-5@2x.png" alt="EP Development Blok mieszkalny" class="img-fluid" />
                </div>
                <div class="order-1 col-12 col-lg-5 offset-lg-1">
                    <x-text-container :paragraphs="[
                        '<strong>Budynek to projekt o minimalistycznej, klasycznej architekturze i jasnej kolorystyce. </strong>',
                        'Obiekt zaprojektowano z ogromną troską o detale, komfort mieszkańców oraz w oparciu o wysokiej klasy materiały wykończeniowe. Wszystkie kondygnacje są dostępne bezpośrednio z poziomu parkingu podziemnego cichobieżnymi windami osobowymi.',
                    ]" link="{{ route('pages.estate') . '#znajdz-swoje-mieszkanie' }}"
                        buttonText="DOSTĘPNE MIESZKANIE" />
                </div>
            </div>
        </div>
    </section>

    {{-- 3 --}}
    <section class="margin-xs">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center" data-aos="fade" data-aos-delay="200">
                <div class=" col-12 col-lg-5 ">
                    <x-text-container :paragraphs="[
                        '<strong>Ogromnym atutem inwestycji jest jej lokalizacja.Jeżeli jesteś osobą aktywną, lubisz sport i wypoczynek na świeżym powietrzu a cenisz ponad miarę wygodę w dostępie do komunikacji - mieszkanie w tym miejscu będzie idealnym wyborem. W 3 minuty spacerem dojdziesz do najbliższego przystanku autobusowego, w 6 minut do tramwajowego.</strong>',
                        'Zielone otoczenie pozwoli Ci w pełni czerpać z pobliskich terenów rekreacyjnych. W najbliższej okolicy znajduje się Park Ogrody Mehoffera, zielone tereny nad Wisłą oraz Park Leśny. Galeria Północna, Urząd Dzielnicy Białołęka oraz ośrodek zdrowia oddalone są zaledwie 5 minut jazdy samochodem.',
                        'Dojazd autem przez Most Północny do Galerii Młociny i stacji metra zajmuje ok. 10 min. dzięki temu sprawnie i wygodnie możesz dotrzeć do innych części miasta.',
                    ]" link="{{ route('pages.estate') . '#znajdz-swoje-mieszkanie' }}"
                        buttonText="DOSTĘPNE MIESZKANIE" />
                </div>
                <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                    <x-picture webpSmall="images/apartments/people.webp" webpLarge="images/apartments/people@2x.webp"
                        pngSmall="images/apartments/people.png" pngLarge="images/apartments/people@2x.png"
                        defaultSrc="images/apartments/people@2x.png" alt="EP Development rodzina  w zieleni"
                        class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    {{-- 4 --}}
    <section class="margin-xs">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center" data-aos="fade" data-aos-delay="200">
                <div class="order-2 order-lg-0 col-12 col-lg-6 d-flex ">
                    <iframe src="https://dronesandengineering.com/deweloperzy/janpul_developer/future_gardens_2022_10/"
                        class="img-fluid iframe-map" frameborder="0"></iframe>
                </div>
                <div class="order-1 col-12 col-lg-5 offset-lg-1">
                    <x-text-container :paragraphs="[
                        '<strong>Tarchomin to część warszawskiej dzielnicy Białołęka o bardzo dobrze rozwiniętej infrastrukturze. Zapewnia to szybki dostęp do obiektów handlowo-usługowych, ośrodków rekreacyjno-sportowych, sklepów oraz szkół i przedszkoli. </strong>',
                        'W połączeniu ze spokojną i cichą okolicą sprawia, że z przyjemnością tutaj zamieszkasz a zalety tej okolicy doceni również Twoja rodzina. To właśnie w pobliżu znajduje się wszystko, czego potrzebujesz, by kameralnie i komfortowo zamieszkać.',
                    ]" link="{{ route('pages.estate') . '#znajdz-swoje-mieszkanie' }}"
                        buttonText="DOSTĘPNE MIESZKANIE" />
                </div>
            </div>
        </div>
    </section>

    {{-- 5 - SEARCH --}}
    <div class="container margin-xs" id="znajdz-swoje-mieszkanie">
        <div class="text-center">
            <div class="title-tag-sm" data-aos="fade">APARTAMENTY TALAROWA</div>
            <div class="header-1" data-aos="fade-up" data-aos-delay="200"r>Znajdź swoje mieszkanie</div>
        </div>
    </div>
    <div class="container mt-3 mt-lg-5 mb-5 mb-xl-3">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <x-search-estate :floors="[
                    0 => 'Parter',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                ]" :rooms="5" :rangeMin="35" :rangeMax="95" />
            </div>
        </div>
    </div>

    <section class = "">
        <div class="container">
            <!-- BUTTONS -->
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <ul class="nav nav-pills gap-3 mb-3" id="pills-tab" role="tablist" data-aos="fade" data-aos-delay="200">
                        <!-- ROW -->
                        <li class="grid-btn" id="row-tab" role="tab" aria-controls="pills-row" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="28" viewBox="0 0 53 28">
                                <g id="Group_236" data-name="Group 236" transform="translate(-1521 -3777)">
                                    <g id="Group_226" data-name="Group 226" transform="translate(-73 -32)">
                                        <g id="Rectangle_344" data-name="Rectangle 344" transform="translate(1594 3831)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                        <g id="Rectangle_345" data-name="Rectangle 345" transform="translate(1594 3820)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                        <g id="Rectangle_346" data-name="Rectangle 346" transform="translate(1594 3809)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </li>
                        <!-- COLUMN -->
                        <li class="grid-btn active" id="column-tab" role="tab" aria-controls="pills-column"
                            aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="28" viewBox="0 0 39 28">
                                <g id="Group_235" data-name="Group 235" transform="translate(-1594 -3777)">
                                    <g id="Rectangle_335" data-name="Rectangle 335" transform="translate(1594 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_343" data-name="Rectangle 343" transform="translate(1594 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_337" data-name="Rectangle 337" transform="translate(1608 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_342" data-name="Rectangle 342" transform="translate(1608 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_338" data-name="Rectangle 338" transform="translate(1622 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_341" data-name="Rectangle 341" transform="translate(1622 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                </g>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row gx-3 mt-5 d-none d-xl-flex apartments-titles apartments-titles-hide" data-aos="fade">
                <div class="d-flex  main-row-titles">
                    <div class="ap-column-title">
                        Status
                    </div>
                    <div class="ap-column-title ap-apartment">
                        MIESZKANIE
                    </div>
                    <div class="d-flex inner-row-titles">
                        <div class="ap-column-title ap-squares">POWIERZCHNIA</div>
                        <div class="ap-column-title ap-balcoon">
                            BALKON/OGRÓD
                        </div>
                        <div class="ap-column-title ap-level">PIĘTRO</div>
                        <div class="ap-column-title ap-rooms">POKOJE</div>
                    </div>

                    <div class="ap-column-title ap-rzut">RZUT</div>
                    <div class="ap-column-title"></div>
                </div>
            </div>
            <div class="row gy-3 apartment-box-container switch">
                <x-apartment-box status="1" title="Mieszkanie AT-A01" size="54,84" type="Ogród" floor="Parter"
                    pdfLink="link-do-pdf.pdf" detailsLink="{{ route('pages.estate-single') }}" rooms="3"
                    webpSmall="images/reusable/project-small.webp" webpLarge="images/reusable/project-small@2x.webp"
                    pngSmall="images/reusable/project-small.png" pngLarge="images/reusable/project-small@2x.png"
                    defaultSrc="images/reusable/project-small@2x.png" alt="EP Development wnętrze"
                    lightboxSrc="images/reusable/project-small@2x.png" />
                <x-apartment-box status="2" title="Mieszkanie AT-A01" size="54,84" type="Ogród" floor="Parter"
                    pdfLink="link-do-pdf.pdf" detailsLink="{{ route('pages.estate-single') }}" rooms="3"
                    webpSmall="images/reusable/project-small.webp" webpLarge="images/reusable/project-small@2x.webp"
                    pngSmall="images/reusable/project-small.png" pngLarge="images/reusable/project-small@2x.png"
                    defaultSrc="images/reusable/project-small@2x.png" alt="EP Development wnętrze"
                    lightboxSrc="images/reusable/project-small@2x.png" />
                <x-apartment-box status="3" title="Mieszkanie AT-A01" size="54,84" type="Ogród" floor="Parter"
                    pdfLink="link-do-pdf.pdf" detailsLink="{{ route('pages.estate-single') }}" rooms="3"
                    webpSmall="images/reusable/project-small.webp" webpLarge="images/reusable/project-small@2x.webp"
                    pngSmall="images/reusable/project-small.png" pngLarge="images/reusable/project-small@2x.png"
                    defaultSrc="images/reusable/project-small@2x.png" alt="EP Development wnętrze"
                    lightboxSrc="images/reusable/project-small@2x.png" />
                <x-apartment-box status="1" title="Mieszkanie AT-A01" size="54,84" type="Ogród" floor="Parter"
                    pdfLink="link-do-pdf.pdf" detailsLink="{{ route('pages.estate-single') }}" rooms="3"
                    webpSmall="images/reusable/project-small.webp" webpLarge="images/reusable/project-small@2x.webp"
                    pngSmall="images/reusable/project-small.png" pngLarge="images/reusable/project-small@2x.png"
                    defaultSrc="images/reusable/project-small@2x.png" alt="EP Development wnętrze"
                    lightboxSrc="images/reusable/project-small@2x.png" />

            </div>
            <!-- PAGINATION -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979"
                                            viewBox="0 0 7.675 13.979">
                                            <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                                d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979"
                                            viewBox="0 0 7.675 13.979">
                                            <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                                d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                                                transform="translate(7.675 13.979) rotate(180)" fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    {{-- Contact --}}

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

    {{--  <!-- Slider || Dziennik budowy  -->  --}}
    <section class="margin-xs overflow-x-hidden">
        <div class="container">
            <div class="header-1 mb-5" data-aos="fade">
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

    {{--  --}}
    <section class="margin-xs bg-custom-gray">
        <div class="container">
            <div class="row align-items-center gy-3 gy-xl-0">
                <div class="order-2 order-xl-0  col-12 col-xl-6">
                    <div class="" dir="rtl">
                        <x-picture webpSmall="images/apartments/ap-finish.webp"
                            webpLarge="images/apartments/ap-finish@2x.webp" pngSmall="images/apartments/ap-finish.png"
                            pngLarge="images/apartments/ap-finish@2x.png" defaultSrc="images/apartments/ap-finish@2x.png"
                            alt="EP Development wnętrze " class="img-contact img-contact-left" />
                    </div>
                </div>
                <div class="order-1 col-12 col-xl-6 ps-xl-4">
                    <x-text-container :paragraphs="[
                        '<strong>Pragnąc zapewnić Państwu kompleksową obsługę, nawiązaliśmy współpracę z Pracownią Architektury Wnętrz INTERIOR DESIGN STUDIO</strong>',
                        'INTERIOR DESIGN STUDIO łączy pasję do projektowania z wieloletnim doświadczeniem w zakresie usług wykończeniowych.',
                        'Skontaktuj się z Ekspertem wnętrz!',
                    ]" title="Interesuje Cię <br/> wykończenie pod klucz?" />
                    <a href="tel:+48 698 719 562" class="btn btn-primary btn-phone-big" data-aos="fade-up"
                        data-aos-delay="200">
                        ZADZWOŃ +48 698 719 562
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{--  --}}
    <section class="mt-5 mt-xl-0 overflow-x-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-xl-6">
                    <x-text-container :paragraphs="[
                        '<strong>Dla naszych Klientów ubiegających się o kredyt hipoteczny oferujemy bezpłatne wsparcie ekspertów finansowych.</strong>',
                        'Doradcy pomogą w wyborze najlepszego i najbardziej dopasowanego do możliwości finansowych kredytu, przygotują niezbędne dokumenty i złożą wnioski.',
                        'Zapraszamy do kontaktu',
                    ]" title="Kredyty hipoteczne" />
                    <div class="row">
                        <x-credit-box-item name="Aneta Jasińska - Gorzelak"
                            subtitle="Ekspert finansowy ds. kredytów hipotecznych" email="aneta.jasinska@grupaang.pl"
                            phoneNumber="+48 790 023 189" />
                        <x-credit-box-item name="Hubert Burkowski" subtitle="Ekspert finansowy ds. kredytów hipotecznych"
                            email="hubert.burkowski@hbfinanse.pl" phoneNumber="+48 793 353 021" />
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="">
                        <x-picture webpSmall="images/apartments/credit.webp" webpLarge="images/apartments/credit@2x.webp"
                            pngSmall="images/apartments/credit.png" pngLarge="images/apartments/credit@2x.png"
                            defaultSrc="images/apartments/credit@2x.png" alt="Ludzie w biurze"
                            class="img-contact img-contact-right" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#pills-tab .grid-btn');
        const pillsTab = document.getElementById('pills-tab');

        const elements = [{
                selector: '.apartments-titles',
                classToToggle: 'apartments-titles-hide'
            },
            {
                selector: '.apartment-box-container',
                classToToggle: 'switch'
            },
            {
                selector: '.ap-column-box',
                classToToggle: 'ap-column-switch'
            }
        ];

        function setColumnView() {
            tabs.forEach(t => t.classList.remove('active'));
            document.getElementById('column-tab').classList.add('active');

            elements.forEach(({
                selector,
                classToToggle
            }) => {
                document.querySelectorAll(selector).forEach(element => {
                    element.classList.add(classToToggle);
                });
            });
        }

        function setRowView() {
            tabs.forEach(t => t.classList.remove('active'));
            document.getElementById('row-tab').classList.add('active');

            elements.forEach(({
                selector,
                classToToggle
            }) => {
                document.querySelectorAll(selector).forEach(element => {
                    element.classList.remove(classToToggle);
                });
            });
        }

        function updateViewBasedOnScreenSize() {
            if (window.innerWidth < 1199.98) {
                setColumnView();
                pillsTab.style.display = 'none';
            } else {
                pillsTab.style.display = 'flex';
            }
        }

        // Initial check on page load
        updateViewBasedOnScreenSize();

        // Listen to window resize event
        window.addEventListener('resize', updateViewBasedOnScreenSize);

        // Tab click handling
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                if (tab.id === 'column-tab') {
                    setColumnView();
                } else if (tab.id === 'row-tab') {
                    setRowView();
                }
            });
        });
    });
</script>
