@props(['tabs' => [], 'defaultEmptyMessage' => 'Brak planowanych inwestycji'])

@php
    $allInvestments = collect($tabs)->pluck('investments')->flatten(1)->all();
@endphp

<div class="tabs-component construction-tabs">
    <div class="tab-content mt-3" id="investmentTabsContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            @if (empty($allInvestments))
                <p class="text-center empty-message mt-4">{{ $defaultEmptyMessage }}</p>
            @else
                <div class="row g-4 gy-5">
                    @foreach ($allInvestments as $index => $investment)
                        <div class="col-12 col-lg-4" data-location="{{ $investment['city']['name'] }}">
                            <a class="investment-box" href="{{ route('front.developro.show', ['citySlug' => $investment['city']['slug'], 'slug' => $investment['slug']]) }}" data-aos="fade-right"
                               data-aos-delay="{{ $index * 50 }}">
                                {{-- <x-picture :webpSmall="$investment['webpSmall']" :webpLarge="$investment['webpLarge']" :pngSmall="$investment['pngSmall']" :pngLarge="$investment['pngLarge']"
                                    :defaultSrc="$investment['defaultSrc']" :alt="$investment['alt']" class="img-fluid" /> --}}
                                <img class="img-fluid mh-100" src="{{asset('investment/thumbs/'.$investment['file_thumb']) }}" alt="{{ $investment['name'] }}">

                                <div class="investment-inner">
                                    <div class="investment-subtitle">{{ $investment['city']['name'] }}</div>
                                    <div class="investment-title">{{ $investment['name'] }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @foreach ($tabs as $tab)
            <div class="col-12 col-lg-6 col-xl-4" data-location="1" data-target-box="1">
                <div class="construction-box">
                    <div class="position-relative">
                        <img class="img-fluid mh-100" src="{{asset('investment/thumbs/'.$investment['file_thumb']) }}" alt="{{ $investment['name'] }}">
                    </div>
                    <div class="construction-inner">

                        <div class="construction-date">{{ $investment['city']['name'] }}</div>
                        <div class="construction-title">{{ $investment['name'] }}</div>
                        <hr class="construction-hr">
                        <a href="{{ route('front.developro.show', ['citySlug' => $investment['city']['slug'], 'slug' => $investment['slug']]) }}" class="construction-btn">
                            SPRAWDŹ
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                 viewBox="0 0 48 48">
                                <g transform="translate(-718 -1066)">
                                    <g transform="translate(-179 -918)">
                                        <path class="chevron" d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z" transform="translate(924.873 2015.367) rotate(180)" fill="#d7007a" />
                                        <g transform="translate(945 2032) rotate(180)" fill="none"
                                           stroke="#d7007a" stroke-width="1">
                                            <circle cx="24" cy="24" r="24" stroke="none" />
                                            <circle cx="24" cy="24" r="23.5" fill="none" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="{{ $tab['id'] }}" role="tabpanel"
                 aria-labelledby="{{ $tab['id'] }}-tab">
                @if (empty($tab['investments']))
                    <p class="text-center empty-message mt-4">{{ $tab['emptyMessage'] ?? $defaultEmptyMessage }}</p>
                @else
                    <div class="row g-4 gy-5">
                        @foreach ($tab['investments'] as $investment)
                            <div class="col-12 col-lg-4" data-location="{{ $investment['city']['name'] }}">
                                <a class="investment-box" href="{{ route('front.developro.show', ['citySlug' => $investment['city']['slug'], 'slug' => $investment['slug']]) }}">
                                    <img class="img-fluid mh-100" src="{{asset('investment/thumbs/'.$investment['file_thumb']) }}" alt="{{ $investment['name'] }}">

                                    <div class="investment-inner">
                                        <div class="investment-subtitle">{{ $investment['city']['name'] }}</div>
                                        <div class="investment-title">{{ $investment['name'] }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
