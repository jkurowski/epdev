<div class="main-search-box">
    <div class="title">
        Znajdź mieszkanie
        <br />
        dla siebie
    </div>
    <div>
        <form action="{{ route('front.developro.index') }}" method="GET">
          
            {{-- Dropdown for city selection --}}
            <div class="d-flex flex-column">
                <label for="apartments-city" class="subtitle mt-4 mb-3">
                    MIASTO
                </label>
                <select id="apartments-city" class="apartments-city" name="apartments-city">
                    <option value="">WYBIERZ Z LISTY</option>
                    @foreach ($cities as $cityValue => $cityName)
                        <option value="{{ $cityValue }}" {{ request('apartments-city') == $cityValue ? 'selected' : '' }}>
                            {{ $cityName }}
                        </option>
                    @endforeach
                </select>

            </div>


            <div class="subtitle mt-40px mb-3">LICZBA POKOI</div>
            <div class="d-flex">
                {{-- Checkboxes for apartment levels --}}
                <div class="levels-box">
                    @for ($i = 1; $i <= $levels; $i++)
                        <input type="checkbox" id="level{{ $i }}" class="level-input" name="rooms[]" 
                            value="{{ $i }}" {{ in_array($i, (array)request('rooms', [])) ? 'checked' : '' }} />
                        <label for="level{{ $i }}" class="level-label">
                            <span class="level-name">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            {{-- Dual handle range slider --}}
            <div class="subtitle mt-40px mb-3">METRAŻ</div>
            <div id="ap-range" data-range-min="{{ $rangeMin }}" data-range-max="{{ $rangeMax }}"></div>
            <input type="hidden" name="area-min" id="ap-range-min" value="{{ request('area-min') }}">
            <input type="hidden" name="area-max" id="ap-range-max" value="{{ request('area-max') }}">

            {{-- Search button --}}
            <button class="mt-3 btn btn-primary" type="submit">
                ZNAJDŹ MIESZKANIE
                <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                    <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                        d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                        transform="translate(4.553 8.293) rotate(180)" fill="currentColor"></path>
                </svg>
            </button>
        </form>
    </div>
</div>
