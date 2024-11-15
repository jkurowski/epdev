@props([
    'id' => 'contact-form',
    'termsAccordionId' => 'termsAccordion',
    'selectAllId' => 'select-all',
    'terms' => [],
])

<form id="{{ $id }}" autocomplete="off" class="p-0 p-lg-3">
    <div class="row">
        <div class="col-12">
            <div id="form-errors" class="alert-danger alert hide-empty"></div>
            <div id="form-success" class="alert-success alert hide-empty"></div>
        </div>

        {{-- Name Field --}}
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="user-name" placeholder="Imię i nazwisko"
                    name="username" />
                <label for="user-name">Imię i nazwisko*</label>
            </div>
        </div>

        {{-- Email and Phone Fields --}}
        <div class="col-12 ">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="user-email" placeholder="Adres e-mail" name="email"
                    required />
                <label for="user-email">Adres e-mail*</label>
            </div>
        </div>
        <div class="col-12 ">
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="user-tel" placeholder="Telefon" name="tel" />
                <label for="user-tel">Telefon*</label>
            </div>
        </div>

        {{-- Message Field --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control form-control-min" placeholder="Wiadomość" id="user-message" style="height: 100px"
                    name="message">Dzień dobry, interesuje mnie mieszkanie Mieszkanie nr A.01.02 w inwestycji Apartamenty Talarowa. Proszę o kontakt.</textarea>
                <label for="user-message">Wiadomość</label>
            </div>
        </div>

        {{-- Terms and Conditions Accordion --}}
        <x-form-check-accordion :id="$termsAccordionId" :selectAllId="$selectAllId" :items="$terms" />

        {{-- Submit Button --}}
        <div class="col-12 d-flex justify-content-start">
            <button data-btn-submit type="submit" class="btn btn-primary mt-2 btn-submit" disabled>
                WYŚLIJ
                <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                    <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                        d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                        transform="translate(4.553 8.293) rotate(180)" fill="currentColor" />
                </svg>
            </button>
        </div>
    </div>
</form>
