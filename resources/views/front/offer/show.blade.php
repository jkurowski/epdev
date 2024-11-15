@extends('layouts.page', ['body_class' => 'homepage'])

@section('content')
    <div id="page-content">
        @if (!$offer->is_new_client)
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success mb-3">{{ session('success') }}</div>
                        @endif
                        <h1>Oferta numer: {{ $offer->id }} z dnia {{ date('Y-m-d', strtotime($offer->created_at)) }}</h1>
                        <hr>
                        {!! $offer->message !!}
                    </div>
                </div>
            </div>
            @if ($selectedOffer)
                @include('front.offer.property_list', ['properties' => $selectedOffer])
            @endif
        @else
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <div class="py-5">
                            @include('front.offer.new-client-form')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
