@extends('layouts.page', ['body_class' => 'investments'])

@section('meta_title', 'Inwestycje - '.$investment->name)
@if($page)
    @section('seo_title', $page->meta_title)
    @section('seo_description', $page->meta_description)
    @section('pageheader')
        @include('layouts.partials.page-header', ['page' => $page, 'header_file' => 'rooms.jpg', 'heading' => $investment->name])
    @stop
@endif

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('front.developro.investment_shared.menu')
            </div>
            <div class="col-10">
                @if($investment->show_properties == 1)
                    @if($investment->plan)
                        <div id="plan-holder">
                            <div class="plan-holder-info">Z planu budynku wybierz piętro lub <a href="#filtr" class="scroll-link" data-offset="90"><b>użyj wyszukiwarki</b></a></div>
                            <img src="{{ asset('/investment/plan/'.$investment->plan->file) }}" alt="{{$investment->name}}" id="invesmentplan" usemap="#invesmentplan">

                            @if($investment->type == 2)
                            <map name="invesmentplan">
                                @foreach($investment->floors as $floor)
                                    @if($floor->html)
                                        <area
                                                shape="poly"
                                                href="#"
                                                title="{{$floor->name}}"
                                                alt="floor-{{$floor->id}}"
                                                data-item="{{$floor->id}}"
                                                data-floornumber="{{$floor->id}}"
                                                data-floortype="{{$floor->type}}"
                                                coords="{{cords($floor->html)}}">
                                    @endif
                                @endforeach
                            </map>
                            @endif

                            @if($investment->type == 3)
                            <map name="invesmentplan">
                                @if($investment->properties)
                                    @foreach($investment->properties as $house)
                                        <area
                                                shape="poly"
                                                href="{{route('front.developro.house', [$investment->slug, $house])}}"
                                                title="{{$house->name}}"
                                                alt="{{$house->slug}}"
                                                data-item="{{$house->id}}"
                                                data-roomnumber="{{$house->number}}"
                                                data-roomtype="{{$house->typ}}"
                                                data-roomstatus="{{$house->status}}"
                                                coords="@if($house->html) {{cords($house->html)}} @endif">
                                    @endforeach
                                @endif
                            </map>
                            @endif
                        </div>
                    @endif

                    @include('front.developro.investment_shared.filtr', ['area_range' => $investment->area_range])
                    @include('front.developro.investment_shared.sort')
                @endif

                @include('front.developro.investment_shared.list', ['investment' => $investment])

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/js/plan/imagemapster.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/plan/plan.js') }}" charset="utf-8"></script>
@endpush
