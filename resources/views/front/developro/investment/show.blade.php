@extends('layouts.page', ['body_class' => 'investments'])
@section('meta_title', 'Inwestycje - ' . $investment->name)

@if ($investment->status == 2)

    @section('content')
        @include('pages.completed-investments-single', ['investment' => $investment])
    @endsection
@else
    @section('content')
        <x-breadcrumbs :items="[
            [
                'label' => $investment->city->name,
                'url' => route('front.developro.index', ['citySlug' => $investment->city->slug]),
            ],
            [
                'label' => $investment->name,
                'url' => route('front.developro.show', [
                    'citySlug' => $investment->city->slug,
                    'slug' => $investment->slug,
                ]),
            ],
        ]" />

        @foreach($investment->sections as $section)
        <section class="margin-below-breadcrumb">
            <div class="container">
                <div class="row gy-5 gy-lg-0 align-items-center">
                    <div class="col-12 col-lg-5">
                        <div class="d-flex flex-column gap-4">
                            @if($section->title)
                            <div class="title-container">
                                @if($section->subtitle)
                                <div class="title-tag mb-2">{{ $section->subtitle }}</div>
                                @endif
                                <div class="header-1">{{ $section->title }}</div>
                            </div>
                            @endif
                            <div class="text-container d-flex flex-column gap-3 text-pretty paragraph">
                                {!! $section->text !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                        @if($section->file)
                        <picture>
                            <source type="image/webp" srcset="{{asset('investment/sections/webp/'.$section->file_webp) }}">
                            <source type="image/jpeg" srcset="{{asset('investment/sections/'.$section->file) }}">
                            <img src="{{asset('investment/sections/'.$section->file) }}" alt="@if($section->file_alt){{$article->file_alt}}@else{{$section->title}}@endif" loading="lazy" class="img-fluid">
                        </picture>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        @endforeach

        {!! $investment->content !!}

        <div class="container margin-xs" id="znajdz-swoje-mieszkanie">
            <div class="text-center">
                <div class="title-tag-sm" data-aos="fade">{{ $investment->name }}</div>
                <div class="header-1" data-aos="fade-up" data-aos-delay="200"r>Znajdź swoje mieszkanie</div>
            </div>
        </div>
        <div class="container mt-3 mt-lg-5 mb-5 mb-xl-3">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <x-search-estate
                            :floors="$floors"
                            :rooms="5"
                            :rangeMin="$minRoomArea"
                            :rangeMax="$maxRoomArea"
                            :route="url('#mieszkania')"
                    />
                </div>
            </div>
        </div>
        @include('front.developro.investment_shared.list', ['investment' => $investment, 'properties' => $properties])

        <section class="margin-xs contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-lg-center">
                        <div class="title-container mb-4">
                            <div class="title-tag-sm mb-2" data-aos="fade" data-aos-delay="150">
                                EP DEVELOPMENT
                            </div>
                            <h2 class="header-1" data-aos="fade-up">
                                Zapytaj o mieszkanie
                            </h2>
                        </div>
                    </div>
                    <div class="col col-lg-8 offset-lg-2 col-xxl-6 offset-xxl-3">
                        <x-contact-form :investment="$investment" />
                    </div>
                </div>
            </div>
        </section>

        @if($progressData->count() > 0)
        <section class="margin-xs overflow-x-hidden">
            <div class="container">
                <div class="header-1 mb-5" data-aos="fade">Postęp prac</div>
            </div>
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

        {!! $investment->end_content !!}

        @if ($investment->gallery && $investment->gallery->photos->count() > 0)
            {{-- Gallery --}}
            <section class="margin-xs">
                <x-gallery :items="$investment->gallery->photos" />
            </section>
        @endif

        <section class="margin-xs bg-custom-gray">
            <div class="container">
                <div class="row align-items-center gy-3 gy-xl-0">
                    <div class="order-2 order-xl-0  col-12 col-xl-6">
                        <div class="" dir="rtl"> <img class="img-contact img-contact-left"
                                src="/images/apartments/ap-finish@2x.png" alt="EP Development wnętrze " width="1920"
                                height="1144" loading="lazy">

                        </div>
                    </div>
                    <div class="order-1 col-12 col-xl-6 ps-xl-4">
                        <div class="d-flex flex-column gap-4">
                            <div class="title-container">
                                <div class="header-1 aos-init aos-animate" data-aos="fade-up">Interesuje Cię<br>wykończenie pod klucz?</div>
                            </div>
                            <div class="text-container d-flex flex-column gap-3">
                                <p class="text-pretty paragraph aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <strong>Pragnąc zapewnić Państwu kompleksową obsługę, nawiązaliśmy współpracę z&nbsp;Pracownią Architektury Wnętrz INTERIOR DESIGN STUDIO</strong>
                                </p>
                                <p class="text-pretty paragraph aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">INTERIOR DESIGN STUDIO łączy pasję do projektowania z&nbsp;wieloletnim doświadczeniem w&nbsp;zakresie usług wykończeniowych.</p>
                                <p class="text-pretty paragraph aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Skontaktuj się z&nbsp;Ekspertem wnętrz!</p>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-phone-big aos-init aos-animate" href="tel:+48 698 719 562" data-aos="fade-up" data-aos-delay="200"> ZADZWOŃ +48 698 719 562 </a>
                    </div>
                </div>
            </div>
        </section>



        <section class="mt-5 mt-xl-0 overflow-x-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-6">
                        <div class="d-flex flex-column gap-4">
                            <div class="title-container">
                                <div class="header-1 aos-init aos-animate" data-aos="fade-up">Kredyty hipoteczne</div>
                            </div>
                            <div class="text-container d-flex flex-column gap-3">
                                <p class="text-pretty paragraph aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <strong>Dla naszych Klientów ubiegających się o&nbsp;kredyt hipoteczny oferujemy
                                        bezpłatne
                                        wsparcie ekspertów finansowych.</strong>
                                </p>
                                <p class="text-pretty paragraph aos-init" data-aos="fade-up" data-aos-delay="100">
                                    Doradcy
                                    pomogą
                                    w&nbsp;wyborze najlepszego i&nbsp;najbardziej dopasowanego do możliwości finansowych
                                    kredytu, przygotują niezbędne dokumenty i&nbsp;złożą wnioski.</p>
                                <p class="text-pretty paragraph aos-init" data-aos="fade-up" data-aos-delay="100">
                                    Zapraszamy
                                    do
                                    kontaktu</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="credit-box">
                                    <div class="name">Aneta Jasińska - Gorzelak</div>
                                    <div class="subtitle">Ekspert finansowy ds. kredytów hipotecznych</div>
                                    <div class="pb-3 contact-box email"><a class="nav-link"
                                            href="mailto:aneta.jasinska@grupaang.pl" aria-label="Contact us">
                                            aneta.jasinska@grupaang.pl </a></div>
                                    <div class="pb-3 contact-box phone"><a class="nav-link" href="tel:+48 790 023 189"
                                            aria-label="Call us"> +48 790 023 189 </a></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="credit-box">
                                    <div class="name">Hubert Burkowski</div>
                                    <div class="subtitle">Ekspert finansowy ds. kredytów hipotecznych</div>
                                    <div class="pb-3 contact-box email"><a class="nav-link"
                                            href="mailto:hubert.burkowski@hbfinanse.pl" aria-label="Contact us">
                                            hubert.burkowski@hbfinanse.pl </a></div>
                                    <div class="pb-3 contact-box phone"><a class="nav-link" href="tel:+48 793 353 021"
                                            aria-label="Call us"> +48 793 353 021 </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="">
                            <picture>
                                <source srcset="/images/apartments/credit.webp" type="image/webp"
                                    media="(max-width: 992px)">
                                <source srcset="/images/apartments/credit@2x.webp" type="image/webp"
                                    media="(min-width: 992px)">
                                <source srcset="/images/apartments/credit.png" type="image/png"
                                    media="(max-width: 992px)">
                                <source srcset="/images/apartments/credit@2x.png" type="image/png"
                                    media="(min-width: 992px)">
                                <img class="img-contact img-contact-right" src="/images/apartments/credit@2x.png"
                                    alt="Ludzie w biurze" width="1922" height="1144" loading="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    @endsection
@endif
