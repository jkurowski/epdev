@extends('layouts.iframe')
@section('content')
    <div id="plan-holder">
        <x-iframes.filters :$uniqueRooms :areaRange="$investment->area_range" />
    </div>

    <x-iframes.properties-list :$investment :$properties />

    <div id="form-messages" class='mt-3'></div>
    <form method="post" id="contact-form" action="" class="validateForm container-fluid d-none">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-sm-6 form-input">
                <label for="form_name">Imię <span class="text-danger">*</span></label>
                <input name="name" id="form_name"
                       class="validate[required] form-control @error('name') is-invalid @enderror"
                       type="text" value="{{ old('name') }}">
            </div>
            <div class="col-12 col-sm-6 form-input">
                <label for="form_surname">Nazwisko <span class="text-danger">*</span></label>
                <input name="surname" id="form_surname"
                       class="validate[required] form-control @error('surname') is-invalid @enderror"
                       type="text" value="{{ old('surname') }}">
            </div>
            <div class="col-12 col-sm-6 form-input">
                <label for="form_email">E-mail <span class="text-danger">*</span></label>
                <input name="email" id="form_email"
                       class="validate[required] form-control @error('email') is-invalid @enderror"
                       type="text" value="{{ old('email') }}">
            </div>
            <div class="col-12 col-sm-6 form-input">
                <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                <input name="phone" id="form_phone"
                       class="validate[required] form-control @error('phone') is-invalid @enderror"
                       type="text" value="{{ old('phone') }}">
            </div>
            <div class="col-12 mt-1 form-input">
                <label for="form_message">Treść wiadomości <span
                            class="text-danger">*</span></label>
                <textarea rows="5" cols="1" name="message" id="form_message"
                          class="validate[required] form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
            </div>
            <div class="col-12">
                <div class="rodo-obligation mt-4">
                    <p>Zgodnie z art. 13 ust.1 i ust. 2 Rozporządzenia Parlamentu
                        Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w
                        sprawie ochrony osób fizycznych w związku z przetwarzaniem danych
                        osobowych i w sprawie swobodnego przepływu takich danych
                        informujemy, że administratorem Pani/Pana danych osobowych jest
                        Madey Development spółka z ograniczoną odpowiedzialnością 2 sp.k., z
                        siedzibą w 93-120 Łódź ul. Przybyszewskiego 199/205. Dane będą
                        przetwarzane w celu założenia i prowadzenia konta klienta na stronie
                        internetowej w tym przede wszystkim świadczenia usług drogą
                        elektroniczną jak również w celu komunikacji.</p>
                    <p>Osobie, której dane dotyczą, przysługuje prawo dostępu do treści
                        swoich danych oraz ich poprawiania a także prawo sprzeciwu i żądania
                        zaprzestania przetwarzania i usunięcia swoich danych osobowych..
                        Podanie danych osobowych przez użytkownika jest dobrowolne, jednakże
                        odmowa podania danych osobowych spowoduje brak możliwości
                        skontaktowania się oraz udzielenia ewentualnej odpowiedzi na treść
                        zamieszczoną w formularzu kontaktowym (w tym celu możesz wysłać
                        takie oświadczenie na adres email biuro@madej-bud.pl lub pisemnie na
                        adres siedziby. (<a
                                href="https://www.madeydevelopment.pl/files/upload/polityka_prywatnosci.pdf"
                                target="_blank">Polityka informacyjna</a>):</p>
                </div>
            </div>
        </div>
        <div class="row row-form-submit">
            <div class="col-12 pt-3">
                <div class="input text-center">
                    <input name="page" type="hidden" value="{{ $investment->name }}">
                    <input name="investment_id" type="hidden" value="{{ $investment->id }}">
                    <script type="text/javascript">
                        document.write("<button class=\"bttn\" type=\"submit\">WYŚLIJ WIADOMOŚĆ</button>");
                    </script>
                    <noscript>Do poprawnego działania, Java musi być włączona.</noscript>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('scripts')
    <link href="{{ asset('css/iframe/'.$investment->slug.'.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <script src="{{ asset('/js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/pl.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', async () => {
            async function fetchToken(){
                const response = await fetch("{{ route('front.iframe.token') }}")
                const data = await response.json();
                return data.token;
            }
            const token  = await fetchToken();
            const form = document.getElementById('contact-form');
            form.addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': token
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        const formMessagesDiv = document.getElementById('form-messages');
                        const clearErrors = () => {
                            const errorElements = document.querySelectorAll('.alert.alert-danger.border-0');
                            errorElements.forEach(element => element.remove());
                        };

                        if (data.status === 'success') {
                            console.log("success");

                            clearErrors();
                            form.reset();
                            formMessagesDiv.innerHTML = `<div class="alert alert-success border-0">${data.message}</div>`;
                        } else {
                            formMessagesDiv.innerHTML = '';

                            clearErrors();

                            if (data.data) {
                                const errors = data.data;

                                Object.keys(errors).forEach(field => {
                                    const fieldErrors = errors[field];

                                    fieldErrors.forEach(errorMessage => {
                                        const errorElement = document.createElement('div');
                                        errorElement.classList.add('alert', 'alert-danger', 'border-0');
                                        errorElement.innerHTML = errorMessage;

                                        const fieldElement = document.querySelector(`[name="${field}"]`);
                                        if (fieldElement) {
                                            fieldElement.insertAdjacentElement('afterend', errorElement);
                                        } else {
                                            formMessagesDiv.appendChild(errorElement);
                                        }
                                    });
                                });
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        })

        $(document).ready(function() {
            // $(".validateForm").validationEngine({
            //     validateNonVisibleFields: true,
            //     updatePromptsPosition: true,
            //     promptPosition: "topRight:-137px"
            // });
        });
        @if (session('success') || session('warning'))
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.alert').offset().top - aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
    @if (isset($custom_css))
        <style>
            {{ $custom_css }}
        </style>
    @endif
@endpush