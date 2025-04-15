@props(['tabs' => [], 'defaultEmptyMessage' => 'Brak planowanych inwestycji'])

@php
    $allInvestments = collect($tabs)->pluck('investments')->flatten(1)->all();
@endphp

<div class="tabs-component investments">
    <ul class="nav nav-tabs" id="investmentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                role="tab" aria-controls="all" aria-selected="true">
                Wszystkie
            </button>
        </li>
        @foreach ($tabs as $index => $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="{{ $tab['id'] }}-tab" data-bs-toggle="tab"
                    data-bs-target="#{{ $tab['id'] }}" type="button" role="tab"
                    aria-controls="{{ $tab['id'] }}" aria-selected="false">
                    {{ $tab['label'] }}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content mt-3" id="investmentTabsContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            @if (empty($allInvestments))
                <p class="text-center empty-message mt-4">{{ $defaultEmptyMessage }}</p>
            @else
                <div class="row g-4 gy-5" id="construction-boxes">
                    @foreach ($allInvestments as $index => $investment)
                        <div class="col-12 col-lg-4" data-location="{{ $investment['city']['name'] }}">
    

                            <div class="construction-box">
                                <div class="position-relative">
                                    <x-picture defaultSrc="{{asset('investment/thumbs/'.$investment['file_thumb']) }}" alt="{{ $investment['name'] }}" class="img-fluid" />
                                </div>
                                <div class="construction-inner">
        
                                    <div class="construction-date">{{ $investment['city']['name'] }}</div>
                                    <div class="construction-title">{{ $investment['name'] }}</div>
                                    <hr class="construction-hr">
                                    <a href="{{ route('front.developro.show', ['citySlug' => $investment['city']['slug'], 'slug' => $investment['slug']]) }}" class="construction-btn">
                                        SPRAWDŹ
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            viewBox="0 0 48 48">
                                            <g id="Group_1391" data-name="Group 1391" transform="translate(-718 -1066)">
                                                <g id="Group_1390" data-name="Group 1390" transform="translate(-179 -918)">
                                                    <path class="chevron" id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                                        d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                                                        transform="translate(924.873 2015.367) rotate(180)" fill="#d7007a" />
                                                    <g id="Ellipse_27" data-name="Ellipse 27"
                                                        transform="translate(945 2032) rotate(180)" fill="none"
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
                    @endforeach
                </div>
            @endif
        </div>

        @foreach ($tabs as $tab)
            <div class="tab-pane fade" id="{{ $tab['id'] }}" role="tabpanel"
                aria-labelledby="{{ $tab['id'] }}-tab">
                @if (empty($tab['investments']))
                    <p class="text-center empty-message mt-4">{{ $tab['emptyMessage'] ?? $defaultEmptyMessage }}</p>
                @else
                    <div class="row g-4 gy-5" id="construction-boxes">
                        @foreach ($tab['investments'] as $investment)
                            <div class="col-12 col-lg-4" data-location="{{ $investment['city']['name'] }}">
                                <div class="construction-box">
                                    <div class="position-relative">
                                        <x-picture defaultSrc="{{asset('investment/thumbs/'.$investment['file_thumb']) }}" alt="{{ $investment['name'] }}" class="img-fluid" />
                                    </div>
                                    <div class="construction-inner">
            
                                        <div class="construction-date">{{ $investment['city']['name'] }}</div>
                                        <div class="construction-title">{{ $investment['name'] }}</div>
                                        <hr class="construction-hr">
                                        <a href="{{ route('front.developro.show', ['citySlug' => $investment['city']['slug'], 'slug' => $investment['slug']]) }}" class="construction-btn">
                                            SPRAWDŹ
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                viewBox="0 0 48 48">
                                                <g id="Group_1391" data-name="Group 1391" transform="translate(-718 -1066)">
                                                    <g id="Group_1390" data-name="Group 1390" transform="translate(-179 -918)">
                                                        <path class="chevron" id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                                            d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                                                            transform="translate(924.873 2015.367) rotate(180)" fill="#d7007a" />
                                                        <g id="Ellipse_27" data-name="Ellipse 27"
                                                            transform="translate(945 2032) rotate(180)" fill="none"
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
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
