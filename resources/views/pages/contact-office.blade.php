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
                    ]"/>

                    <a href="#modalContact" data-bs-toggle="modal" data-bs-target="#modalContact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">ZAPYTAJ O OFERTĘ<svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293"><path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z" transform="translate(4.553 8.293) rotate(180)" fill="currentColor" /></svg></a>
                </div>
                <div class="col-lg-8 col-xl-9 offset-lg-1">
                    <div class="" data-aos="fade" data-aos-delay="200">
                        <img src="{{ asset('images/kontakt.jpg') }}"
                             width="970"
                             height="640"
                             alt="EP Development Blok mieszkalny"
                             class="img-fluid"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
