@extends('layouts.page')
@section('title', 'Kupimy grunty')

@section('content')
    @include('components.breadcrumbs', [
        'items' => [['label' => 'Kupimy Grunty']],
        'backLink' => false,
    ])

    <section class="margin-below-breadcrumb">
        <div class="container">
            <div class="row align-items-center gy-5 gy-lg-0">
                <div class="col-12 col-lg-5">
                    <div class="buy-land">
                        <h1 class="section-title fw-bold mb-4 text-uppercase">KUPIMY GRuNTY</h1>
                        <p class="paragraph mb-4">Posiadasz na sprzedaż atrakcyjną nieruchomość w Warszawie i okolicach?</p>
                        <div class="header-3 fw-bold">ZADZWOŃ</div>
                        <x-contact-list phoneNumber='+48 517 115 888' />
                        <div class="date">pn.-pt.: 9:00-17:00</div>
                        <div class="header-3 fw-bold text-uppercase">napisz</div>
                        <x-contact-list email='sekretariat.waw@epdevelopment.com.pl' />
                        <p class="paragraph mb-4">Aktywnie poszukujemy gruntów inwestycyjnych pod zabudowę wielorodzinną,
                            zapraszamy do kontaktu</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-1">
                    <div class="" data-aos="fade" data-aos-delay="200">

                        <x-picture webpSmall="images/reusable/land.webp" webpLarge="images/reusable/land@2x.webp"
                            pngSmall="images/reusable/land.png" pngLarge="images/reusable/land@2x.png"
                            defaultSrc="images/reusable/land@2x.png" alt="Kupimy grunty obraz biurowca" class="img-fluid" />
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
