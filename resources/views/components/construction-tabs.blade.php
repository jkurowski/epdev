@props([
    'tabs' => [
        [
            'id' => 'all',
            'label' => 'Wszystkie',
            'streets' => [],
        ],
    ],
])

<div class="tabs-component construction-tabs">
    <ul class="nav nav-tabs" id="customTabs" role="tablist">
        @foreach ($tabs as $index => $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="{{ $tab['id'] }}-tab"
                    data-bs-toggle="tab" data-bs-target="#{{ $tab['id'] }}" type="button" role="tab"
                    aria-controls="{{ $tab['id'] }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ $tab['label'] }}
                </button>
            </li>
        @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content construction-content mt-3" id="customTabsContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="checkbox-list">
                @foreach ($tabs as $tab)
                    @foreach ($tab['streets'] as $street)
                        <div class="form-check" data-location="{{ $street['data_location'] }}">
                            <input type="checkbox" class="form-check-input street-checkbox"
                                id="{{ Str::slug($street['boxId']) }}" data-target="{{ $street['boxId'] }}"
                                name="streets[]" checked>
                            <label class="form-check-label" for="{{ Str::slug($street['boxId']) }}">
                                {{ $street['name'] }}
                            </label>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        @foreach ($tabs as $index => $tab)
            @if ($tab['id'] !== 'all')
                <div class="tab-pane fade" id="{{ $tab['id'] }}" role="tabpanel"
                    aria-labelledby="{{ $tab['id'] }}-tab">
                    <div class="checkbox-list">
                        @foreach ($tab['streets'] as $street)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input street-checkbox"
                                    id="{{ Str::slug($street['boxId']) }}" data-target="{{ $street['boxId'] }}"
                                    name="streets[]" checked>
                                <label class="form-check-label" for="{{ Str::slug($street['boxId']) }}">
                                    {{ $street['name'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div id="construction-boxes" class="mt-5">
    <div class="row g-4">
        @foreach ($tabs as $index => $tab)
            @foreach ($tab['streets'] as $street)
                <div class="col-12 col-lg-6 col-xl-4" data-location="{{ $street['data_location'] }}"
                    data-target-box="{{ $street['boxId'] }}">
                    <div class="construction-box">
                        <x-picture :defaultSrc="asset('investment/articles/thumbs/' . $street['defaultSrc'])" :alt="$street['alt']" class="img-fluid" />
                        <div class="construction-inner">

                            <div class="construction-date">{{ $street['date'] }}</div>
                            <div class="construction-title">{{ $street['name'] }}</div>
                            <p class="construction-subtitle">{{ $street['subtitle'] }}</p>
                            <hr class="construction-hr" />
                            <a href="{{ $street['href'] }}" class="construction-btn">
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
        @endforeach
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-link');
        const checkboxes = document.querySelectorAll('.street-checkbox');
        const constructionBoxes = document.querySelectorAll('.construction-box');

        filterConstructionBoxes('all');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const selectedLocation = this.getAttribute('data-bs-target').replace('#', '');
                filterConstructionBoxes(selectedLocation);
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                syncCheckboxState(this);
                toggleConstructionBox(this);
            });
        });

        function filterConstructionBoxes(location) {
            checkboxes.forEach(checkbox => {
                const targetBoxId = checkbox.getAttribute('data-target');
                const targetBox = document.querySelector(`[data-target-box="${targetBoxId}"]`);
                const boxLocation = targetBox.getAttribute('data-location');

                if (location === 'all' || boxLocation === location) {
                    checkbox.closest('.form-check').style.display = 'block';
                    toggleConstructionBox(checkbox);
                } else {
                    checkbox.closest('.form-check').style.display = 'none';
                    targetBox.style.display = 'none';
                }
            });
        }

        function toggleConstructionBox(checkbox) {
            const targetBoxId = checkbox.getAttribute('data-target');
            const targetBox = document.querySelector(`[data-target-box="${targetBoxId}"]`);

            if (targetBox) {
                targetBox.style.display = checkbox.checked ? 'block' : 'none';
            }
        }

        function syncCheckboxState(changedCheckbox) {
            const targetBoxId = changedCheckbox.getAttribute('data-target');
            const isChecked = changedCheckbox.checked;

            checkboxes.forEach(checkbox => {
                if (checkbox.getAttribute('data-target') === targetBoxId) {
                    checkbox.checked = isChecked;
                }
            });
        }
    });
</script>
