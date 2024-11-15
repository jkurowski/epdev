@extends('layouts.page')
@section('title', 'Lokale usługowe')

@section('content')
    <div class="container">
        @include('components.breadcrumbs', ['items' => $breadcrumbs])
        <h1>Lokale usługowe</h1>
    </div>
@endsection
