@extends('layouts.page')

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('components.breadcrumbs', [
        'items' => [['label' => 'o EP Development']],
        'backLink' => false,
    ])

    <section class="margin-below-vreadcrumb">
        <div class="container">
            <div class="row gy-5 gy-lg-0 align-items-center inline inline-tc">
                <div class=" col-12 col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        <div class="title-container">
                            <h1 class="title-tag mb-2 aos-init aos-animate" data-aos="fade" data-aos-delay="150" data-modaltytul="3">{{ getInline($array, 3, 'modaltytul') }}</h1>

                            <h1 class="header-1 mb-0 aos-init aos-animate" data-aos="fade-up" data-modaleditor="3">{{ getInline($array, 3, 'modaleditor') }}</h1>
                        </div>

                        <div class="text-container d-flex flex-column gap-3 text-justify text-pretty paragraph" data-modaleditortext="3">{!! getInline($array, 3, 'modaleditortext') !!}</div>

                        <a href="{{ getInline($array, 3, 'modallink') }}" class="btn btn-primary aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" data-modalbutton="3" data-modallink="3">{{ getInline($array, 3, 'modallinkbutton') }}<svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                                <path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z" transform="translate(4.553 8.293) rotate(180)" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-1 d-flex">
                    <div class="" data-aos="fade" data-aos-delay="200">
                        <x-inline-image :array="$array" id="3" class="img-fluid" />
                    </div>
                </div>
                {!! inlineEditButton(3, '') !!}
            </div>
        </div>
    </section>

    <section class="margin-xs" id="ep-development">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-lg-center">
                    <div class="title-container mb-4 inline inline-tc">
                        <div class="title-tag-sm mb-2 " data-aos="fade" data-aos-delay="150" data-modaltytul="4">{{ getInline($array, 4, 'modaltytul') }}</div>
                        <h2 class="header-1 px-0" data-aos="fade-up" data-modaleditor="4">{{ getInline($array, 4, 'modaleditor') }}</h2>
                        {!! inlineEditButton(4, 'modaleditortext,file,file_alt,modallink,modallinkbutton') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="custom-container gallery-ap">
        <div class="row g-4">
            {{-- Iteruj przez elementy galerii --}}
            @foreach ($completed as $index => $i)
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="gallery-ap--box" data-aos="fade-right" data-aos-delay="{{ $index * 50 }}">
                        {{-- Picture component --}}
                        <a href="{{asset('investment/thumbs/'. $i->file_thumb) }}" data-gallery="gallery-gallery" class="glightbox ">
                            <img src="{{asset('investment/thumbs/'. $i->file_thumb) }}" loading="lazy" class="img-fluid gallery-ap--img" alt="{{ $i->name }}">

                            {{-- Date overlay --}}
                            @if ($i->date_end)
                                <div class="gallery-ap--date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="51.104" height="54.511" viewBox="0 0 51.104 54.511">
                                        <path id="Icon_metro-calendar" data-name="Icon metro-calendar"
                                              d="M19.605,22.37h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826Zm10.221,0h6.814v6.814H40.047ZM9.385,42.811H16.2v6.814H9.385Zm10.221,0h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826ZM19.605,32.59h6.814V39.4H19.605Zm10.221,0H36.64V39.4H29.826Zm10.221,0h6.814V39.4H40.047Zm-30.662,0H16.2V39.4H9.385ZM46.861,1.928V5.335H40.047V1.928H16.2V5.335H9.385V1.928H2.571V56.439h51.1V1.928H46.861Zm3.407,51.1H5.978V15.556h44.29Z"
                                              transform="translate(-2.571 -1.928)" fill="#fff" />
                                    </svg>
                                    <span>{{ $i->date_end }}</span>
                                </div>
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
