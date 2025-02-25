<div class="main-search-box">
    <div class="title">Znajdź mieszkanie<br />dla siebie</div>
    <div>
        <form action="{{route('front.developro.properties')}}" method="GET">
          
            {{-- Dropdown for city selection --}}
            <div class="d-flex flex-column">
                <label for="apartments-city" class="subtitle mt-4 mb-3">MIASTO</label>
                <select id="apartments-city" class="apartments-city" name="apartments-city">
                    <option value="">Wszystkie</option>
                    @foreach ($active_cities as $city)
                        <option value="{{ $city->slug }}" {{ request('apartments-city') == $city->slug ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex flex-column">
                <label for="apartments-city" class="subtitle mt-4 mb-3">INWESTYCJA</label>
                <select id="apartments-invest" class="apartments-city" name="apartments-invest">
                    <option value="">Wszystkie</option>
                    @foreach ($active_investments as $i)
                        <option value="{{ $i->slug }}" {{ request('apartments-invest') == $i->slug ? 'selected' : '' }} data-city="{{ $i->city ? $i->city->slug : '' }}">
                            {{ $i->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="subtitle mt-40px mb-3">LICZBA POKOI</div>
            <div class="d-flex">
                {{-- Checkboxes for apartment levels --}}
                <div class="levels-box">
                    @for ($i = 1; $i <= $levels; $i++)
                        <input type="radio"
                               id="level{{ $i }}"
                               class="level-input"
                               name="rooms"
                               value="{{ $i }}" {{ request('rooms') == $i ? 'checked' : '' }}
                        />
                        <label for="level{{ $i }}" class="level-label">
                            <span class="level-name">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            {{-- Dual handle range slider --}}
            <div class="subtitle mt-40px mb-3">METRAŻ</div>
            <div id="ap-range" data-range-min="{{ $minRoomArea }}" data-range-max="{{ $maxRoomArea }}"></div>
            <input type="hidden" name="area-min" id="ap-range-min" value="{{ request('area-min') ?? $minRoomArea }}">
            <input type="hidden" name="area-max" id="ap-range-max" value="{{ request('area-max') ?? $maxRoomArea }}">

            {{-- Search button --}}
            <button class="mt-3 btn btn-primary" type="submit">
                ZNAJDŹ MIESZKANIE
                <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293"><path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24" d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z" transform="translate(4.553 8.293) rotate(180)" fill="currentColor"></path></svg>
            </button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const citySelect = document.getElementById('apartments-city');
        const investSelect = document.getElementById('apartments-invest');

        citySelect.value = "";
        investSelect.value = "";

        citySelect.addEventListener('change', function() {
            const selectedCity = citySelect.value;
            Array.from(investSelect.options).forEach(option => {
                if (selectedCity === '' || option.getAttribute('data-city') === selectedCity) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            if (selectedCity === '') {
                investSelect.value = '';
            }
        });

        const levelRadios = document.querySelectorAll('.levels-box .level-input');
        let lastCheckedRadio = null;

        levelRadios.forEach(radio => {
            radio.addEventListener('click', function (event) {
                if (lastCheckedRadio === this) {
                    this.checked = false;
                    lastCheckedRadio = null;
                } else {
                    lastCheckedRadio = this;
                }
            });
        });
    });
</script>
