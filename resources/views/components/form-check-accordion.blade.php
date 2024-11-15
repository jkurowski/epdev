@props([
    'id' => 'accordionExample',
    'selectAllId' => 'select-all',
])

<div class="form-check mt-4 mb-2 accordion-form-check">
    <input type="checkbox" id="{{ $selectAllId }}" class="form-check-input select-all-checkbox">
    <label for="{{ $selectAllId }}" class="form-check-label">Zaznacz wszystkie zgody</label>
</div>

<div class="accordion accordion-form-check" id="{{ $id }}">
    @foreach ($required_rodo_rules as $rule)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading_rule_{{ $rule->id }}">
                <input type="checkbox" id="rule_{{ $rule->id }}" name="rule_{{ $rule->id }}" value="1"
                    class="form-check-input term-checkbox"
                    @if ($rule->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0"
                    onclick="event.stopPropagation();">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse_rule_{{ $rule->id }}" aria-expanded="false"
                    aria-controls="collapse_rule_{{ $rule->id }}">
                    <label for="rule_{{ $rule->id }}" class="form-check-label rules-text ms-2">
                        @if ($rule->id === 1)
                            Wyrażam zgodę na otrzymywanie informacji marketingowych drogą elektroniczną.
                        @endif
                        @if ($rule->id === 2)
                            Wyrażam zgodę na marketing telefoniczny.
                        @endif
                        @if ($rule->id === 3)
                            Wyrażam zgodę na personalizację treści.
                        @endif
                    </label>
                </button>
            </h2>
            <div id="collapse_rule_{{ $rule->id }}"
                class="accordion-collapse collapse @error('rule_' . $rule->id) is-invalid @enderror"
                aria-labelledby="heading_rule_{{ $rule->id }}" data-bs-parent="#{{ $id }}">
                <div class="accordion-body">
                    {!! $rule->text !!}
                    @error('rule_' . $rule->id)
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    @endforeach

</div>
@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectAllCheckbox = document.querySelector(".select-all-checkbox");
        const termCheckboxes = document.querySelectorAll(".term-checkbox");

        selectAllCheckbox.addEventListener("change", function() {
            termCheckboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        termCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                } else if (Array.from(termCheckboxes).every((chk) => chk.checked)) {
                    selectAllCheckbox.checked = true;
                }
            });
        });
    });
</script>
@endpush