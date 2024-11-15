@extends('layouts.page', ['body_class' => 'news'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

@section('pageheader')
    @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'news.jpg'])
@stop

@section('content')
    <div id="main-news">
        @foreach ($articles as $n)
        <div class="container mb-5">
            <article class="row list-post" id="list-post-{{ $n->id }}" itemscope="" itemtype="http://schema.org/NewsArticle">
                <div class="col-6">
                    <div class="list-post-thumb">
                        <a href="{{route('front.news.show', $n->slug)}}" title="{{ $n->title }}" itemprop="url">
                            <picture>
                                <source type="image/webp" srcset="{{asset('uploads/articles/thumbs/webp/'.$n->file_webp) }}">
                                <source type="image/jpeg" srcset="{{asset('uploads/articles/thumbs/'.$n->file) }}">
                                <img src="{{asset('uploads/articles/thumbs/'.$n->file) }}" alt="@if($n->file_alt){{$n->file_alt}}@else{{$n->title}}@endif">
                            </picture>
                        </a>
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="list-post-content ps-5 pe-5">
                        <div class="article-header">
                            @if($n->date)<div class="list-post-date text-muted">Data publikacji: <span itemprop="datePublished" content="{{ $n->date }}">{{ $n->date }}</span></div>@endif
                            <h2 class="title"><a href="{{route('front.news.show', $n->slug)}}" itemprop="url"><span itemprop="name headline">{{ $n->title }}</span></a></h2>
                        </div>

                        <div class="list-post-entry" itemprop="articleBody">
                            <p class="small-text">{{ $n->content_entry }}</p>
                        </div>

                        <div class="article-footer">
                            <a itemprop="url" href="{{route('front.news.show', $n->slug)}}" title="{{ $n->title }}" class="bttn mt-4">CZYTAJ WIĘCEJ</a>
                            <meta itemprop="author" content="Author">
                            <meta itemprop="mainEntityOfPage" content="">
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>
@endsection
