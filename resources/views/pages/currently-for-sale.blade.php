@extends('layouts.page')
@section('title', 'Aktualnie w sprzedaży')

@section('content')
    <section class="search-hero">
        <x-picture webpSmall="images/reusable/bg-hero.webp" webpLarge="images/reusable/bg-hero@2x.webp"
            pngSmall="images/reusable/bg-hero.png" pngLarge="images/reusable/bg-hero@2x.png"
            defaultSrc="images/reusable/bg-hero.png" alt="EP Development Blok mieszkalny" class="search-hero--img" />
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-md-8 col-lg-4 col-xxl-2 ">
                    <div class="position-relative">
                        <x-apartment-search-form />
                        <div class="hero-phone-icon">
                            <a href="{{ route('pages.contact-office') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                                    <g id="Group_937" data-name="Group 937" transform="translate(-1813 -872)">
                                        <circle id="Ellipse_22" data-name="Ellipse 22" cx="30" cy="30" r="30"
                                            transform="translate(1813 872)" fill="#d7007a" />
                                        <path id="Icon_feather-phone" data-name="Icon feather-phone"
                                            d="M30.918,23.818V28A2.791,2.791,0,0,1,27.877,30.8a27.614,27.614,0,0,1-12.042-4.284,27.209,27.209,0,0,1-8.372-8.372,27.614,27.614,0,0,1-4.284-12.1A2.791,2.791,0,0,1,5.956,3h4.186a2.791,2.791,0,0,1,2.791,2.4,17.916,17.916,0,0,0,.977,3.921,2.791,2.791,0,0,1-.628,2.944l-1.772,1.772a22.325,22.325,0,0,0,8.372,8.372l1.772-1.772a2.791,2.791,0,0,1,2.944-.628,17.916,17.916,0,0,0,3.921.977,2.791,2.791,0,0,1,2.4,2.833Z"
                                            transform="translate(1825.646 885.29)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <div class="container margin-below-breadcrumb">
        <div class="text-lg-center">`
            <div class="header-section" data-aos="fade">Lokale usługowe</div>
        </div>
    </div>


    <section class="mt-5">
        <div class="container">

            <section class = "" id="roomsList">
                <div class="container">
                    <!-- BUTTONS -->
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <ul class="nav nav-pills gap-3 mb-3" id="pills-tab" role="tablist" data-aos="fade"
                                data-aos-delay="200">
                                <!-- ROW -->
                                <li class="grid-btn" id="row-tab" role="tab" aria-controls="pills-row"
                                    aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="53" height="28"
                                        viewBox="0 0 53 28">
                                        <g id="Group_236" data-name="Group 236" transform="translate(-1521 -3777)">
                                            <g id="Group_226" data-name="Group 226" transform="translate(-73 -32)">
                                                <g id="Rectangle_344" data-name="Rectangle 344"
                                                    transform="translate(1594 3831)" fill="none" stroke="#000"
                                                    stroke-width="1">
                                                    <rect width="53" height="6" rx="2" stroke="none" />
                                                    <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                        fill="none" />
                                                </g>
                                                <g id="Rectangle_345" data-name="Rectangle 345"
                                                    transform="translate(1594 3820)" fill="none" stroke="#000"
                                                    stroke-width="1">
                                                    <rect width="53" height="6" rx="2" stroke="none" />
                                                    <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                        fill="none" />
                                                </g>
                                                <g id="Rectangle_346" data-name="Rectangle 346"
                                                    transform="translate(1594 3809)" fill="none" stroke="#000"
                                                    stroke-width="1">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="28"
                                        viewBox="0 0 39 28">
                                        <g id="Group_235" data-name="Group 235" transform="translate(-1594 -3777)">
                                            <g id="Rectangle_335" data-name="Rectangle 335"
                                                transform="translate(1594 3793)" fill="none" stroke="#000"
                                                stroke-width="1">
                                                <rect width="11" height="12" rx="2" stroke="none" />
                                                <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                                    fill="none" />
                                            </g>
                                            <g id="Rectangle_343" data-name="Rectangle 343"
                                                transform="translate(1594 3777)" fill="none" stroke="#000"
                                                stroke-width="1">
                                                <rect width="11" height="12" rx="2" stroke="none" />
                                                <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                                    fill="none" />
                                            </g>
                                            <g id="Rectangle_337" data-name="Rectangle 337"
                                                transform="translate(1608 3793)" fill="none" stroke="#000"
                                                stroke-width="1">
                                                <rect width="11" height="12" rx="2" stroke="none" />
                                                <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                                    fill="none" />
                                            </g>
                                            <g id="Rectangle_342" data-name="Rectangle 342"
                                                transform="translate(1608 3777)" fill="none" stroke="#000"
                                                stroke-width="1">
                                                <rect width="11" height="12" rx="2" stroke="none" />
                                                <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                                    fill="none" />
                                            </g>
                                            <g id="Rectangle_338" data-name="Rectangle 338"
                                                transform="translate(1622 3793)" fill="none" stroke="#000"
                                                stroke-width="1">
                                                <rect width="11" height="12" rx="2" stroke="none" />
                                                <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                                    fill="none" />
                                            </g>
                                            <g id="Rectangle_341" data-name="Rectangle 341"
                                                transform="translate(1622 3777)" fill="none" stroke="#000"
                                                stroke-width="1">
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
                        @if ($properties->count() > 0)
                            @foreach ($properties as $room)
                                @include('components.apartment-box', ['property' => $room])
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-12 text-center">
                                    <b>Brak wyników</b>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </section>


@endsection
