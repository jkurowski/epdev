@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('components.breadcrumbs', [
        'items' => [['label' => 'Kupimy Grunty']],
        'backLink' => false,
    ])

    <section class="margin-below-breadcrumb">
        <div class="container">
            {!! parse_text($page->content) !!}
        </div>
    </section>
@endsection
