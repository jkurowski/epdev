@props([
    'id' => 'accordionExample',
    'selectAllId' => 'selectall',
])

<div id="rodomodal" class="row">
    <div class="col-12">
        <div class="form-check mt-4 mb-2 accordion-form-check p-0">
            <input type="checkbox" id="{{ $selectAllId }}" class="form-check-input select-all-checkbox">
            <label for="{{ $selectAllId }}" class="form-check-label ms-2">Zaznacz wszystkie zgody</label>
        </div>
    </div>

    <div class="col-12 accordion-form-check" id="{{ $id }}">
        @foreach ($required_rodo_rules as $rule)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading_rule_{{ $rule->id }}">
                    <input type="checkbox" id="rule_{{ $rule->id }}"
                           name="rule_{{ $rule->id }}"
                           value="1"
                           class="form-check-input term-checkbox @if ($rule->required === 1) validate[required] @endif"
                           data-prompt-position="topLeft:0">
                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse_rule_{{ $rule->id }}"
                            aria-expanded="false"
                            aria-controls="collapse_rule_{{ $rule->id }}">
                        <label for="rule_{{ $rule->id }}" class="form-check-label rules-text ms-2">
                            {{ $rule->title }} <span class="required">*</span>
                        </label>
                    </button>
                </h2>
                <div id="collapse_rule_{{ $rule->id }}"
                     class="accordion-collapse collapse @error('rule_' . $rule->id) is-invalid @enderror"
                     aria-labelledby="heading_rule_{{ $rule->id }}"
                     data-bs-parent="#{{ $id }}">
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
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".select-all-checkbox").forEach(selectAllCheckbox => {
                selectAllCheckbox.addEventListener("change", function () {
                    const form = this.closest(".row"); // Find the closest form section
                    const termCheckboxes = form.querySelectorAll(".term-checkbox");

                    console.log("Select All Changed:", this.checked, "Form ID:", form.id);

                    termCheckboxes.forEach((checkbox, index) => {
                        checkbox.checked = this.checked;
                        console.log(`Checkbox ${index} (${checkbox.id}) checked:`, checkbox.checked);
                    });
                });
            });

            document.querySelectorAll(".term-checkbox").forEach(checkbox => {
                checkbox.addEventListener("change", function () {
                    const form = this.closest(".row"); // Find the closest form section
                    const selectAllCheckbox = form.querySelector(".select-all-checkbox");
                    const termCheckboxes = form.querySelectorAll(".term-checkbox");

                    console.log(`Checkbox (${this.id}) changed - Checked:`, this.checked);

                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                        console.log("A checkbox was unchecked, so Select All is now false.");
                    } else if ([...termCheckboxes].every(chk => chk.checked)) {
                        selectAllCheckbox.checked = true;
                        console.log("All checkboxes are checked, so Select All is now true.");
                    }
                });
            });
        });

    </script>
@endpush