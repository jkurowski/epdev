<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>{{ settings()->get("page_title") }}</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : 'homepage' }}">
{!! settings()->get("scripts_afterbody") !!}

    @include('layouts.partials.header')

    <main class="mt-5">
        <div class="container">
            <div id="slider" class="row">
                @foreach($slider as $s)
                <div class="col-12 p-0">
                    <div class="slider-panel">
                        <div class="slider-apla text-center">
                            <h2>{{ $s->title }}</h2>
                            @if($s->link && $s->link_button && $s->link_target)
                            <a href="{{ $s->link }}" target="{{ $s->link_target }}" class="btn btn-primary mt-3 mb-3">{{ $s->link_button }}</a>
                            @endif
                        </div>
                        <div class="slider-opacity" style="background: {{ rgbaColor($s->color, $s->opacity) }}"></div>
                        <img src="{{ asset('/uploads/slider/'.$s->file) }}" alt="{{ $s->file_alt }}">
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row mt-5">
                @foreach($boxes as $b)
                    <div class="col-3">
                        <div class="box p-4 text-center">
                            <img src="{{ asset('/uploads/boxes/'.$b->file) }}" alt="{{ $b->file_alt }}" class="m-auto">
                            <h4 class="mt-4">{{ $b->title }}</h4>
                            <p>{{ $b->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-7 mt-4 text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary">Logowanie do panelu</a>
                </div>
                <div class="col-7">
                    <table class="table mt-4">
                        <tr><td>page_title</td><td>{{ settings()->get("page_title") }}</td></tr>
                        <tr><td>page_description</td><td>{{ settings()->get("page_description") }}</td></tr>
                        <tr><td>page_url</td><td>{{ settings()->get("page_url") }}</td></tr>
                        <tr><td>page_email</td><td>{{ settings()->get("page_email") }}</td></tr>
                        <tr><td>page_author</td><td>{{ settings()->get("page_author") }}</td></tr>
                        <tr><td>page_robots</td><td>{{ settings()->get("page_robots") }}</td></tr>
                        <tr><td>page_favicon</td><td>{!! settings()->get("page_favicon") !!}</td></tr>
                        <tr><td>page_logo_alt</td><td>{{ settings()->get("page_logo_alt") }}</td></tr>
                        <tr><td>page_logo_title</td><td>{{ settings()->get("page_logo_title") }}</td></tr>
                        <tr><td>google_maps_api</td><td>{{ settings()->get("google_maps_api") }}</td></tr>
                        <tr><td>scripts_head</td><td>{{ settings()->get("scripts_head") }}</td></tr>
                        <tr><td>scripts_afterbody</td><td>{{ settings()->get("scripts_afterbody") }}</td></tr>
                        <tr><td>scripts_beforebody</td><td>{{ settings()->get("scripts_beforebody") }}</td></tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row position-relative inline inline-tc">
                <div class="col-6">
                    <img src="{{ getInline($array, 1, 'file') }}" alt="{{ getInline($array, 1, 'file_alt') }}" data-img="1">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="offset-apla ps-5">
                        <div class="section-header text-center">
                            <span data-modaleditor="1">{{ getInline($array, 1, 'modaleditor') }}</span>
                            <h2 data-modaltytul="1">{{ getInline($array, 1, 'modaltytul') }}</h2>
                        </div>
                        <div data-modaleditortext="1">{!! getInline($array, 1, 'modaleditortext') !!}</div>
                    </div>
                </div>
                @auth
                    <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="1" data-hideinput="modallink,modallinkbutton" data-method="update" data-imgwidth="796" data-imgheight="738"></button></div>
                @endauth
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row flex-row-reverse position-relative inline inline-tc">
                <div class="col-6">
                    <img src="{{ getInline($array, 10, 'file') }}" alt="{{ getInline($array, 10, 'file_alt') }}" data-img="10">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="offset-apla pe-5">
                        <div class="section-header text-center">
                            <span data-modaleditor="10">{{ getInline($array, 10, 'modaleditor') }}</span>
                            <h2 data-modaltytul="10">{{ getInline($array, 10, 'modaltytul') }}</h2>
                        </div>
                        <div data-modaleditortext="10">{!! getInline($array, 10, 'modaleditortext') !!}</div>
                    </div>
                </div>
                @auth
                    <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="10" data-hideinput="modallink,modallinkbutton" data-method="update" data-imgwidth="796" data-imgheight="738"></button></div>
                @endauth
            </div>
        </div>
    </main>
    <!-- jQuery -->
    <script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>

    <script>
        const ws = new WebSocket('ws://127.0.0.1:6001/app/local?protocol=7&client=js&version=4.3.1&flash=false');

        ws.onopen = function() {
            console.log('WebSocket connection established');

            // Subscribe to the public channel
            ws.send(JSON.stringify({
                event: 'pusher:subscribe',
                data: {
                    channel: 'public-notification-channel' // Use a public channel
                }
            }));
        };

        ws.onmessage = function(event) {
            const data = JSON.parse(event.data);
            console.log('Message received: ', data);

            if (data.event === 'App\\Notifications\\UserNotification') {
                // Parse the nested JSON string in the data property
                const notificationData = JSON.parse(data.data);
                alert(notificationData.message);
            }
        };

        ws.onclose = function() {
            console.log('WebSocket connection closed');
        };

        ws.onerror = function(error) {
            console.log('WebSocket error: ', error);
        };
    </script>

    @auth
        @include('layouts.partials.inline')
    @endauth

    @stack('scripts')

    {!! settings()->get("scripts_beforebody") !!}
</body>
</html>
