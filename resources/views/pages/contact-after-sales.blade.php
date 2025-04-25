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
                <div class="col-12 text-center inline inline-tc">
                    <h1 class="section-title fw-bold mb-4" data-modaltytul="2">{{ getInline($array, 2, 'modaltytul') }}</h1>
                    <div class="paragraph mb-4" data-modaleditortext="2">{!! getInline($array, 2, 'modaleditortext') !!}</div>
                    {!! inlineEditButton(2, 'modaleditor,modallink,modallinkbutton,file,file_alt') !!}
                </div>
                <div class="col-12 mt-5">
                    <iframe src="https://epdevelopment.voxdeveloper.com/webservice/faultnoticeform/api_key/e493bcb15b45cdf33368db18440023f4d806a6b3" class="w-100" style="height: 1730px"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>#footer{margin-top:60px !important}</style>
@endpush