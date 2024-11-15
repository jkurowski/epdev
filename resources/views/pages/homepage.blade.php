@extends('layouts.page')

@section('content')
    {{-- HERO SECTION --}}

    @php
        $sliderImages = [
            [
                'webpSmall' => 'images/apartments/ap-1.webp',
                'webpLarge' => 'images/apartments/ap-1@2x.webp',
                'pngSmall' => 'images/apartments/ap-1.png',
                'pngLarge' => 'images/apartments/ap-1@2x.png',
                'defaultSrc' => 'images/apartments/ap-1@2x.png',
                'alt' => 'EP Development Blok mieszkalny',
            ],
            [
                'webpSmall' => 'images/apartments/ap-2.webp',
                'webpLarge' => 'images/apartments/ap-2@2x.webp',
                'pngSmall' => 'images/apartments/ap-2.png',
                'pngLarge' => 'images/apartments/ap-2@2x.png',
                'defaultSrc' => 'images/apartments/ap-2@2x.png',
                'alt' => 'EP Development Blok mieszkalny',
            ],
            [
                'webpSmall' => 'images/apartments/ap-1.webp',
                'webpLarge' => 'images/apartments/ap-1@2x.webp',
                'pngSmall' => 'images/apartments/ap-1.png',
                'pngLarge' => 'images/apartments/ap-1@2x.png',
                'defaultSrc' => 'images/apartments/ap-1@2x.png',
                'alt' => 'EP Development Blok mieszkalny',
            ],
            [
                'webpSmall' => 'images/apartments/ap-2.webp',
                'webpLarge' => 'images/apartments/ap-2@2x.webp',
                'pngSmall' => 'images/apartments/ap-2.png',
                'pngLarge' => 'images/apartments/ap-2@2x.png',
                'defaultSrc' => 'images/apartments/ap-2@2x.png',
                'alt' => 'EP Development Blok mieszkalny',
            ],
        ];
    @endphp

    <section class="search-hero">
        <x-picture webpSmall="images/reusable/bg-hero.webp" webpLarge="images/reusable/bg-hero@2x.webp"
            pngSmall="images/reusable/bg-hero.png" pngLarge="images/reusable/bg-hero@2x.png"
            defaultSrc="images/reusable/bg-hero.png" alt="EP Development Blok mieszkalny" class="search-hero--img" />
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-md-8 col-lg-4 col-xxl-2 ">
                    <div class="position-relative">
                        <x-apartment-search-form :cities="['warszawa' => 'warszawa', 'nowy-dwor' => 'Nowy Dwór']" :range-min="35" :range-max="95" :levels="5" />
                        <div class="hero-phone-icon">
                            <a href="tel:+48 531 329 392">
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
        <div class="text-lg-center">
            <div class="header-section" data-aos="fade">Inwestycje</div>
        </div>
    </div>

    {{-- SLIDER-LEFT --}}
    <section class="margin-below-breadcrumb section-clip">
        <div class="container">
            <div class="slider-left">
                <div class="row gx-5 align-items-center">
                    <div class="order-1 col-12 col-xl-5">
                        <x-sliders.slick-slider :images="$sliderImages" position="left" />
                    </div>
                    <!-- TEXT -->
                    <div class="order-0 order-xl-2 col-12 col-xl-5 offset-xl-1">
                        <x-text-container titleTag="WARSZAWA" title="Apartamenty Talarowa 3" :paragraphs="[
                            '<strong>To projekt o ciekawej minimalistycznej architekturze, zlokalizowany na warszawskim Tarchominie.</strong>',
                            'Miejsce pełne wygód ze znakomitą komunikacją. Bogata infrastruktura miejska w okolicy oraz łatwy i szybki dostęp do centrum sprawiają, że Apartamenty Talarowa to znakomita propozycja dla ceniących komfort codziennego życia.',
                            'Obiekt zaprojektowano z ogromną troską o detale, komfort mieszkańców oraz w oparciu o wysokiej klasy materiały wykończeniowe. Wszystkie kondygnacje są dostępne bezpośrednio z poziomu parkingu podziemnego.',
                            'Zaplanowano tu 52 mieszkania o metrażach od 38 m2 do 63 m2, w rozkładach od 1 do 4 pokojowych.',
                        ]"
                            :link="route('pages.estate')" buttonText="DOSTĘPNE MIESZKANIE" />
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- SLIDER-RIGHT --}}
    <section class="margin-below-breadcrumb section-clip">
        <div class="container">
            <div class="slider-right">
                <div class="row gx-5 align-items-center">
                    <!-- TEXT -->
                    <div class="col-12 col-xl-5 offset-2xl-1">
                        <x-text-container titleTag="NOWY DWÓR MAZOWIECKI" title="Osiedle Jarzębinowa II" :paragraphs="[
                            '<strong>Nowoczesne osiedle mieszkaniowe, które łączy komfort życia w spokojnej zielonej okolicy z doskonałym dostępem do miejskiej infrastruktury.</strong>',
                            'Zaplanowano 141 mieszkań o metrażach od 37 m2 do 65 m2.',
                            'Inwestycja znajduje się w strategicznej części Nowego Dworu Mazowieckiego, co zapewnia wygodny dostęp do szkół, przedszkoli oraz obiektów sportowych. Bliskość komunikacji miejskiej oraz głównych dróg sprawia, że dojazd do centrum Warszawy jest szybki i komfortowy.',
                            'Nasze osiedle zostało zaprojektowane z myślą o wygodzie i estetyce.',
                            'Architektura budynku harmonijnie współgra z otaczającą zielenią, tworząc idealne miejsce do życia. Oferujemy różnorodne układy mieszkań.',
                            'W inwestycji kładziemy nacisk na najwyższą jakość materiałów oraz precyzję wykonania. Mieszkania są wyposażone w nowoczesne rozwiązania techniczne, a duże okna zapewniają doskonałe doświetlenie wnętrz. Przemyślane rozkłady pomieszczeń gwarantują maksymalny komfort użytkowania.',
                            'Jarzębinowa II to Twoje nowe miejsce na mapie Nowego Dworu Mazowieckiego.',
                        ]"
                            :link="route('pages.estate')" buttonText="DOSTĘPNE MIESZKANIE" />

                    </div>
                    {{-- SLIDER --}}
                    <div class="col-12 col-xl-5 offset-xl-1 slider-container">
                        <x-sliders.slick-slider :images="$sliderImages" position="right" />
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- o EP DEVELOPMENT  --}}
    <section class="margin-xs">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center">
                <div class="order-2 order-lg-0 col-12 col-lg-6 d-flex ">
                    <div class="" data-aos="fade" data-aos-delay="200">

                        <x-picture webpSmall="images/apartments/ap-2.webp" webpLarge="images/apartments/ap-2@2x.webp"
                            pngSmall="images/apartments/ap-2.png" pngLarge="images/apartments/ap-2@2x.png"
                            defaultSrc="images/apartments/ap-2@2x.png" alt="EP Development Blok mieszkalny"
                            class="img-fluid" />
                    </div>

                </div>
                <div class="order-1 col-12 col-lg-5 offset-lg-1">
                    <x-text-container title="o EP DEVELOPMENT" :paragraphs="[
                        '<strong>Jesteśmy dynamicznie rozwijającą się firmą developerską. Od 12 lat z powodzeniem realizujemy projekty mieszkaniowe na terenie Warszawy i okolic.</strong>',
                        'Stawiamy na innowacyjne rozwiązania architektoniczne, najwyższą jakość wykonania oraz zrównoważony rozwój, dbając o to, aby każda harmonijnie wpisywała się w otoczenie i spełniała oczekiwania naszych Klientów.',
                        'Dzięki wieloletniemu doświadczeniu oraz szerokiej wiedzy na temat rynku nieruchomości, zyskaliśmy zaufanie wielu zadowolonych Klientów, dla których stworzyliśmy przestrzenie, w których codzienność nabiera nowego wymiaru.',
                    ]" />
                    <div class="d-flex flex-wrap gap-5">
                        <div class="number-box " data-aos="fade" data-aos-delay="200">
                            <div class="number-box--img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="68.773" height="64.242"
                                    viewBox="0 0 68.773 64.242">
                                    <g id="map" transform="translate(-1697.673 -589.369)">
                                        <g id="Group_1213" data-name="Group 1213" transform="translate(1697.673 589.369)">
                                            <g id="Icons" transform="translate(0 0)">
                                                <path id="Path_351" data-name="Path 351"
                                                    d="M1807.4,633.9c-.03.03-.064.058-.1.088-.094.083-.2.163-.31.243a3.581,3.581,0,0,0-1,.962,37.2,37.2,0,0,0-1.458,6.413,4.23,4.23,0,0,0,1.254,2.682,4.265,4.265,0,0,1,1.159,1.862c.626,3.846.5,7.678.87,11.52a9.97,9.97,0,0,0,.623,2.318,6.366,6.366,0,0,1,.466,1.924c.031,1.323-.315,2.608-.245,3.935a.7.7,0,0,0,.352.572,21.777,21.777,0,0,0,4.71,1.715,15.589,15.589,0,0,1,4.312,1.71.907.907,0,0,1,.4.793c.018.328-.015.67-.01,1.006a2.593,2.593,0,0,0,.512,1.647,3.644,3.644,0,0,0,2.114,1.154c.8.195,1.373-.29,1.74-1.108.129-.289.237-.618.352-.907a3.072,3.072,0,0,1,.138-.286,11.466,11.466,0,0,1,3.148.671,1.8,1.8,0,0,1,.852.67.762.762,0,0,1,.05.457c-.019.18-.058.357-.082.529a1.769,1.769,0,0,0,.319,1.426,1.149,1.149,0,0,0,.459.342,3.362,3.362,0,0,0,1.054.2c.674.043,1.569.015,2.353.122a2.237,2.237,0,0,1,1.026.321,8.123,8.123,0,0,1,1.913,2.575,9.8,9.8,0,0,0,2.341,3.057,1.569,1.569,0,0,0,2,0c.288-.187.568-.449.852-.649.108-.077.2-.181.315-.158a.97.97,0,0,1,.534.366,5.925,5.925,0,0,1,.625.957,4.533,4.533,0,0,0,1.908,2.159.939.939,0,0,0,.365.056,7.58,7.58,0,0,0,1.174-.2c2.474-.557,8.156-2.2,9.084-2.385a2.115,2.115,0,0,1,2.176.83,5.617,5.617,0,0,0,1.875,1.4c1.3.524,2.719.626,4.063,1.024.65.191,1.317.417,1.946.672.015.006.61.257.732.3a.744.744,0,0,0,.926-.43,2.043,2.043,0,0,0-.123-1.211c-.263-.741-.819-1.724-.935-2.077-.693-2.142-1.066-3.627.131-5.641a17.294,17.294,0,0,1,4.339-4.939,27.649,27.649,0,0,0,3.369-1.867,2.992,2.992,0,0,0,1.216-2.748,4.529,4.529,0,0,0-1.48-2.572,5.447,5.447,0,0,1-1.4-1.8c-1.118-3.264-.894-6.889-2.074-10.116a7.142,7.142,0,0,0-1.512-1.942,6.242,6.242,0,0,1-.656-.776.684.684,0,0,1-.169-.381,1.527,1.527,0,0,1,.646-1.1,6.907,6.907,0,0,1,1.015-.646,13.03,13.03,0,0,0,1.523-.918,3.123,3.123,0,0,0,1.177-1.551,2.811,2.811,0,0,0-.058-1.437c-.25-1-.845-2.282-1.015-2.885-.509-1.794-1.321-5.791-2.237-8.667a11.323,11.323,0,0,0-1.326-3.018,8.487,8.487,0,0,0-3.429-2.707,2.063,2.063,0,0,0-.551-.012c-1.561.125-8.865.923-10.2.9a18.964,18.964,0,0,1-3.248-.488,11.71,11.71,0,0,0-3.561-.29,8.408,8.408,0,0,0-2.831,1.078,4.345,4.345,0,0,1-2.231.687,11.359,11.359,0,0,1-3.628-.889,4.256,4.256,0,0,1-1.764-1.269,2.194,2.194,0,0,1-.245-.727c-.14-.622-.244-1.366-.439-1.985-.31-.981-.873-1.656-1.766-1.713-4.411-.284-5.885.554-7.583,1.854a22.324,22.324,0,0,1-4.213,2.806,24.16,24.16,0,0,1-7.358,2.472c-.978.121-1.946.051-2.865.137a4.749,4.749,0,0,0-3,1.262.732.732,0,0,0-.221.423,1.224,1.224,0,0,0,.1.591c.114.291.37.778.563,1.211C1807.3,633.636,1807.363,633.8,1807.4,633.9Zm54.6-5.054a7.026,7.026,0,0,1,2.6,2.167,14.126,14.126,0,0,1,1.49,3.872c.756,2.675,1.411,5.824,1.846,7.358.147.517.606,1.53.891,2.44a5.1,5.1,0,0,1,.184.742.834.834,0,0,1,.012.333,1.767,1.767,0,0,1-.683.853,11.665,11.665,0,0,1-1.36.811c-1.213.671-2.278,1.457-2.381,2.87a2.778,2.778,0,0,0,.867,1.854c.312.352.677.71.995,1.06a2.691,2.691,0,0,1,.558.768c1.177,3.217.948,6.833,2.065,10.088a6.817,6.817,0,0,0,1.714,2.319,3.168,3.168,0,0,1,1.1,1.745,1.939,1.939,0,0,1-1.158,1.838c-.907.577-2.031.977-2.773,1.438a19.041,19.041,0,0,0-4.805,5.415c-1.44,2.426-1.094,4.21-.258,6.79.084.263.4.859.674,1.457-.49-.181-.993-.346-1.487-.491-1.3-.384-2.673-.472-3.937-.981a5.976,5.976,0,0,1-1.777-1.451,3.152,3.152,0,0,0-3.075-.855c-.931.187-6.634,1.834-9.116,2.392-.328.074-.68.133-.827.156a1.876,1.876,0,0,1-.577-.626c-.279-.42-.524-.91-.793-1.348a2.947,2.947,0,0,0-1.835-1.53,2.167,2.167,0,0,0-1.7.627,4.669,4.669,0,0,1-.574.43.252.252,0,0,1-.307.011,8.4,8.4,0,0,1-1.976-2.639,9.5,9.5,0,0,0-2.289-3,3.332,3.332,0,0,0-1.428-.552,15.973,15.973,0,0,0-2.2-.149c-.387-.011-.88-.078-1.037-.1a.642.642,0,0,1,.008-.3c.031-.226.082-.459.1-.7a2.071,2.071,0,0,0-.157-1.012,2.953,2.953,0,0,0-1.526-1.395,13.66,13.66,0,0,0-3.886-.829,1.083,1.083,0,0,0-.9.4,3.156,3.156,0,0,0-.494.936c-.1.268-.2.56-.319.8a1.721,1.721,0,0,1-.128.2c-.782-.195-1.193-.433-1.373-.77a2.262,2.262,0,0,1-.12-1.163,2.478,2.478,0,0,0-1.023-2.458,17.006,17.006,0,0,0-4.7-1.892,23.251,23.251,0,0,1-4.055-1.4c0-1.177.28-2.327.254-3.507a7.8,7.8,0,0,0-.546-2.359,8.649,8.649,0,0,1-.55-1.986c-.374-3.873-.249-7.734-.882-11.611a5.662,5.662,0,0,0-1.465-2.533,2.865,2.865,0,0,1-.929-1.766,37.181,37.181,0,0,1,.9-4.477,7.877,7.877,0,0,1,.375-1.26,3.094,3.094,0,0,1,.812-.678,2.183,2.183,0,0,0,.761-.936,1.689,1.689,0,0,0-.125-1.029c-.136-.345-.389-.886-.548-1.217a3.612,3.612,0,0,1,1.832-.606c.932-.087,1.913-.019,2.906-.142a25.614,25.614,0,0,0,7.809-2.607,23.578,23.578,0,0,0,4.443-2.948c1.484-1.136,2.785-1.816,6.64-1.568.194.012.285.18.374.363a4.035,4.035,0,0,1,.27.842c.125.546.212,1.131.334,1.614a3.139,3.139,0,0,0,.417,1.016,5.667,5.667,0,0,0,2.338,1.741,12.862,12.862,0,0,0,4.111,1.008,5.717,5.717,0,0,0,2.961-.84,7.012,7.012,0,0,1,2.344-.93,10.313,10.313,0,0,1,3.134.272,20.372,20.372,0,0,0,3.491.515c1.205.024,7.2-.606,9.629-.837.379-.036.711-.062.85-.073Z"
                                                    transform="translate(-1804.534 -622.699)" fill="#d7007a"
                                                    fill-rule="evenodd" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                            </div>
                            <div class="number">
                                <span data-number="12">12</span>
                            </div>
                            <span class="number-title">LAT <br />DOŚWIADCZENIA</span>
                        </div>
                        <div class="number-box " data-aos="fade" data-aos-delay="200">
                            <div class="number-box--img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="66.037" height="65.831"
                                    viewBox="0 0 66.037 65.831">
                                    <g id="cityscape" transform="translate(0 -0.796)">
                                        <g id="Group_1215" data-name="Group 1215" transform="translate(0 0.796)">
                                            <g id="Group_1214" data-name="Group 1214">
                                                <path id="Path_352" data-name="Path 352"
                                                    d="M65.056,50.485H58.594V42.471a.981.981,0,0,0-1.961,0V64.666H39.8V35.529H56.632v2.365a.981.981,0,1,0,1.961,0V34.549a.981.981,0,0,0-.981-.981h-13.4V1.777A.981.981,0,0,0,43.232.8h-20.4a.981.981,0,0,0-.981.981V16.448H9.167a.981.981,0,0,0-.981.981V41.542H.981A.981.981,0,0,0,0,42.523V65.647a.981.981,0,0,0,.981.981H65.056a.981.981,0,0,0,.981-.981V51.465A.981.981,0,0,0,65.056,50.485ZM8.186,64.666H1.961V43.5H8.186Zm20.4,0H10.148V59.243H28.585Zm0-13.988H19.746a.981.981,0,0,0,0,1.961h8.839v4.642H10.148V52.639h5.021a.981.981,0,0,0,0-1.961H10.148V46.036H28.585Zm0-6.6H10.148V39.432H28.585Zm0-6.6H10.148V32.829H28.585Zm0-6.6H10.148V26.226H28.585Zm0-6.6H10.148V18.41H28.585Zm9.254,10.284V64.666H30.546V17.429a.981.981,0,0,0-.981-.981H28.228V14.487a.981.981,0,0,0-1.961,0v1.961H23.815V2.757H42.251V33.568H38.82A.981.981,0,0,0,37.839,34.549ZM64.075,64.666H58.594V52.446h5.481Z"
                                                    transform="translate(0 -0.796)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1217" data-name="Group 1217" transform="translate(37.839 22.045)">
                                            <g id="Group_1216" data-name="Group 1216">
                                                <path id="Path_353" data-name="Path 353"
                                                    d="M294.358,165.543a.981.981,0,0,0-.981.981v2.942a.981.981,0,0,0,1.961,0v-2.942A.981.981,0,0,0,294.358,165.543Z"
                                                    transform="translate(-293.377 -165.543)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1219" data-name="Group 1219" transform="translate(32.053 22.045)">
                                            <g id="Group_1218" data-name="Group 1218">
                                                <path id="Path_354" data-name="Path 354"
                                                    d="M249.5,165.543a.981.981,0,0,0-.981.981v2.942a.981.981,0,0,0,1.961,0v-2.942A.981.981,0,0,0,249.5,165.543Z"
                                                    transform="translate(-248.516 -165.543)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1221" data-name="Group 1221" transform="translate(37.839 13.506)">
                                            <g id="Group_1220" data-name="Group 1220">
                                                <path id="Path_355" data-name="Path 355"
                                                    d="M294.358,99.34a.981.981,0,0,0-.981.981v2.942a.981.981,0,1,0,1.961,0v-2.942A.981.981,0,0,0,294.358,99.34Z"
                                                    transform="translate(-293.377 -99.34)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1223" data-name="Group 1223" transform="translate(32.053 13.506)">
                                            <g id="Group_1222" data-name="Group 1222">
                                                <path id="Path_356" data-name="Path 356"
                                                    d="M249.5,99.34a.981.981,0,0,0-.981.981v2.942a.981.981,0,1,0,1.961,0v-2.942A.981.981,0,0,0,249.5,99.34Z"
                                                    transform="translate(-248.516 -99.34)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1225" data-name="Group 1225" transform="translate(26.267 4.967)">
                                            <g id="Group_1224" data-name="Group 1224">
                                                <path id="Path_357" data-name="Path 357"
                                                    d="M204.635,33.137a.981.981,0,0,0-.981.981V37.06a.981.981,0,1,0,1.961,0V34.118A.981.981,0,0,0,204.635,33.137Z"
                                                    transform="translate(-203.654 -33.137)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1227" data-name="Group 1227" transform="translate(37.839 4.967)">
                                            <g id="Group_1226" data-name="Group 1226">
                                                <path id="Path_358" data-name="Path 358"
                                                    d="M294.358,33.137a.981.981,0,0,0-.981.981V37.06a.981.981,0,1,0,1.961,0V34.118A.981.981,0,0,0,294.358,33.137Z"
                                                    transform="translate(-293.377 -33.137)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1229" data-name="Group 1229" transform="translate(32.053 4.967)">
                                            <g id="Group_1228" data-name="Group 1228">
                                                <path id="Path_359" data-name="Path 359"
                                                    d="M249.5,33.137a.981.981,0,0,0-.981.981V37.06a.981.981,0,1,0,1.961,0V34.118A.981.981,0,0,0,249.5,33.137Z"
                                                    transform="translate(-248.516 -33.137)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1231" data-name="Group 1231" transform="translate(37.841 30.63)">
                                            <g id="Group_1230" data-name="Group 1230">
                                                <path id="Path_360" data-name="Path 360"
                                                    d="M293.844,232.257a.98.98,0,1,0,1.455,1.136A.987.987,0,0,0,293.844,232.257Z"
                                                    transform="translate(-293.389 -232.109)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1233" data-name="Group 1233" transform="translate(32.053 30.626)">
                                            <g id="Group_1232" data-name="Group 1232">
                                                <path id="Path_361" data-name="Path 361"
                                                    d="M249.5,232.075a.981.981,0,0,0-.981.981V236a.981.981,0,1,0,1.961,0v-2.942A.981.981,0,0,0,249.5,232.075Z"
                                                    transform="translate(-248.516 -232.075)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1235" data-name="Group 1235" transform="translate(32.053 56.369)">
                                            <g id="Group_1234" data-name="Group 1234">
                                                <path id="Path_362" data-name="Path 362"
                                                    d="M249.5,431.671a.981.981,0,0,0-.981.981v2.942a.981.981,0,0,0,1.961,0v-2.942A.981.981,0,0,0,249.5,431.671Z"
                                                    transform="translate(-248.516 -431.671)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1237" data-name="Group 1237" transform="translate(32.053 47.788)">
                                            <g id="Group_1236" data-name="Group 1236">
                                                <path id="Path_363" data-name="Path 363"
                                                    d="M249.5,365.139a.981.981,0,0,0-.981.981v2.942a.981.981,0,0,0,1.961,0V366.12A.981.981,0,0,0,249.5,365.139Z"
                                                    transform="translate(-248.516 -365.139)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1239" data-name="Group 1239" transform="translate(32.053 39.207)">
                                            <g id="Group_1238" data-name="Group 1238">
                                                <path id="Path_364" data-name="Path 364"
                                                    d="M249.5,298.608a.981.981,0,0,0-.981.981v2.942a.981.981,0,0,0,1.961,0v-2.942A.981.981,0,0,0,249.5,298.608Z"
                                                    transform="translate(-248.516 -298.608)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1241" data-name="Group 1241" transform="translate(41.811 56.071)">
                                            <g id="Group_1240" data-name="Group 1240">
                                                <path id="Path_365" data-name="Path 365"
                                                    d="M336,429.355h-10.85a.981.981,0,0,0,0,1.962H336a.981.981,0,1,0,0-1.962Z"
                                                    transform="translate(-324.17 -429.355)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1243" data-name="Group 1243" transform="translate(41.811 60.707)">
                                            <g id="Group_1242" data-name="Group 1242">
                                                <path id="Path_366" data-name="Path 366"
                                                    d="M336,465.3h-10.85a.981.981,0,0,0,0,1.961H336a.981.981,0,1,0,0-1.961Z"
                                                    transform="translate(-324.17 -465.299)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1245" data-name="Group 1245" transform="translate(41.811 51.435)">
                                            <g id="Group_1244" data-name="Group 1244">
                                                <path id="Path_367" data-name="Path 367"
                                                    d="M336,393.413h-10.85a.981.981,0,0,0,0,1.962H336a.981.981,0,1,0,0-1.962Z"
                                                    transform="translate(-324.17 -393.413)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1247" data-name="Group 1247" transform="translate(41.811 37.527)">
                                            <g id="Group_1246" data-name="Group 1246">
                                                <path id="Path_368" data-name="Path 368"
                                                    d="M336,285.583h-10.85a.981.981,0,0,0,0,1.962H336a.981.981,0,0,0,0-1.962Z"
                                                    transform="translate(-324.17 -285.583)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1249" data-name="Group 1249" transform="translate(41.811 46.799)">
                                            <g id="Group_1248" data-name="Group 1248">
                                                <path id="Path_369" data-name="Path 369"
                                                    d="M336,357.469h-10.85a.981.981,0,0,0,0,1.961H336a.981.981,0,1,0,0-1.961Z"
                                                    transform="translate(-324.17 -357.469)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1251" data-name="Group 1251" transform="translate(41.811 42.163)">
                                            <g id="Group_1250" data-name="Group 1250">
                                                <path id="Path_370" data-name="Path 370"
                                                    d="M336,321.527h-10.85a.981.981,0,0,0,0,1.962H336a.981.981,0,1,0,0-1.962Z"
                                                    transform="translate(-324.17 -321.527)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1253" data-name="Group 1253" transform="translate(4.093 45.062)">
                                            <g id="Group_1252" data-name="Group 1252">
                                                <path id="Path_371" data-name="Path 371"
                                                    d="M32.716,344a.981.981,0,0,0-.981.981v2.55a.981.981,0,0,0,1.961,0v-2.55A.981.981,0,0,0,32.716,344Z"
                                                    transform="translate(-31.735 -344.004)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1255" data-name="Group 1255" transform="translate(4.093 51.829)">
                                            <g id="Group_1254" data-name="Group 1254">
                                                <path id="Path_372" data-name="Path 372"
                                                    d="M32.716,396.469a.981.981,0,0,0-.981.981V400a.981.981,0,1,0,1.961,0v-2.55A.981.981,0,0,0,32.716,396.469Z"
                                                    transform="translate(-31.735 -396.469)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1257" data-name="Group 1257" transform="translate(4.093 58.596)">
                                            <g id="Group_1256" data-name="Group 1256">
                                                <path id="Path_373" data-name="Path 373"
                                                    d="M32.716,448.934a.981.981,0,0,0-.981.981v2.55a.981.981,0,0,0,1.961,0v-2.55A.981.981,0,0,0,32.716,448.934Z"
                                                    transform="translate(-31.735 -448.934)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1259" data-name="Group 1259" transform="translate(60.354 54.8)">
                                            <g id="Group_1258" data-name="Group 1258">
                                                <path id="Path_374" data-name="Path 374"
                                                    d="M468.921,419.5a.981.981,0,0,0-.981.981v2.776a.981.981,0,1,0,1.961,0v-2.776A.981.981,0,0,0,468.921,419.5Z"
                                                    transform="translate(-467.94 -419.501)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1261" data-name="Group 1261" transform="translate(45.514 19.691)">
                                            <g id="Group_1260" data-name="Group 1260">
                                                <path id="Path_375" data-name="Path 375"
                                                    d="M365.829,147.293H353.865a.981.981,0,0,0,0,1.962h11.964a.981.981,0,0,0,0-1.962Z"
                                                    transform="translate(-352.884 -147.293)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1263" data-name="Group 1263" transform="translate(52.575 23.81)">
                                            <g id="Group_1262" data-name="Group 1262">
                                                <path id="Path_376" data-name="Path 376"
                                                    d="M417.24,179.228h-8.63a.981.981,0,0,0,0,1.962h8.63a.981.981,0,0,0,0-1.962Z"
                                                    transform="translate(-407.629 -179.228)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1265" data-name="Group 1265" transform="translate(8.051 8.119)">
                                            <g id="Group_1264" data-name="Group 1264">
                                                <path id="Path_377" data-name="Path 377"
                                                    d="M72.036,57.571h-8.63a.981.981,0,0,0,0,1.961h8.63a.981.981,0,1,0,0-1.961Z"
                                                    transform="translate(-62.425 -57.571)" fill="#d7007a" />
                                            </g>
                                        </g>
                                        <g id="Group_1267" data-name="Group 1267" transform="translate(3.148 11.388)">
                                            <g id="Group_1266" data-name="Group 1266">
                                                <path id="Path_378" data-name="Path 378"
                                                    d="M34.019,82.916h-8.63a.981.981,0,0,0,0,1.961h8.63a.981.981,0,1,0,0-1.961Z"
                                                    transform="translate(-24.408 -82.916)" fill="#d7007a" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="number">
                                <span data-number="2000">2000</span>
                            </div>
                            <span class="number-title">ZADOWOLONYCH <br /> KLIENTÓW</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  --}}
    <section class="margin-xs">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center">
                <div class=" col-12 col-lg-5 ">
                    <x-text-container :paragraphs="[
                        '<strong>Dzięki wieloletniemu doświadczeniu oraz szerokiej wiedzy na temat rynku nieruchomości, zyskaliśmy zaufanie wielu zadowolonych Klientów, dla których stworzyliśmy przestrzenie, w których codzienność nabiera nowego wymiaru.</strong>',
                    ]" />
                </div>
                <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                    <div class="" data-aos="fade" data-aos-delay="200">

                        <x-picture webpSmall="images/apartments/ap-3.webp" webpLarge="images/apartments/ap-3@2x.webp"
                            pngSmall="images/apartments/ap-3.png" pngLarge="images/apartments/ap-3@2x.png"
                            defaultSrc="images/apartments/ap-3@2x.png" alt="EP Development Blok mieszkalny"
                            class="img-fluid" />
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
