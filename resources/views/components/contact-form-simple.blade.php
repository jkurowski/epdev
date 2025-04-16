@props([
    'id' => 'contact-form',
    'termsAccordionId' => 'termsAccordion',
    'selectAllId' => 'select-all',
    'terms' => [],
    'textareaProperty' => '',
    'textareaInvestment' => '',
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
<form id="{{ $id }}" autocomplete="off" action='{{ route('contact-form.store') }}' method="POST" class="p-0 p-lg-3">
    @csrf
    @if($investment)
        <input type="hidden" name="investment_id" value="{{ $investment->id }}">
        <input type="hidden" name="investment_name" value="{{ $investment->name }}">
    @endif
    <div class="row">
        <div class="col-12">
            <div id="form-alert-errors" class="alert-danger alert hide-empty"></div>
            <div id="form-alert-success" class="alert-success alert hide-empty"></div>
        </div>

        {{-- Name Field --}}
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" class="validate[required] form-control" id="form-user-name" placeholder="Imię i nazwisko" name="name">
                <label for="form-user-name">Imię i nazwisko <span class="required">*</span></label>
            </div>
        </div>

        {{-- Email and Phone Fields --}}
        <div class="col-12 ">
            <div class="form-floating mb-3">
                <input type="email" class="validate[required] form-control" id="form-user-email" placeholder="Adres e-mail" name="email" required>
                <label for="form-user-email">Adres e-mail <span class="required">*</span></label>
            </div>
        </div>
        <div class="col-12 ">
            <div class="form-floating mb-3">
                <input type="tel" class="validate[required] form-control" id="form-user-tel" placeholder="Telefon" name="phone">
                <label for="form-user-tel">Telefon <span class="required">*</span></label>
            </div>
        </div>

        {{-- Message Field --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control form-control-min" placeholder="Wiadomość" id="form-user-message" style="height: 100px"
                    name="message">Dzień dobry, interesuje mnie mieszkanie {{$textareaProperty}} w inwestycji {{$textareaInvestment}}. Proszę o kontakt.</textarea>
                <label for="form-user-message">Wiadomość <span class="required">*</span></label>
            </div>
        </div>

        {{-- Terms and Conditions Accordion --}}
        <x-form-check-accordion-normal :id="$termsAccordionId" :selectAllId="$selectAllId" :items="$terms" :textareaProperty="$textareaProperty" :textareaInvestment="$textareaInvestment" />

        {{-- Submit Button --}}
        <div class="col-12 d-flex justify-content-end">
            <script>
                document.write("<button data-btn-submit type=\"submit\" class=\"g-recaptcha btn btn-primary mt-5 btn-submit {{ $button_class ?? '' }} \" data-sitekey=\"{{ config('services.recaptcha_v3.siteKey') }}\" data-callback=\"onFormRecaptchaSuccess\" data-action=\"submitFormContact\">WYŚLIJ WIADOMOŚĆ<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"4.553\" height=\"8.293\" viewBox=\"0 0 4.553 8.293\"><path id=\"chevron_right_24dp_FILL0_wght100_GRAD0_opsz24\" d=\"M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z\" transform=\"translate(4.553 8.293) rotate(180)\" fill=\"currentColor\" /></svg></button>");
            </script>
            <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
        </div>
    </div>
</form>
