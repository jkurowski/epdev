@extends('layouts.page')

@section('meta_title', 'Kontakt')
@isset($page->meta_title) @section('seo_title', $page->meta_title) @endisset
@isset($page->meta_description) @section('seo_description', $page->meta_description) @endisset
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="/login" class="bttn">Admin</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-xl-9">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success border-0">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning border-0">
                                {{ session('warning') }}
                            </div>
                        @endif
                        <form method="post" id="contact-form" action="" class="validateForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-md-4 form-input">
                                    <label for="form_name">Imię <span class="text-danger">*</span></label>
                                    <input name="name" id="form_name" class="validate[required] form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 form-input">
                                    <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                    <input name="email" id="form_email" class="validate[required] form-control @error('email') is-invalid @enderror" type="text" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 form-input">
                                    <label for="form_phone">Telefon <span class="text-danger">*</span></label>
                                    <input name="phone" id="form_phone" class="validate[required] form-control @error('phone') is-invalid @enderror" type="text" value="{{ old('phone') }}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12 mt-1 form-input">
                                    <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                    <textarea rows="5" cols="1" name="message" id="form_message" class="validate[required] form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

                                    @error('message')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="rodo-obligation mt-4">Obowiązek</p>
                                    </div>
                                </div>
                                <div class="rodo-rules">
                                    @foreach ($rules as $r)
                                        <div class="col-12">
                                            <div class="rodo-rule clearfix">
                                                <input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0">
                                                <label for="zgoda_{{$r->id}}" class="rules-text">{!! $r->text !!}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row row-form-submit">
                                <div class="col-12 mb-5">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="input text-center">
                                        <input name="page" type="hidden" value="Kontakt">
                                        <script>
                                            @if(settings()->get("recaptcha_site_key") && settings()->get("recaptcha_secret_key"))
                                                document.write("<button type=\"submit\" class=\"bttn g-recaptcha\" data-sitekey=\"{{ settings()->get("recaptcha_site_key") }}\" data-callback=\"onRecaptchaSuccess\" data-action=\"submitContact\">WYŚLIJ WIADOMOŚĆ</button>");
                                            @else
                                                document.write("<button class=\"bttn\" type=\"submit\">WYŚLIJ WIADOMOŚĆ</button>");
                                            @endif
                                        </script>
                                        <noscript><p><b>Do poprawnego działania, Java musi być włączona.</b><p></noscript>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/pl.js') }}"></script>
    @if(settings()->get("recaptcha_site_key") && settings()->get("recaptcha_secret_key"))
    <script src="https://www.google.com/recaptcha/api.js"></script>
    @endif

    <script>
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px",
                autoPositionUpdate: false
            });
        });

        @if(settings()->get("recaptcha_site_key") && settings()->get("recaptcha_secret_key"))
        function onRecaptchaSuccess(token) {
            $(".validateForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateForm").validationEngine('validate');
            if (isValid) {
                $("#contact-form").submit();
            } else {
                grecaptcha.reset();
            }
        }
        @endif

        @if (session('success')||session('warning'))
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.alert').offset().top-aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush
