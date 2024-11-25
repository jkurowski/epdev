@extends('layouts.page')
@section('meta_title', 'Inwestycje zrealizowane')

@section('content')
    <section class="bg-white">
        @include('components.breadcrumbs', [
            'items' => [['label' => 'Inwestycje zrealizowane']],
            'title' => 'Inwestycje zrealizowane',
            'backLink' => false,
            'image' => [
                'webpSmall' => 'images/reusable/breadcrumbs-1.webp',
                'webpLarge' => 'images/reusable/breadcrumbs-1@2x.webp',
                'pngSmall' => 'images/reusable/breadcrumbs-1.png',
                'pngLarge' => 'images/reusable/breadcrumbs-1@2x.png',
                'defaultSrc' => 'images/reusable/breadcrumbs-1@2x.png',
                'alt' => 'Inwestycje zrealizowane - zdjęcie budowy',
            ],
        ])
    </section>

    <section class="margin-below-breadcrumb">
        <div class="container">
            <x-investments.investments :tabs="$list" />
        </div>
    </section>
@endsection
