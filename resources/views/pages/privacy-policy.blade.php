@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    <x-breadcrumbs :items="[
        ['label' => $page->title, 'url' => route('pages.privacy-policy')]
    ]" />

    <section class="margin-below-vreadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="header-1 mb-4">{{ $page->title }}</h1>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
