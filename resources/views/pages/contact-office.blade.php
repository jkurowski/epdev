@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <x-breadcrumbs :items="[
        ['label' => 'Kontakt'],
    ]" />

    <section class="margin-below-breadcrumb">
        <div class="container inline inline-tc">
            <div class="row align-items-center gy-5 gy-lg-0">
                <div class="col-12 col-lg-3 col-xl-2">
                    <div class="d-flex flex-column gap-4">
                        <div class="title-container">
                            <h1 class="header-1 mb-0 aos-init aos-animate" data-aos="fade-up" data-modaltytul="1">{{ getInline($array, 1, 'modaltytul') }}</h1>
                        </div>
                        <div class="text-container d-flex flex-column gap-3 text-justify text-pretty paragraph" data-modaleditortext="1">{!! getInline($array, 1, 'modaleditortext') !!}</div>
                    </div>
                    <a href="#modalContact" data-bs-toggle="modal" data-bs-target="#modalContact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">ZAPYTAJ O OFERTĘ<svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293"><path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z" transform="translate(4.553 8.293) rotate(180)" fill="currentColor" /></svg></a>
                </div>
                <div class="col-lg-8 col-xl-9 offset-lg-1">
                    <div class="" data-aos="fade" data-aos-delay="200">
                        <x-inline-image :array="$array" id="1" class="img-fluid" />
                    </div>
                </div>
            </div>
            {!! inlineEditButton(1, 'modaleditor,modallink,modallinkbutton') !!}
        </div>
    </section>
@endsection
