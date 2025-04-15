@props([
    'id' => 'contact-form',
    'termsAccordionId' => 'termsAccordion',
    'selectAllId' => 'select-all',
    'terms' => [],
    'investment' => null,
])

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- All errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="{{ $id }}" autocomplete="on" class="p-0 p-lg-3 validateForm" action='{{ route('contact-form.store') }}' method="POST">
    @if($investment)
        <input type="hidden" name="investment_id" value="{{ $investment->id }}">
        <input type="hidden" name="investment_name" value="{{ $investment->name }}">
    @endif
    @csrf
    <div class="row">
        <div class="col-12">
            <div id="form-errors" class="alert-danger alert hide-empty"></div>
            <div id="form-success" class="alert-success alert hide-empty"></div>
        </div>

        {{-- Name Field --}}
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" class="validate[required] form-control" id="user-name" placeholder="Imię i nazwisko" name="name">
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
        @if($investment)
            @if($investment->status == 1 && $investment->show_properties)
            {{-- City Selection --}}
            <x-form-cities />

            {{-- Area Selection --}}
            <div class="col-12">
                <div class="form-subtitle mt-3">Powierzchnia</div>
                <div class="d-flex gap-4 align-items-center justify-content-center">
                    <div id="ap-range-contact" data-range-min="{{ $minRoomArea }}" data-range-max="{{ $maxRoomArea }}"></div>
                    <input type="hidden" name="area-min" id="ap-range-contact-min" value="{{ $minRoomArea }}">
                    <input type="hidden" name="area-max" id="ap-range-contact-max" value="{{ $maxRoomArea }}">
                </div>
            </div>
            @endif
        @endif

        {{-- Message Field --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="validate[required] form-control" placeholder="Wiadomość" id="user-message" style="height: 100px" name="message"></textarea>
                <label for="user-message">Wiadomość <span class="required">*</span></label>
            </div>
        </div>

        {{-- Terms and Conditions Accordion --}}
        <x-form-check-accordion :id="$termsAccordionId" :selectAllId="$selectAllId" :items="$terms" />


        {{-- Submit Button --}}
        <div class="col-12 d-flex justify-content-end">
            <script type="text/javascript">
                document.write("<button data-btn-submit type=\"submit\" class=\"g-recaptcha btn btn-primary mt-5 btn-submit {{ $button_class ?? '' }} \" data-sitekey=\"{{ config('services.recaptcha_v3.siteKey') }}\" data-callback=\"onFormRecaptchaSuccess\" data-action=\"submitFormContact\">WYŚLIJ WIADOMOŚĆ<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"4.553\" height=\"8.293\" viewBox=\"0 0 4.553 8.293\"><path id=\"chevron_right_24dp_FILL0_wght100_GRAD0_opsz24\" d=\"M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z\" transform=\"translate(4.553 8.293) rotate(180)\" fill=\"currentColor\" /></svg></button>");
            </script>
            <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
        </div>
    </div>
</form>


@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/pl.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:false,
                promptPosition : "topRight:-137px, 16px",
                autoPositionUpdate: false
            });
        });

        function onFormRecaptchaSuccess(token) {
            $(".validateForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateForm").validationEngine('validate');
            if (isValid) {
                $("#contact-form").submit();
            } else {
                grecaptcha.reset();
            }
        }

        @if (session('success') || session('warning') || $errors->any())
        $(window).on('load', function() {
            const aboveHeight = $('header').outerHeight();
            const target = $('.validateForm');
            if (target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - aboveHeight - 80
                }, 1500, 'easeInOutExpo');
            } else {
                console.error('.validateForm element not found.');
            }
        });
        @endif
    </script>
@endpush