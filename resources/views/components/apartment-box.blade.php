@props(['property'])
<div class="col-12">

    <?php
    $propertyLink = '';
    
    switch ($investment->type) {
        case $investment->type == 2:
            $propertyLink = route('front.developro.property', ['slug' => $investment->slug, 'floor' => $property->floor_id, 'property' => $property->id]);
            break;
        case $investment->type == 3:
            $propertyLink = route('front.developro.house', ['slug' => $investment->slug, 'property' => $property->id]);
            break;
        default:
            $propertLink = '#';
    }
    ?>


    <div class="ap-column-box ap-column-switch" data-aos="fade-right" data-aos-delay="100">
        @if (isset($statusClass) && isset($statusText))
            <!-- TAG -->
            <div>
                <div class="apartment-type apartment-hero-type {{ $statusClass }}">
                    {{ $statusText }}
                </div>
                <span class="badge room-list-status-{{ $property->status }}">{{ roomStatus($property->status) }}</span>
            </div>
        @endif

        @if ($property->file)
            <!-- PICTURE -->
            <div>
                {{-- <a href="{{ $lightboxSrc }}" data-gallery="apartment-gallery" class="glightbox ap-column-glightbox">
                    <x-picture :webpSmall="$webpSmall" :webpLarge="$webpLarge" :pngSmall="$pngSmall" :pngLarge="$pngLarge" :defaultSrc="$defaultSrc"
                        :alt="$alt" class="ap-column--img" />
                        
                </a> --}}
                <picture>
                    <source type="image/webp" srcset="/investment/property/list/webp/{{$property->file_webp}}">
                    <source type="image/jpeg" srcset="/investment/property/list/{{$property->file}}">
                    <img class="ap-column--img" src="/investment/property/list/{{$property->file}}" alt="{{$property->name}}">
                </picture>
            </div>
        @endif


        @if (isset($title))
            <!-- TITLE -->
            <div>
                <div class="apartment-title">{!! $title !!}</div>
            </div>
        @endif

        <div class="apartment-info-box">
            <!-- METERAGE -->
            @if ($property->area)
                <div>
                    <div class="info-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.286" height="15.286"
                            viewBox="0 0 15.286 15.286">
                            <path id="fullscreen"
                                d="M21.132,8.5H11.154A2.657,2.657,0,0,0,8.5,11.154v9.979a2.657,2.657,0,0,0,2.654,2.654h9.979a2.657,2.657,0,0,0,2.654-2.654V11.154A2.657,2.657,0,0,0,21.132,8.5Zm1.882,12.632a1.884,1.884,0,0,1-1.882,1.882H11.154a1.884,1.884,0,0,1-1.882-1.882V11.154a1.884,1.884,0,0,1,1.882-1.882h9.979a1.884,1.884,0,0,1,1.882,1.882Zm-3.447-8.027v2.784a.386.386,0,1,1-.772,0V14.037l-4.758,4.758h1.852a.386.386,0,0,1,0,.772H13.105a.386.386,0,0,1-.386-.386V16.4a.386.386,0,1,1,.772,0v1.852l4.758-4.758H16.4a.386.386,0,1,1,0-.772h2.784a.386.386,0,0,1,.386.386Z"
                                transform="translate(-8.5 -8.5)" />
                        </svg>
                        <span>{{ $property->area }} m<sup>2</sup></span>
                    </div>
                </div>
            @endif

            <!-- TYPE -->
            @if ($property->garden_area)
                <div>
                    <div class="info-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.457" height="21.458"
                            viewBox="0 0 21.457 21.458">
                            <path id="patio"
                                d="M8.437,23.458a1.079,1.079,0,0,1-1-.7L6.621,20.6H5.247l-.812,2.165a1.073,1.073,0,0,1-2.01-.753l.963-2.567-1.007-4.7a1.073,1.073,0,0,1,2.1-.449l.891,4.159H7.365a1.079,1.079,0,0,1,1,.7l1.073,2.861a1.074,1.074,0,0,1-1,1.45ZM5,19.881h1.87a.358.358,0,0,1,.335.232l.9,2.4a.364.364,0,0,0,.46.209.358.358,0,0,0,.21-.46L7.7,19.4a.359.359,0,0,0-.335-.232H5.082a.357.357,0,0,1-.35-.283l-.952-4.441a.358.358,0,0,0-.7.15l1.029,4.8a.357.357,0,0,1-.015.2l-1,2.665a.358.358,0,0,0,.209.46.358.358,0,0,0,.461-.209l.9-2.4A.358.358,0,0,1,5,19.881ZM17.02,23.458a1.073,1.073,0,0,1-1-1.45l1.073-2.861a1.079,1.079,0,0,1,1-.7h1.993l.891-4.159a1.073,1.073,0,0,1,2.1.449l-1.007,4.7.963,2.567a1.073,1.073,0,0,1-2.01.753L20.211,20.6H18.837l-.812,2.165a1.078,1.078,0,0,1-1,.7Zm-.335-1.2a.358.358,0,0,0,.209.46.363.363,0,0,0,.461-.209l.9-2.4a.358.358,0,0,1,.335-.232h1.87a.358.358,0,0,1,.335.232l.9,2.4a.359.359,0,0,0,.461.209.358.358,0,0,0,.209-.46l-1-2.665a.357.357,0,0,1-.015-.2l1.029-4.8a.358.358,0,0,0-.275-.425.359.359,0,0,0-.425.275l-.952,4.441a.357.357,0,0,1-.35.283H18.093a.359.359,0,0,0-.335.232l-1.073,2.861ZM23.2,8.81l-5.926-1.8h2.6a.358.358,0,0,0,.13-.691L13.8,3.9V3.073a1.073,1.073,0,1,0-2.146,0V3.9L5.447,6.316a.358.358,0,0,0,.13.691h2.6L2.254,8.81a.358.358,0,0,0,.024.691l4.649,1.073a.366.366,0,0,0,.08.009h4.649V15.59h-2.5a1.073,1.073,0,1,0,0,2.146h2.5v3.576H11.3a1.073,1.073,0,1,0,0,2.146h2.861a1.073,1.073,0,1,0,0-2.146H13.8V17.735h2.5a1.073,1.073,0,1,0,0-2.146H13.8V10.583h4.649a.365.365,0,0,0,.08-.009L23.18,9.5A.358.358,0,0,0,23.2,8.81ZM12.371,3.073a.358.358,0,1,1,.715,0v.715h-.715ZM7.483,6.291l4.6-1.788h1.3l4.6,1.788ZM6.894,9.832,3.742,9.1l5.577-1.7L6.894,9.832Zm.976.035,2.861-2.861h1.64V9.868Zm5.216.715V15.59h-.715V10.583Zm1.073,11.444a.358.358,0,0,1,0,.715H11.3a.358.358,0,0,1,0-.715Zm-1.073-.715h-.715V17.735h.715ZM16.305,16.3a.358.358,0,1,1,0,.715H9.153a.358.358,0,0,1,0-.715ZM13.086,9.868V7.007h1.64l2.861,2.861Zm5.477-.035L16.139,7.408l5.577,1.7-3.152.727Z"
                                transform="translate(-2 -2)" />
                        </svg>
                        <span>Ogród</span>
                    </div>
                </div>
            @endif

       
            <!-- LEVEL -->
            @if (!empty($floor))
                <div>
                    <div class="info-row">
                        <svg id="layers" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.798"
                            viewBox="0 0 18.51 17.798">
                            <g id="Group_282" data-name="Group 282">
                                <path id="Path_19" data-name="Path 19"
                                    d="M16.255,46.939a.3.3,0,0,1-.139-.035L7.151,42.011a.29.29,0,0,1,0-.509l8.966-4.893a.29.29,0,0,1,.277,0L25.359,41.5a.29.29,0,0,1,0,.509L16.393,46.9A.3.3,0,0,1,16.255,46.939ZM7.893,41.757l8.362,4.564,8.362-4.564-8.362-4.564Z"
                                    transform="translate(-7 -36.575)" />
                            </g>
                            <g id="Group_283" data-name="Group 283" transform="translate(0 6.75)">
                                <path id="Path_20" data-name="Path 20"
                                    d="M16.255,604.064a.3.3,0,0,1-.139-.035l-5.56-3.034-3.406-1.858a.29.29,0,0,1,0-.508l3.406-1.858a.29.29,0,1,1,.277.508l-2.94,1.6,2.94,1.6,5.422,2.958,5.422-2.958,2.94-1.6-2.94-1.6a.29.29,0,1,1,.277-.508l3.406,1.858a.29.29,0,0,1,0,.508l-3.406,1.858-5.56,3.034A.282.282,0,0,1,16.255,604.064Z"
                                    transform="translate(-7 -596.734)" />
                            </g>
                            <g id="Group_284" data-name="Group 284" transform="translate(0 10.468)">
                                <path id="Path_21" data-name="Path 21"
                                    d="M16.255,912.608a.3.3,0,0,1-.139-.035L7.151,907.68a.29.29,0,0,1,0-.509l3.406-1.858a.29.29,0,1,1,.277.509l-2.94,1.6,8.362,4.564,8.362-4.564-2.94-1.6a.29.29,0,1,1,.277-.509l3.406,1.858a.29.29,0,0,1,0,.509l-8.966,4.893A.3.3,0,0,1,16.255,912.608Z"
                                    transform="translate(-7 -905.278)" />
                            </g>
                        </svg>
                        <span>{{ $floor->number }}</span>
                    </div>
                </div>
            @endif


            {{-- ROOMS --}}
            @if ($property->rooms)
                <div>
                    <div class="info-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.481" height="16.48"
                            viewBox="0 0 16.481 16.48">
                            <g id="apartment" transform="translate(0.4 0.4)">
                                <path id="Path_346" data-name="Path 346"
                                    d="M25,8.011V2h9.67V12.192H31.795V17.68H29.443" transform="translate(-18.989 -2)"
                                    fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="0.8" />
                                <path id="Path_347" data-name="Path 347" d="M11.67,24.238,10.1,25.806H2V13H8.011"
                                    transform="translate(-2 -10.125)" fill="none" stroke="#000"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" />
                                <path id="Path_348" data-name="Path 348" d="M25,34v3.4"
                                    transform="translate(-18.989 -25.637)" fill="none" stroke="#000"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" />
                                <path id="Path_349" data-name="Path 349" d="M25,56v1.568"
                                    transform="translate(-18.989 -41.888)" fill="none" stroke="#000"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" />
                                <path id="Path_350" data-name="Path 350" d="M8.011,41H2"
                                    transform="translate(-2 -30.808)" fill="none" stroke="#000"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" />
                            </g>
                        </svg>
                        <span>{{ $property->rooms }}</span>
                    </div>
                </div>
            @endif

        </div>
        <!-- PDF and Details Button -->
        <div class="d-flex ap-pdf-box">
            @if ($property->file_pdf)
                <div class="pdf">
                    <a href="{{ asset('/investment/property/pdf/' . $property->file_pdf) }}" target="_blank"
                        class="btn btn-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11.936" height="15.914"
                            viewBox="0 0 11.936 15.914">
                            <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf"
                                d="M5.654,7.96A3,3,0,0,1,5.592,6.5C5.853,6.5,5.828,7.649,5.654,7.96ZM5.6,9.427a14.342,14.342,0,0,1-.883,1.949A11.445,11.445,0,0,1,6.673,10.7,4.026,4.026,0,0,1,5.6,9.427ZM2.676,13.306c0,.025.41-.168,1.085-1.25A4.3,4.3,0,0,0,2.676,13.306ZM7.708,4.973h4.227v10.2a.744.744,0,0,1-.746.746H.746A.744.744,0,0,1,0,15.168V.746A.744.744,0,0,1,.746,0H6.962V4.227A.748.748,0,0,0,7.708,4.973Zm-.249,5.34A3.12,3.12,0,0,1,6.133,8.641a4.468,4.468,0,0,0,.193-2A.778.778,0,0,0,4.84,6.434a5.168,5.168,0,0,0,.252,2.393,29.187,29.187,0,0,1-1.268,2.667s0,0-.006,0c-.842.432-2.288,1.383-1.694,2.114a.966.966,0,0,0,.668.311c.556,0,1.11-.559,1.9-1.921a17.717,17.717,0,0,1,2.456-.721,4.711,4.711,0,0,0,1.989.606.8.8,0,0,0,.612-1.349c-.432-.423-1.688-.3-2.288-.224Zm4.258-7.049L8.672.218A.745.745,0,0,0,8.144,0H7.957V3.979h3.979v-.19A.744.744,0,0,0,11.718,3.264ZM9.415,11.2c.127-.084-.078-.37-1.33-.28C9.238,11.41,9.415,11.2,9.415,11.2Z"
                                fill="#d7007a" />
                        </svg>
                        Pobierz PDF
                    </a>
                </div>
            @endif
            @if ($propertyLink)
                <div>
                    <a href="{{ $propertyLink }}" class="btn btn-primary btn-ap-check">
                        Sprawdź
                        <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293"
                            viewBox="0 0 4.553 8.293">
                            <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                                transform="translate(4.553 8.293) rotate(180)" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>

        @if ($propertyLink)
            <a class="ap-column-box--a" href="{{ $propertyLink }}"></a>
        @endif
    </div>
</div>
