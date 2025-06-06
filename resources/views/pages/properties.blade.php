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
        ['label' => 'Mieszkania', 'url' => route('pages.properties')],
    ]" />

   

    {{-- 5 - SEARCH --}}
    <div class="container margin-xs" id="znajdz-swoje-mieszkanie">
        <div class="text-center">
            <div class="header-1" data-aos="fade-up" data-aos-delay="200">Znajdź swoje mieszkanie</div>
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
                ]" :rooms="$rooms" :rangeMin="$rangeMin" :rangeMax="$rangeMax" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="28" viewBox="0 0 53 28"><g transform="translate(-1521 -3777)"><g transform="translate(-73 -32)"><g transform="translate(1594 3831)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g><g transform="translate(1594 3820)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g><g transform="translate(1594 3809)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g></g></g></svg>
                        </li>
                        <!-- COLUMN -->
                        <li class="grid-btn active" id="column-tab" role="tab" aria-controls="pills-column" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="28" viewBox="0 0 39 28"><g transform="translate(-1594 -3777)"><g transform="translate(1594 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1594 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1608 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1608 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1622 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1622 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g></g></svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row gy-3 apartment-box-container switch">
   
                @foreach ($properties as $property)
                @dump($property)
                @endforeach
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
                                            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
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
                                            <path d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
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

@endsection



