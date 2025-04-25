@extends('admin.layout')
@section('meta_title', '- '.$cardTitle)

@section('content')
    @if(Route::is('admin.footer.edit'))
        <form method="POST" action="{{route('admin.footer.update', $entry->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <form method="POST" action="{{route('admin.footer.store')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="container">
                        <div class="card-head container">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <h4 class="page-title"><i class="fe-book-open"></i><a href="{{route('admin.footer.index')}}" class="p-0">Footer</a><span class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            @include('form-elements.back-route-button')
                            <div class="card-body control-col12">
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text', ['label' => 'Tytuł modułu', 'name' => 'name', 'value' => $entry->name, 'required' => 1])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-input-text-count', ['label' => 'Klasy CSS', 'sublabel'=> 'Klasy CSS wg. Bootstrap', 'name' => 'class', 'value' => $entry->class, 'maxlength' => 190])
                                </div>
                                <div class="row w-100 form-group">
                                    @include('form-elements.html-textarea', ['label' => 'Elementy modułu', 'name' => 'items', 'value' => $entry->items, 'required' => 0, 'rows' => 10, 'cols' => 10])
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
                </form>
                @endsection
