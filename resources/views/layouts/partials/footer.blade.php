<footer id="footer" class="bg-black margin-xs">
    {{-- MAIN FOOTER --}}
    <div class="container pt-5 pb-5">
        <div class="row gy-3 gy-lg-5 ">
            @foreach($footer as $f)
                <div @isset($f->class) class="{{ $f->class }}" @endisset>
                    <div class="list-title mb-4">{{ $f->name }}</div>
                    {!! Blade::render($f->items) !!}
                </div>
            @endforeach

            <div class="col-12 col-lg-4 d">
                <div class="d-flex align-items-center w-100">
                    <div class="row align-items-center w-100">
                        <div class="col-12 col-lg-3">
                            <x-picture webpSmall="images/reusable/footer-logo.webp"
                                       webpLarge="images/reusable/footer-logo@2x.webp"
                                       pngSmall="images/reusable/footer-logo.png" pngLarge="images/reusable/footer-logo@2x.png"
                                       defaultSrc="images/reusable/footer-logo@2x.png" alt="Logo EP Development"
                                       class="img-fluid" />
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="footer-logo-title">
                                Witamy <br> w okolicy.
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    <a href="#modalContact" data-bs-toggle="modal" data-bs-target="#modalContact" class="btn btn-footer">napisz do nas</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                @php
                    $footer_text = settings()->get("page_footer_text");
                @endphp
                @if($footer_text)
                    <ul class="list-unstyled contacts mt-3 mb-0">
                        {{-- Location --}}
                        <li class="pb-3 contact-box location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34.875" height="34.875"
                                 viewBox="0 0 34.875 34.875">
                                <path d="M18,.563A17.438,17.438,0,1,0,35.438,18,17.44,17.44,0,0,0,18,.563ZM18,8.3a2.953,2.953,0,1,1-2.953,2.953A2.953,2.953,0,0,1,18,8.3Zm3.938,17.859a.844.844,0,0,1-.844.844H14.906a.844.844,0,0,1-.844-.844V24.469a.844.844,0,0,1,.844-.844h.844v-4.5h-.844a.844.844,0,0,1-.844-.844V16.594a.844.844,0,0,1,.844-.844h4.5a.844.844,0,0,1,.844.844v7.031h.844a.844.844,0,0,1,.844.844Z"
                                      transform="translate(-0.563 -0.563)" fill="#d7007a" />
                            </svg>
                            <span class="location-info ">
                            <div class=" text-uppercase pb-2">
                                <strong>komunikat</strong>
                            </div>
                            <p class="paragraph text-white first-upper">{{ $footer_text }}</p>
                            <style>.first-upper::first-letter {text-transform: uppercase;}</style>
                        </span>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    {{-- SECOND FOOTER --}}
    <div class="w-100 footer-bg second-footer ">
        <div class="container">
            <div class="d-flex gap-3 gap-md-0 flex-column flex-md-row justify-content-between align-items-center">
                <a href="{{ route('pages.completed-investments') }}" class="second-footer-link">Inwestycje zrealizowane</a>
                <a href="{{ route('pages.planned-investments') }}" class="second-footer-link">Inwestycje planowane</a>
                <a href="{{ route('pages.buy-land') }}" class="second-footer-link">Kupimy grunty</a>
                <div class="footer-socials">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=100083628571206" class="fb" aria-label="link do Facebook EP Development" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12.839" height="23.972" viewBox="0 0 12.839 23.972"><path d="M13.607,13.484l.666-4.338H10.11V6.331a2.169,2.169,0,0,1,2.446-2.344h1.892V.293A23.079,23.079,0,0,0,11.089,0C7.661,0,5.42,2.078,5.42,5.839V9.146H1.609v4.338H5.42V23.972h4.69V13.484Z" transform="translate(-1.609)" fill="currentColor" /></svg></a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/ep_development" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="21.093" height="21.093" viewBox="0 0 21.093 21.093"><g transform="translate(-2 -2)"><path d="M7.773,3h9.546a4.773,4.773,0,0,1,4.773,4.773v9.546a4.773,4.773,0,0,1-4.773,4.773H7.773A4.773,4.773,0,0,1,3,17.319V7.773A4.773,4.773,0,0,1,7.773,3Z" transform="translate(0 0)" fill="none" stroke="#d7007a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /><path d="M19.661,15.193a3.819,3.819,0,1,1-3.217-3.217,3.818,3.818,0,0,1,3.217,3.217Z" transform="translate(-3.296 -3.249)" fill="none" stroke="#d7007a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /><path d="M26.25,9.75h0" transform="translate(-8.453 -2.454)" fill="none" stroke="#d7007a" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></g></svg></a>
                </div>
            </div>
        </div>
    </div>
</footer>