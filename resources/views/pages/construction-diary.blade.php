@extends('layouts.page')
@section('title', 'Dziennik budowy')

@section('content')
    <section class="bg-white">
        @include('components.breadcrumbs', [
            'items' => [['label' => 'Dziennik budowy']],
            'title' => 'Dziennik budowy',
            'backLink' => false,
            'image' => [
                'webpSmall' => 'images/reusable/breadcrumbs-1.webp',
                'webpLarge' => 'images/reusable/breadcrumbs-1@2x.webp',
                'pngSmall' => 'images/reusable/breadcrumbs-1.png',
                'pngLarge' => 'images/reusable/breadcrumbs-1@2x.png',
                'defaultSrc' => 'images/reusable/breadcrumbs-1@2x.png',
                'alt' => 'Dziennik budowy - zdjęcie budowy',
            ],
        ])
    </section>

    <section class="margin-below-breadcrumb">
        <div class="container">
            <x-construction-tabs :tabs="[
                [
                    'id' => 'all',
                    'label' => 'Wszystkie',
                    'streets' => [],
                ],
                [
                    'id' => 'warszawa',
                    'label' => 'Warszawa',
                    'streets' => [
                        [
                            'name' => 'Warzelnicza Park etap 1',
                            'boxId' => 'box-1',
                            'location' => 'warszawa',
                            'date' => '07.10.2024',
                            'subtitle' => 'Prace ziemne:',
                            'href' => route('pages.construction-diary-single'),
                            'webpSmall' => 'images/apartments/ap-4.webp',
                            'webpLarge' => 'images/apartments/ap-4@2x.webp',
                            'pngSmall' => 'images/apartments/ap-4.png',
                            'pngLarge' => 'images/apartments/ap-4@2x.png',
                            'defaultSrc' => 'images/apartments/ap-4.png',
                            'alt' => 'Warzelnicza Park etap 1',
                        ],
                        [
                            'name' => 'Talarowa 3',
                            'boxId' => 'box-2',
                            'location' => 'warszawa',
                            'date' => '07.10.2024',
                            'subtitle' => 'Prace ziemne:',
                            'href' => route('pages.construction-diary-single'),
                            'webpSmall' => 'images/apartments/ap-6.webp',
                            'webpLarge' => 'images/apartments/ap-6@2x.webp',
                            'pngSmall' => 'images/apartments/ap-6.png',
                            'pngLarge' => 'images/apartments/ap-6@2x.png',
                            'defaultSrc' => 'images/apartments/ap-6.png',
                            'alt' => 'Talarowa 3',
                        ],
                    ],
                ],
                [
                    'id' => 'legionowo',
                    'label' => 'Legionowo',
                    'streets' => [
                        [
                            'name' => 'Apartamenty Talarowa 3',
                            'boxId' => 'box-3',
                            'location' => 'legionowo',
                            'date' => '07.10.2024',
                            'subtitle' => 'Prace ziemne:',
                            'href' => route('pages.construction-diary-single'),
                            'webpSmall' => 'images/apartments/ap-4.webp',
                            'webpLarge' => 'images/apartments/ap-4@2x.webp',
                            'pngSmall' => 'images/apartments/ap-4.png',
                            'pngLarge' => 'images/apartments/ap-4@2x.png',
                            'defaultSrc' => 'images/apartments/ap-4.png',
                            'alt' => 'Apartamenty Talarowa 3',
                        ],
                    ],
                ],
                [
                    'id' => 'nowy-dwor-mazowiecki',
                    'label' => 'NOWY DWÓR MAZOWIECKI',
                    'streets' => [
                        [
                            'name' => 'Osiedle Pogodne',
                            'boxId' => 'box-5',
                            'location' => 'nowy-dwor-mazowiecki',
                            'date' => '07.10.2024',
                            'subtitle' => 'Prace ziemne:',
                            'href' => route('pages.construction-diary-single'),
                            'webpSmall' => 'images/apartments/ap-4.webp',
                            'webpLarge' => 'images/apartments/ap-4@2x.webp',
                            'pngSmall' => 'images/apartments/ap-4.png',
                            'pngLarge' => 'images/apartments/ap-4@2x.png',
                            'defaultSrc' => 'images/apartments/ap-4.png',
                            'alt' => 'Apartamenty Talarowa 3',
                        ],
                    ],
                ],
                [
                    'id' => 'grodziska-mazowiecki',
                    'label' => 'GRODZISK MAZOWIECKI',
                    'streets' => [
                        [
                            'name' => 'Jarzębinowa II',
                            'boxId' => 'box-6',
                            'location' => 'grodziska-mazowiecki',
                            'date' => '07.10.2024',
                            'subtitle' => 'Prace ziemne:',
                            'href' => route('pages.construction-diary-single'),
                            'webpSmall' => 'images/apartments/ap-6.webp',
                            'webpLarge' => 'images/apartments/ap-6@2x.webp',
                            'pngSmall' => 'images/apartments/ap-6.png',
                            'pngLarge' => 'images/apartments/ap-6@2x.png',
                            'defaultSrc' => 'images/apartments/ap-6.png',
                            'alt' => 'Apartamenty Talarowa 3',
                        ],
                    ],
                ],
            ]" />

        </div>
    </section>
@endsection
