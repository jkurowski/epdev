@extends('layouts.page', ['body_class' => 'investments'])
@section('meta_title', 'Mieszkania ')

@section('content')
    <x-breadcrumbs :items="[
        [
            'label' => 'Mieszkania',
            'url' => '#',
        ],
    ]" />




    <div class="container margin-xs" id="znajdz-swoje-mieszkanie">
        <div class="text-center">
            <div class="title-tag-sm" data-aos="fade">EP DEVELOPMENT</div>
            <div class="header-1" data-aos="fade-up" data-aos-delay="200"r>Znajdź swoje mieszkanie</div>
        </div>
    </div>
    <div class="container mt-3 mt-lg-5 mb-5 mb-xl-3">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <x-search-estate :floors="[
                    0 => 'Parter',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                ]" :rooms="5" :rangeMin="$minRoomArea" :rangeMax="$maxRoomArea" />
            </div>
        </div>
    </div>
    <section class = "" id="roomsList">
        <div class="container">
            <!-- BUTTONS -->
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <ul class="nav nav-pills gap-3 mb-3" id="pills-tab" role="tablist" data-aos="fade" data-aos-delay="200">
                        <!-- ROW -->
                        <li class="grid-btn" id="row-tab" role="tab" aria-controls="pills-row" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="28" viewBox="0 0 53 28">
                                <g id="Group_236" data-name="Group 236" transform="translate(-1521 -3777)">
                                    <g id="Group_226" data-name="Group 226" transform="translate(-73 -32)">
                                        <g id="Rectangle_344" data-name="Rectangle 344" transform="translate(1594 3831)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                        <g id="Rectangle_345" data-name="Rectangle 345" transform="translate(1594 3820)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                        <g id="Rectangle_346" data-name="Rectangle 346" transform="translate(1594 3809)"
                                            fill="none" stroke="#000" stroke-width="1">
                                            <rect width="53" height="6" rx="2" stroke="none" />
                                            <rect x="0.5" y="0.5" width="52" height="5" rx="1.5"
                                                fill="none" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </li>
                        <!-- COLUMN -->
                        <li class="grid-btn active" id="column-tab" role="tab" aria-controls="pills-column"
                            aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="28" viewBox="0 0 39 28">
                                <g id="Group_235" data-name="Group 235" transform="translate(-1594 -3777)">
                                    <g id="Rectangle_335" data-name="Rectangle 335" transform="translate(1594 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_343" data-name="Rectangle 343" transform="translate(1594 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_337" data-name="Rectangle 337" transform="translate(1608 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_342" data-name="Rectangle 342" transform="translate(1608 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_338" data-name="Rectangle 338" transform="translate(1622 3793)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                    <g id="Rectangle_341" data-name="Rectangle 341" transform="translate(1622 3777)"
                                        fill="none" stroke="#000" stroke-width="1">
                                        <rect width="11" height="12" rx="2" stroke="none" />
                                        <rect x="0.5" y="0.5" width="10" height="11" rx="1.5"
                                            fill="none" />
                                    </g>
                                </g>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row gx-3 mt-5 d-none d-xl-flex apartments-titles apartments-titles-hide" data-aos="fade">
                <div class="d-flex  main-row-titles">
                    <div class="ap-column-title">
                        Status
                    </div>
                    <div class="ap-column-title ap-apartment">
                        MIESZKANIE
                    </div>
                    <div class="d-flex inner-row-titles">
                        <div class="ap-column-title ap-squares">POWIERZCHNIA</div>
                        <div class="ap-column-title ap-balcoon">
                            BALKON/OGRÓD
                        </div>
                        <div class="ap-column-title ap-level">PIĘTRO</div>
                        <div class="ap-column-title ap-rooms">POKOJE</div>
                    </div>

                    <div class="ap-column-title ap-rzut">RZUT</div>
                    <div class="ap-column-title"></div>
                </div>
            </div>
            <div class="row gy-3 apartment-box-container switch">
                @if ($allProperties->count() > 0)
                    @foreach ($allProperties as $room)
                        @php
                            $investment = $room->investment;
                        @endphp
                        @include('components.apartment-box', ['property' => $room])
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-12 text-center">
                            <b>Brak wyników</b>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
