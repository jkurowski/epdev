{{-- <div id="roomsList">
    <div class="container-fluid">
        @if ($properties->count() > 0)
            @foreach ($properties as $room)
                @include('components.apartment-box', ['property' => $room])
                {{-- <div class="row">
                    @if ($room->price)
                        <span class="ribbon1"><span>Oferta specjalna</span></span>
                    @endif
                    <div class="col col-top">

                        @if ($investment->type == 2)
                            <a href="{{route('front.developro.property', ['slug' => $investment->slug, 'floor' => $room->floor_id, 'property' => $room->id])}}">
                                <h2>{{$room->name_list}}<br><span>{{$room->number}}</span></h2>
                            </a>
                        @endif

                        @if ($investment->type == 3)
                            <a href="{{route('front.developro.house', ['slug' => $investment->slug, 'property' => $room->id])}}">
                                <h2>{{$room->name_list}}<br><span>{{$room->number}}</span></h2>
                            </a>
                        @endif
                    </div>
                    <div class="col">
                        @if ($room->file)
                            <picture>
                                <source type="image/webp" srcset="/investment/property/list/webp/{{$room->file_webp}}">
                                <source type="image/jpeg" srcset="/investment/property/list/{{$room->file}}">
                                <img src="/investment/property/list/{{$room->file}}" alt="{{$room->name}}">
                            </picture>
                        @endif
                    </div>
                    <div class="col">
                        <ul class="mb-0 list-unstyled">
                            @if ($room->price && $room->status == 1)
                                <li>cena: <b>@money($room->price)</b></li>
                            @endif
                            <li>pokoje: <b>{{$room->rooms}}</b></li>
                            <li>pow.: <b>{{$room->area}} m<sup>2</sup></b></li>
                        </ul>
                    </div>
                    <div class="col justify-content-center">
                        <span class="badge room-list-status-{{ $room->status }}">{{ roomStatus($room->status) }}</span>
                    </div>
                    <div class="col justify-content-end col-list-btn">
                        @if ($investment->type == 2)
                            <a href="{{route('front.developro.property', ['slug' => $investment->slug, 'floor' => $room->floor_id, 'property' => $room->id])}}" class="bttn">ZOBACZ</a>
                        @endif

                        @if ($investment->type == 3)
                            <a href="{{route('front.developro.house', ['slug' => $investment->slug, 'property' => $room->id])}}" class="bttn">ZOBACZ</a>
                        @endif
                    </div>
                </div> --}}
            {{-- @endforeach
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <b>Brak wyników</b>
                </div>
            </div>
        @endif
    </div>
</div>  --}}




<section class = "" id="mieszkania">
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
                                    <rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none" />
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
            @if ($investment->properties->count() > 0)
                @foreach ($investment->properties as $room)
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
