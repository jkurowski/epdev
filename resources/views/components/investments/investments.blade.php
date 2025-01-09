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
