@extends('layouts.page')
@section('title', 'Osiedle Sprawna')

@section('content')
    <section class="bg-white">
        @include('components.breadcrumbs', [
            'items' => [
                ['label' => 'Inwestycje zrealizowane', 'url' => route('pages.completed-investments')],
                ['label' => 'Osiedle Sprawne'],
            ],
            'title' => 'Osiedle Sprawne',
            'backLink' => false,
            'image' => [
                'webpSmall' => 'images/reusable/breadcrumbs-2.webp',
                'webpLarge' => 'images/reusable/breadcrumbs-2@2x.webp',
                'pngSmall' => 'images/reusable/breadcrumbs-2.png',
                'pngLarge' => 'images/reusable/breadcrumbs-2@2x.png',
                'defaultSrc' => 'images/reusable/breadcrumbs-2@2x.png',
                'alt' => 'Osiedle Sprawne',
            ],
        ])
    </section>

    <section class="margin-below-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12 completed-investments">
                    <x-text-container title="Osiedle Sprawne I, II" :paragraphs="[
                        'Osiedle Sprawna, znajduje się na Białołęce, w dynamicznie rozwijającej się dzielnicy pełnej zieleni. Składa się z kilku budynków mieszkalnych o niskiej zabudowie, co wpisuje się w spokojny charakter okolicy. Inwestycja oferuje różnorodne mieszkania w standardzie deweloperskim, zaprojektowane głównie z myślą o rodzinach – dostępne są lokale 3- i 4-pokojowe. Każdy z budynków posiada do czterech kondygnacji naziemnych i dwie podziemne, gdzie znajdują się garaże dla mieszkańców, co zwiększa komfort parkowania w okolicy, gdzie miejsc postojowych bywa mało.',
                        'Osiedle zapewnia mieszkańcom wygodę dzięki bliskości szkół, sklepów i punktów usługowych. Dodatkowo znajduje się tuż obok zielonych terenów spacerowych i rekreacyjnych, co przyciąga osoby szukające spokoju i kontaktu z naturą w obrębie miasta.',
                    ]" />
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <x-sliders.single-slider :images="[
                        [
                            'webpSmall' => 'images/reusable/completed-1.webp',
                            'webpLarge' => 'images/reusable/completed-1@2x.webp',
                            'pngSmall' => 'images/reusable/completed-1.png',
                            'pngLarge' => 'images/reusable/completed-1@2x.png',
                            'defaultSrc' => 'images/reusable/completed-1@2x.png',
                            'alt' => 'EP Development wnętrze',
                        ],
                        [
                            'webpSmall' => 'images/reusable/completed-1.webp',
                            'webpLarge' => 'images/reusable/completed-1@2x.webp',
                            'pngSmall' => 'images/reusable/completed-1.png',
                            'pngLarge' => 'images/reusable/completed-1@2x.png',
                            'defaultSrc' => 'images/reusable/completed-1@2x.png',
                            'alt' => 'EP Development wnętrze',
                        ],
                        [
                            'webpSmall' => 'images/reusable/completed-1.webp',
                            'webpLarge' => 'images/reusable/completed-1@2x.webp',
                            'pngSmall' => 'images/reusable/completed-1.png',
                            'pngLarge' => 'images/reusable/completed-1@2x.png',
                            'defaultSrc' => 'images/reusable/completed-1@2x.png',
                            'alt' => 'EP Development wnętrze',
                        ],
                    ]" />
                </div>
            </div>
        </div>
    </section>
@endsection
