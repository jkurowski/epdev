@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('components.breadcrumbs', [
        'items' => [
            ['label' => 'Obsługa posprzedażowa']
        ],
        'backLink' => false,
    ])

    <section class="margin-below-breadcrumb mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="section-title fw-bold mb-4">Zgłoszenia serwisowe, reklamcje</h1>
                    <p class="paragraph mb-4">W celu złożenia reklamacji prosimy wypełnić formularz.</p>
                </div>
                <div class="col-12 mt-5">
                    <iframe src="https://epdevelopment.voxdeveloper.com/webservice/faultnoticeform/api_key/e493bcb15b45cdf33368db18440023f4d806a6b3" frameborder="0" class="w-100" style="height: 1730px"></iframe>
                </div>
            </div>


            <div class="row align-items-center gy-5 gy-lg-0 d-none">
                <div class="col-12 col-lg-5 col-xxl-4">
                    <div class="complaint-box">
                        <h1 class="section-title fw-bold mb-4">Zgłoszenia serwisowe, <br> reklamcje</h1>
                        <p class="paragraph mb-4">W celu złożenia reklamacji proszę kliknąć w poniższy link.</p>
                        <p class="paragraph mb-4">ZGŁOSZENIE REKLAMACJI NA FORMULARZU I W POROZUMIENIU Z VOX</p>
                        <a href="#" class="btn btn-complaint">
                            zgłoś reklamację
                        </a>
                    </div>

                </div>
                <div class="col-12 col-lg-6 offset-lg-1 offset-xxl-2">
                    <div class="" data-aos="fade" data-aos-delay="200">
                        <x-picture webpSmall="images/reusable/complaint.webp" webpLarge="images/reusable/complaint@2x.webp"
                            pngSmall="images/reusable/complaint.png" pngLarge="images/reusable/complaint@2x.png"
                            defaultSrc="images/reusable/complaint@2x.png" alt="Biuro obsługi posprzedażowej"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>#footer{margin-top:60px !important;}</style>
@endsection
