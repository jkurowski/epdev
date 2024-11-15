{{-- @extends('layouts.page')

@section('meta_title', 'Inwestycje')
@if ($page)
    @section('seo_title', $page->meta_title)

    @section('seo_description', $page->meta_description)

    @section('pageheader')
        @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'rooms.jpg', 'heading' => ''])
    @stop
@endif

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($list as $p)
                <div class="col-4">
                    <a href="{{ route('front.developro.plan', ['slug' => $p->slug]) }}" itemprop="url">
                        <div class="card">
                            <img src="{{asset('investment/thumbs/'.$p->file_thumb) }}" alt="{{ $p->name }}">
                            <div class="card-body">
                                <h1 class="card-title">{{$p->name}}</h1>
                                <p>{{$p->entry_content}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}

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
                        <x-apartment-search-form :cities="['warszawa' => 'warszawa', 'nowy-dwor' => 'Nowy Dwór']" :range-min="30" :range-max="95" :levels="5" />
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

    <section class="mt-5">
        <div class="container">
            @include('components.currently-for-sale-list', [
                'items' => $list,
            ])

        </div>
    </section>
@endsection
