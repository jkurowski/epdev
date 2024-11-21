@extends('layouts.page')
@section('meta_title', 'Dziennik budowy')


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
            <x-construction-tabs :tabs="$tabs" />
        </div>
    </section>
@endsection
