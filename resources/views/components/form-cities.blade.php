@props(['cities', 'label' => 'Wybierz miasto'])

@if (count($cities) > 0)
    <div class="col-12">
        <div class="form-subtitle mt-3">{{ $label }}</div>
        @foreach ($cities as $value => $city)
            <div class="form-check text-start pt-3">
                <input class="form-check-input" type="radio" id="city-{{ $value }}" name="city"
                    value="{{ $value }}" />
                <label class="form-check-label small fw-medium" for="city-{{ $value }}">{{ $city }}</label>
            </div>
        @endforeach
    </div>
@endif
