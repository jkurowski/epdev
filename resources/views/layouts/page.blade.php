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

    @if (Route::currentRouteName() === 'pages.homepage')
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
        @if(settings()->get("popup_status") == 1)
            <div class="modal" tabindex="-1" id="popModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                        </div>
                        <div class="modal-body">
                            {!! settings()->get("popup_text") !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <script type="text/javascript">
            @if(settings()->get("popup_status") == 1)
            const popModal = new bootstrap.Modal(document.getElementById('popModal'), {
                keyboard: false
            });
            @endif
            @if($popup == 1)
            popModal.show();
            setTimeout( function(){
                popModal.hide();
            }, {{ settings()->get("popup_timeout") }} );
            @endif
        </script>
    @endif
</body>

</html>
