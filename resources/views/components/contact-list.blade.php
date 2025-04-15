@if (!empty($listTitle))
    <div class="list-title mb-4">{!! $listTitle !!}</div>
@endif

<ul class="list-unstyled contacts mt-3">
    {{-- Location --}}
    @if (!empty($location))
        <li class="pb-3 contact-box location">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <g id="Group_262" data-name="Group 262" transform="translate(-234 -747)">
                    <circle id="Ellipse_15" data-name="Ellipse 15" cx="16" cy="16" r="16"
                        transform="translate(234 747)" fill="#d7007a" />
                    <path id="Icon_metro-location" data-name="Icon metro-location"
                        d="M13.877,1.928A5.522,5.522,0,0,0,8.355,7.45c0,5.522,5.522,12.148,5.522,12.148S19.4,12.972,19.4,7.45a5.522,5.522,0,0,0-5.522-5.522Zm0,8.9A3.382,3.382,0,1,1,17.259,7.45,3.382,3.382,0,0,1,13.877,10.832Z"
                        transform="translate(236.146 752.572)" fill="none" stroke="#fff" stroke-width="1" />
                </g>
            </svg>
            <span class="location-info text-capitalize">
                {!! $location !!}
            </span>
        </li>
    @endif

    {{-- Phone --}}
    @if (!empty($phoneNumber))
        <li class="pb-3 contact-box phone">
            <a class="nav-link" href="tel:{{ $phoneNumber }}" aria-label="Zadzwoń">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <g id="Group_938" data-name="Group 938" transform="translate(-1209 -6066)">
                        <circle id="Ellipse_14" data-name="Ellipse 14" cx="16" cy="16" r="16"
                            transform="translate(1209 6066)" fill="#d7007a" />
                        <path id="Icon_feather-phone" data-name="Icon feather-phone"
                            d="M18.084,14.19v2.25a1.5,1.5,0,0,1-1.635,1.5,14.843,14.843,0,0,1-6.473-2.3,14.625,14.625,0,0,1-4.5-4.5,14.843,14.843,0,0,1-2.3-6.5A1.5,1.5,0,0,1,4.666,3h2.25a1.5,1.5,0,0,1,1.5,1.29A9.63,9.63,0,0,0,8.941,6.4,1.5,1.5,0,0,1,8.6,7.98l-.953.953a12,12,0,0,0,4.5,4.5l.953-.953a1.5,1.5,0,0,1,1.583-.338,9.63,9.63,0,0,0,2.108.525,1.5,1.5,0,0,1,1.29,1.523Z"
                            transform="translate(1214.332 6071.5)" fill="none" stroke="#fff" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1" />
                    </g>
                </svg>
                {{ $phoneNumber }}
            </a>
        </li>
    @endif

    {{-- Phone --}}
    @if (!empty($phoneNumberSecond))
        <li class="pb-3 contact-box phone">
            <a class="nav-link" href="tel:{{ $phoneNumberSecond }}" aria-label="Zadzwoń">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <g id="Group_938" data-name="Group 938" transform="translate(-1209 -6066)">
                        <circle id="Ellipse_14" data-name="Ellipse 14" cx="16" cy="16" r="16"
                            transform="translate(1209 6066)" fill="#d7007a" />
                        <path id="Icon_feather-phone" data-name="Icon feather-phone"
                            d="M18.084,14.19v2.25a1.5,1.5,0,0,1-1.635,1.5,14.843,14.843,0,0,1-6.473-2.3,14.625,14.625,0,0,1-4.5-4.5,14.843,14.843,0,0,1-2.3-6.5A1.5,1.5,0,0,1,4.666,3h2.25a1.5,1.5,0,0,1,1.5,1.29A9.63,9.63,0,0,0,8.941,6.4,1.5,1.5,0,0,1,8.6,7.98l-.953.953a12,12,0,0,0,4.5,4.5l.953-.953a1.5,1.5,0,0,1,1.583-.338,9.63,9.63,0,0,0,2.108.525,1.5,1.5,0,0,1,1.29,1.523Z"
                            transform="translate(1214.332 6071.5)" fill="none" stroke="#fff" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1" />
                    </g>
                </svg>
                {{ $phoneNumberSecond }}
            </a>
        </li>
    @endif


    {{-- Email --}}
    @if (!empty($email))
        <li class="pb-3 contact-box email">
            <a class="nav-link" href="mailto:{{ $email }}" aria-label="skontaktuj się z nami">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <g id="Group_939" data-name="Group 939" transform="translate(-1209 -6117)">
                        <g id="Group_181" data-name="Group 181" transform="translate(117 435)">
                            <circle id="Ellipse_15" data-name="Ellipse 15" cx="16" cy="16" r="16"
                                transform="translate(1092 5682)" fill="#d7007a" />
                            <g id="Icon_feather-mail" data-name="Icon feather-mail"
                                transform="translate(1100.921 5692.337)">
                                <path id="Path_9" data-name="Path 9"
                                    d="M4.416,6H15.742a1.42,1.42,0,0,1,1.416,1.416v8.495a1.42,1.42,0,0,1-1.416,1.416H4.416A1.42,1.42,0,0,1,3,15.911V7.416A1.42,1.42,0,0,1,4.416,6Z"
                                    transform="translate(-3 -6)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                                <path id="Path_10" data-name="Path 10" d="M17.158,9l-7.079,4.955L3,9"
                                    transform="translate(-3 -7.584)" fill="none" stroke="#fff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                            </g>
                        </g>
                    </g>
                </svg>
                {{ $email }}
            </a>
        </li>
    @endif

    {{-- Time --}}
    @if (!empty($openingHours))
        <li class="pb-3 contact-box location">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <g id="Group_1290" data-name="Group 1290" transform="translate(-1092 -6521)">
                    <circle id="Ellipse_15" data-name="Ellipse 15" cx="16" cy="16" r="16"
                        transform="translate(1092 6521)" fill="#d7007a" />
                    <g id="clock" transform="translate(1099.514 6528.514)">
                        <path id="Path_345" data-name="Path 345"
                            d="M8.486,0a8.486,8.486,0,1,0,8.486,8.486A8.482,8.482,0,0,0,8.486,0Zm.663,15.616v-.61a.663.663,0,1,0-1.326,0v.61A7.157,7.157,0,0,1,1.357,9.149h.61a.663.663,0,0,0,0-1.326h-.61A7.157,7.157,0,0,1,7.823,1.357v.61a.663.663,0,1,0,1.326,0v-.61a7.157,7.157,0,0,1,6.467,6.467h-.61a.663.663,0,1,0,0,1.326h.61a7.157,7.157,0,0,1-6.467,6.467Zm2.414-4.991a.663.663,0,0,1-.938.938L8.018,8.955a.663.663,0,0,1-.194-.469V4.575a.663.663,0,1,1,1.326,0V8.212Z"
                            fill="#fff" />
                    </g>
                </g>
            </svg>
            <span class="location-info text-capitalize">
                <strong>{{ $openingHours['days'] ?? 'Poniedziałek - Piątek' }}</strong> <br>
                {{ $openingHours['hours'] ?? '9:00 - 17:00' }}
            </span>
        </li>
    @endif
</ul>
