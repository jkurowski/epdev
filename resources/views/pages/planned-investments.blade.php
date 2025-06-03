@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('content')
    <section class="bg-white">
        @include('components.breadcrumbs', [
            'items' => [['label' => 'Inwestycje planowane']],
            'title' => 'Inwestycje planowane',
            'backLink' => false,
            'image' => [
                'webpSmall' => 'images/reusable/breadcrumbs-3.webp',
                'webpLarge' => 'images/reusable/breadcrumbs-3@2x.webp',
                'pngSmall' => 'images/reusable/breadcrumbs-3.png',
                'pngLarge' => 'images/reusable/breadcrumbs-3@2x.png',
                'defaultSrc' => 'images/reusable/breadcrumbs-3@2x.png',
                'alt' => 'Inwestycje planowane - zdjęcie budowy',
            ],
        ])
    </section>

    <section class="margin-below-breadcrumb">
        <div class="container">
            <x-investments.investments :tabs="$list" />
        </div>
    </section>
@endsection
