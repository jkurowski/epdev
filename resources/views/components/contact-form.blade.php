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
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="{{ $id }}" autocomplete="on" class="p-0 p-lg-3" action='{{ route('contact-form.store') }}' method="POST">
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
                <input type="text" class="form-control" id="user-name" placeholder="Imię i nazwisko"
                    name="name" />
                <label for="user-name">Imię i nazwisko*</label>
            </div>
        </div>

        {{-- Email and Phone Fields --}}
        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="user-email" placeholder="Adres e-mail" name="email"
                    required />
                <label for="user-email">Adres e-mail*</label>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="user-tel" placeholder="Telefon" name="phone" />
                <label for="user-tel">Telefon*</label>
            </div>
        </div>

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

        {{-- Message Field --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Wiadomość" id="user-message" style="height: 100px" name="message"></textarea>
                <label for="user-message">Wiadomość</label>
            </div>
        </div>

        {{-- Terms and Conditions Accordion --}}
        <x-form-check-accordion :id="$termsAccordionId" :selectAllId="$selectAllId" :items="$terms" />


        {{-- Submit Button --}}
        <div class="col-12 d-flex justify-content-end">
            <button data-btn-submit type="submit" class="btn btn-primary mt-5 btn-submit" >
                WYŚLIJ WIADOMOŚĆ
                <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                    <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                        d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                        transform="translate(4.553 8.293) rotate(180)" fill="currentColor" />
                </svg>
            </button>
        </div>
    </div>
</form>


@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("#{{ $id }}");
        const btnSubmit = document.querySelector("[data-btn-submit]");
        const requiredFields = form.querySelectorAll("[required]");
    });
</script>
@endpush