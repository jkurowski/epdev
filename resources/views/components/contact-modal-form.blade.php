@props([
    'id' => 'contact-form',
    'termsAccordionId' => 'termsAccordion-modal',
    'selectAllId' => 'select-all-modal',
    'terms' => [],
    'investment' => null,
])
<form id="fastForm" autocomplete="on" action="/submit-form" method="POST" class="validateModalForm">
    <div id="modalMessage"></div>
    <div id="formBody">
        <div class="modal-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-12">
                <div id="formErrors" class="alert alert-danger hide-empty"></div>
                <div id="form-success" class="alert alert-success hide-empty"></div>
            </div>

            {{-- Name Field --}}
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="validate[required] form-control" id="user-name" placeholder="Imię i nazwisko" name="name" required>
                    <label for="user-name">Imię i nazwisko <span class="required">*</span></label>
                </div>
            </div>

            {{-- Email and Phone Fields --}}
            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="email" class="validate[required] form-control" id="user-email" placeholder="Adres e-mail" name="email" required>
                    <label for="user-email">Adres e-mail <span class="required">*</span></label>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="tel" class="validate[required] form-control" id="user-tel" placeholder="Telefon" name="phone">
                    <label for="user-tel">Telefon <span class="required">*</span></label>
                </div>
            </div>

            {{-- City Selection --}}
            <x-form-cities />

            {{-- Area Selection --}}
            <div class="col-12">
                <div class="form-subtitle mt-3">Powierzchnia</div>
                <div class="d-flex gap-4 align-items-center justify-content-center">
                    <div id="ap-range-contact2" data-range-min2="{{ $minRoomArea }}" data-range-max2="{{ $maxRoomArea }}"></div>
                    <input type="hidden" name="area-min" id="ap-range-contact-min2" value="{{ $minRoomArea }}">
                    <input type="hidden" name="area-max" id="ap-range-contact-max2" value="{{ $maxRoomArea }}">
                </div>
            </div>

            {{-- Message Field --}}
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Wiadomość" id="user-message" style="height: 100px" name="message"></textarea>
                    <label for="user-message">Wiadomość <span class="required">*</span></label>
                </div>
            </div>

            {{-- Terms and Conditions Accordion --}}
            <x-form-check-accordion :id="$termsAccordionId" :selectAllId="$selectAllId" rowId="modalRodo" :items="$terms" />
        </div>
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-submit" data-bs-dismiss="modal">ZAMKNIJ</button>
        <script>
            document.write("<button data-btn-submit type=\"submit\" class=\"g-recaptcha btn btn-primary btn-submit {{ $button_class ?? '' }} \" data-sitekey=\"{{ config('services.recaptcha_v3.siteKey') }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">WYŚLIJ WIADOMOŚĆ<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"4.553\" height=\"8.293\" viewBox=\"0 0 4.553 8.293\"><path id=\"chevron_right_24dp_FILL0_wght100_GRAD0_opsz24\" d=\"M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z\" transform=\"translate(4.553 8.293) rotate(180)\" fill=\"currentColor\" /></svg></button>");
        </script>
        <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
    </div>
    </div>
</form>
@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/pl.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        $(document).ready(function(){
            $(".validateModalForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:false,
                promptPosition : "topRight:-137px",
                autoPositionUpdate: false
            });
        });

        function onRecaptchaSuccess(token) {
            $(".validateModalForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateModalForm").validationEngine('validate');
            if (isValid) {
                sendModal();
            } else {
                alert.hide().html('');
                $("#modalMessage").html('');
                grecaptcha.reset();
            }
        }

        function sendModal(){
            // Get the reCAPTCHA token
            const token = grecaptcha.getResponse();
            const alert = $('#formErrors');


            // Check if the token is available
            if (!token) {
                console.error("reCAPTCHA token is missing");
                return;
            }

            // Serialize the form data
            const formData = $(".validateModalForm").serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $(".validateModalForm").attr("action"),
                method: $(".validateModalForm").attr("method") || "POST",
                data: formData,
                beforeSend: function() {
                    console.log("Submitting form...");
                },
                success: function(response) {
                    $("#modalMessage").html('<div class="alert alert-success m-3 text-center" role="alert">Formularz został wysłany pomyślnie.</div>');
                    alert.hide().html('');
                    $(".validateModalForm").trigger("reset");
                    grecaptcha.reset();
                },
                error: function (result) {
                    if (result.responseJSON.errors) {
                        alert.html('');
                        $.each(result.responseJSON.errors, function (key, value) {
                            alert.show();
                            alert.append('<span class="d-block">' + value + '</span>');
                        });
                    }
                    grecaptcha.reset();
                },
            });
        }
    </script>
@endpush

