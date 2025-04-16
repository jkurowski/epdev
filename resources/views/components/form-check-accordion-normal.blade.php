@props([
    'id' => 'accordionExample',
    'selectAllId' => 'selectall',
    'rowId' => $rowId ?? 'rodo'
])

<div id="{{ $rowId }}" class="row">
    <div class="col-12">
        <div class="form-check mt-4 mb-2 accordion-form-check p-0">
            <input type="checkbox" id="form-{{ $selectAllId }}" class="form-check-input select-all-checkbox">
            <label for="form-{{ $selectAllId }}" class="form-check-label ms-2">Zaznacz wszystkie zgody</label>
        </div>
    </div>

    <div class="col-12 accordion-form-check" id="{{ $id }}">
        @foreach ($required_rodo_rules as $rule)
            <div class="accordion-item">
                <h2 class="accordion-header" id="form-heading_rule_{{ $rule->id }}">
                    <input type="checkbox" id="form-rule_{{ $rule->id }}"
                           name="rule_{{ $rule->id }}"
                           value="1"
                           class="form-check-input term-checkbox @if ($rule->required === 1) validate[required] @endif"
                           data-prompt-position="topLeft:0">

                        <label for="form-rule_{{ $rule->id }}" class="accordion-button form-check-label rules-text ms-2">
                            <span class="collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#form_collapse_rule_{{ $rule->id }}"
                                  aria-expanded="false"
                                  aria-controls="form_collapse_rule_{{ $rule->id }}"
                            role="button">{{ $rule->title }} <span class="required">*</span></span>
                        </label>
                </h2>
                <div id="form_collapse_rule_{{ $rule->id }}"
                     class="accordion-collapse collapse @error('rule_' . $rule->id) is-invalid @enderror"
                     aria-labelledby="form-heading_rule_{{ $rule->id }}"
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
            function setupCheckboxHandler(formId) {
                const form = document.querySelector(`#${formId}`);
                if (!form) return;

                const selectAllCheckbox = form.querySelector(".select-all-checkbox");
                const termCheckboxes = form.querySelectorAll(".term-checkbox");

                if (!selectAllCheckbox || termCheckboxes.length === 0) return;

                // Remove existing event listeners before adding new ones
                selectAllCheckbox.removeEventListener("change", handleSelectAll);
                termCheckboxes.forEach(checkbox => {
                    checkbox.removeEventListener("change", handleCheckboxChange);
                });

                function handleSelectAll() {
                    console.log(`Select All Changed: ${this.checked} Form ID: ${formId}`);

                    termCheckboxes.forEach((checkbox) => {
                        checkbox.checked = this.checked;
                        console.log(`Checkbox (${checkbox.id}) checked: ${checkbox.checked}`);
                    });
                }

                function handleCheckboxChange() {
                    console.log(`Checkbox (${this.id}) changed - Checked: ${this.checked} Form ID: ${formId}`);

                    if (![...termCheckboxes].every(chk => chk.checked)) {
                        selectAllCheckbox.checked = false;
                        console.log("A checkbox was unchecked, so Select All is now false.");
                    } else {
                        selectAllCheckbox.checked = true;
                        console.log("All checkboxes are checked, so Select All is now true.");
                    }
                }

                // Attach event listeners only once
                selectAllCheckbox.addEventListener("change", handleSelectAll);
                termCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener("change", handleCheckboxChange);
                });
            }

            // Initialize separate handlers for each form
            setupCheckboxHandler("rodo");
            setupCheckboxHandler("modalRodo");
        });
    </script>
@endpush