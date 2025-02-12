<div class="search-estate">
    @isset($route)
    <form action="{{ $route }}" method="GET" id="searchEstate">
    @else
    <form action="{{route('front.developro.properties')}}" method="GET" id="searchEstate">
    @endif
        <div class="form-box d-flex flex-column flex-lg-row justify-content-between gap-5 gap-lg-3">
            {{-- Dropdown for floor selection --}}
            <div class="d-flex gap-2 align-items-center">
                <label for="apartments-floor" class="subtitle ">
                    PIĘTRO:
                </label>
                <select id="apartments-floor" class="apartments-floor" name="apartments-floor">
                    <option value="" {{ request('apartments-floor') == '' ? 'selected' : '' }}>Piętro</option>
                    @foreach ($floors as $floorValue => $floorName)
                        <option value="{{ $floorValue }}" {{ request('apartments-floor') == (string) $floorValue ? 'selected' : '' }}>
                            {{ $floorName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-vh"></div>
            {{-- Checkbox for selecting room numbers --}}
            <div class="d-flex gap-3 justify-content-lg-center align-items-md-center flex-column flex-md-row">
                <div class="subtitle ">LICZBA POKOI:</div>
                <div class="rooms-box">
                    @for ($i = 1; $i <= $rooms; $i++)
                        <input type="radio" id="room{{ $i }}" class="room-input" name="rooms"
                            value="{{ $i }}" {{ request('rooms') == $i ? 'checked' : '' }} />
                        <label for="room{{ $i }}" class="room-label">
                            <span class="room-name">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            {{-- Dual handle range slider --}}
            <div class="d-flex gap-4 align-items-center">
                <div class="subtitle ">METRAŻ:</div>
                <div id="ap-range" data-range-min="{{ $minRoomArea }}" data-range-max="{{ $maxRoomArea }}">
                    <input type="hidden" name="area-min" id="ap-range-min" value="{{ request('area-min') ?? $minRoomArea }}">
                    <input type="hidden" name="area-max" id="ap-range-max" value="{{ request('area-max') ?? $maxRoomArea }}">
                </div>
            </div>
        </div>

        {{-- Search button --}}
        <div class="row">
            <div class="col-12 column-gap-3 row-gap-2 pt-3 d-flex flex-column flex-md-row justify-content-center align-items-center">
                <button class="m-0 btn btn-primary btn-primary-big" type="submit">pokaż dopasowane dla mnie układy</button>
                <button class="m-0 btn btn-primary btn-primary-big" type="reset">Wyczyść filtry</button>
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const levelRadios = document.querySelectorAll('.rooms-box .room-input');
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
