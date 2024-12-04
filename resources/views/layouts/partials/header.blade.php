<header class="sticky-top bg-black d-flex">
    <nav class="navbar navbar-expand-xl py-0  bg-black">
        <div class="d-flex justify-content-between position-relative w-100 h-100">
            {{--  --}}
            {{-- LOGO --}}
            {{--  --}}
            <div class="nav-logo-container d-flex gap-2  align-items-center">
                <a class="text-center d-inline-flex justify-content-center {{ request()->routeIs('pages.homepage') ? 'active' : '' }}"
                    href="{{ route('pages.homepage') }}">
                    <x-picture webpSmall="images/reusable/logo.webp" webpLarge="images/reusable/logo@2x.webp"
                        pngSmall="images/reusable/logo.png" pngLarge="images/reusable/logo@2x.png"
                        defaultSrc="images/reusable/logo@2x.png" alt="Logo EP Development" class="nav-logo img-fluid" />
                </a>
                <div class="nav-text flex-grow-1 text-center">
                    Witamy
                    <br />
                    w okolicy.
                </div>
            </div>

            {{--  --}}
            {{-- TOGGLE BUTTON / MOBILE --}}
            {{--  --}}
            <button class="navbar-toggler order-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon-x">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                        class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </span>
            </button>

            {{--  --}}
            {{-- NAVIGATION --}}
            {{--  --}}

            <div class="collapse navbar-collapse justify-content-end bg-black position-relative" id="navbarNav">
                <ul class="navbar-nav fw-light py-4 py-xl-0 align-items-xl-center">
                    {{--  --}}
                    {{-- Mieszkania --}}
                    {{--  --}}
                    <li class="nav-item dropdown">
                        <a href="{{route('front.developro.properties')}}">Mieszkania</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                        <ul class="dropdown-menu">
                            @foreach ($active_cities as $city)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('front.developro.index', $city->slug) }}">
                                        {{ $city->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    {{--  --}}
                    {{-- Lokale usługowe --}}
                    {{--  --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pages.currently-for-sale') ? 'active' : '' }}"
                            href="{{route('front.developro.properties')}}">
                            Lokale Usługowe
                        </a>
                    </li>

                    {{--  --}}
                    {{-- O nas --}}
                    {{--  --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pages.about-ep-development') ? 'active' : '' }}"
                            href="{{ route('pages.about-ep-development') }}">
                            O EP Development
                        </a>
                    </li>

                    {{--  --}}
                    {{-- Dziennik Budowy --}}
                    {{--  --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('front.investment.news') ? 'active' : '' }}"
                            href="{{ route('front.investment.news') }}">
                            Dziennik Budowy
                        </a>
                    </li>

                    {{--  --}}
                    {{-- Kontakt --}}
                    {{--  --}}
                    <li class="nav-item dropdown">
                        <a class="{{ request()->routeIs('pages.contact-office') ? 'active' : '' }}"
                            href="{{ route('pages.contact-office') }}">
                            Kontakt
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('pages.contact-office') . '#biura' }}">
                                    Biura
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('pages.contact-after-sales') }}">
                                    Obsługa posprzedażowa
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--  --}}
                    {{-- MAIL ICON - TO CHANGE --}}
                    {{--  --}}
                    <li class="nav-item">
                        <a  class="nav-link" href="mailto:lead@epdevelopment.com.pl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <g id="Group_939" data-name="Group 939" transform="translate(-1209 -6117)">
                                    <g id="Group_181" data-name="Group 181" transform="translate(117 435)">
                                        <circle id="Ellipse_15" data-name="Ellipse 15" cx="16" cy="16"
                                            r="16" transform="translate(1092 5682)" fill="#d7007a" />
                                        <g id="Icon_feather-mail" data-name="Icon feather-mail"
                                            transform="translate(1100.921 5692.337)">
                                            <path id="Path_9" data-name="Path 9"
                                                d="M4.416,6H15.742a1.42,1.42,0,0,1,1.416,1.416v8.495a1.42,1.42,0,0,1-1.416,1.416H4.416A1.42,1.42,0,0,1,3,15.911V7.416A1.42,1.42,0,0,1,4.416,6Z"
                                                transform="translate(-3 -6)" fill="none" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                            <path id="Path_10" data-name="Path 10" d="M17.158,9l-7.079,4.955L3,9"
                                                transform="translate(-3 -7.584)" fill="none" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    {{--  --}}
                    {{-- MAIL ICON - END --}}
                    {{--  --}}
                </ul>
            </div>
        </div>
    </nav>
</header>
