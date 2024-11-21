<div class="search-estate">
    <form action="{{ route('pages.properties') }}" method="GET">
        <div class="form-box d-flex flex-column flex-lg-row justify-content-between gap-5 gap-lg-3">
            {{-- Dropdown for floor selection --}}
            <div class="d-flex gap-2 align-items-center">
                <label for="apartments-floor" class="subtitle ">
                    PIĘTRO:
                </label>
                <select id="apartments-floor" class="apartments-floor" name="apartments-floor">
                    @foreach ($floors as $floorValue => $floorName)
                        <option value="{{ $floorValue }}">
                            {{ $floorName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-vh"></div>
            {{-- Checkbox for selecting room numbers --}}
            <div class="d-flex gap-3 justify-content-lg-center align-items-center">
                <div class="subtitle ">LICZBA POKOI:</div>
                <div class="rooms-box">
                    @for ($i = 1; $i <= $rooms; $i++)
                        <input type="checkbox" id="room{{ $i }}" class="room-input" name="rooms[]"
                            value="{{ $i }}" {{ in_array($i, (array) request('rooms', [])) ? 'checked' : '' }} />
                        <label for="room{{ $i }}" class="room-label">
                            <span class="room-name">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            {{-- Dual handle range slider --}}
            <div class="d-flex gap-4 align-items-center">
                <div class="subtitle ">METRAŻ:</div>
                <div id="ap-range" data-range-min="{{ $rangeMin }}" data-range-max="{{ $rangeMax }}">
                    <input type="hidden" name="area-min" id="ap-range-min" value="{{ request('area-min') }}">
                    <input type="hidden" name="area-max" id="ap-range-max" value="{{ request('area-max') }}">
                </div>
            </div>
        </div>

        {{-- Search button --}}
        <button class="mt-3 btn btn-primary btn-primary-big" type="submit">
            pokaż dopasowane dla mnie układy
        </button>
    </form>
</div>
