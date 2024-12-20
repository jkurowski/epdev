@extends('admin.layout')
@section('meta_title', '- ' . $cardTitle)

@section('content')
    @if (Route::is('admin.email.generator.edit'))
        <form method="POST" action="{{ route('admin.email.generator.update', $entry->id) }}" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('admin.email.generator.store') }}" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="container">
        <div class="card-head container">
            <div class="row">
                <div class="col-12 pl-0">
                    <h4 class="page-title"><i class="fe-mail"></i><a href="{{ route('admin.email.generator.index') }}"
                            class="p-0">Szablony e-mail</a><span
                            class="d-inline-flex me-2 ms-2">/</span>{{ $cardTitle }}</h4>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            @include('form-elements.back-route-button')
            <div class="card-body control-col12">

                <div class="row w-100 form-group">
                    @include('form-elements.html-input-text', [
                        'label' => 'Nazwa',
                        'name' => 'name',
                        'value' => $entry->name,
                        'required' => 1,
                    ])
                </div>
                <div class="row w-100 form-group">
                    @include('form-elements.html-input-text', [
                        'label' => 'Opis',
                        'name' => 'description',
                        'value' => $entry->description,
                    ])
                </div>


                <div class='row w-100 form-group'>
                    <label for="meta[template_type]" class="col-12 col-form-label control-label pb-2">Typ</label>
                    <div class='col-12 control-col12 control-input position-relative d-flex align-items-center'>
                        <select name="meta[template_type]" id="meta[template_type]" class="form-select"
                            {{-- 30 = not editable --}}
                     
                            @if ($entry->meta && $entry->meta['template_type'] == "30") disabled readonly @endif>
                            @foreach ($templateTypes as $key => $value)
                                <option value="{{ $key }}"
                                    {{ $entry->meta && $entry->meta['template_type'] == $key ? 'selected' : '' }}>{{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>



    </div>

    @include('form-elements.submit', ['name' => 'submit', 'value' => 'Zapisz'])
    </form>
@endsection
