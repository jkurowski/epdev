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
