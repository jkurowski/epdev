<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {!! settings()->get('scripts_head') !!}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EP Development
        @hasSection('seo_title')
            @yield('seo_title')
        @else
            {{ settings()->get('page_title') }}@hasSection('meta_title') - @yield('meta_title')@endif
        @endif
    </title>

    <meta name="description" content="@yield('seo_description', settings()->get('page_description'))">
    <meta name="robots" content="@yield('seo_robots', settings()->get('page_robots'))">
    <meta name="author" content="{{ settings()->get('page_author') }}">

    <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('/css/styles.min.css') }}" rel="stylesheet"> --}}

    <script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
    <script type="module" src="{{ asset('build/assets/app-C1yeRISt.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Banrqkr2.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets//app-CWR4YbLS.css') }}" />

{{--    @vite()--}}

    @stack('styles')

</head>

<body class="bg-custom-full overflow-x-hidden">
{!! settings()->get('scripts_afterbody') !!}

@include('layouts.partials.header')
@yield('pageheader')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.cookies')

    @stack('scripts')
    {!! settings()->get('scripts_beforebody') !!}
</body>

</html>
